#!/usr/bin/env bash
# Set up a local WordPress install for working on this theme.
#
# Idempotent: re-running is a no-op once everything is in place.
# Layout:
#   /tmp/wp/                 WordPress core
#   /tmp/wp/wp-content/themes/maketime-finance -> symlink to this repo
#   /tmp/wp/router.php       Permalink router for `php -S`
#
# After this script finishes:
#   cd /tmp/wp && php -d error_reporting='E_ALL & ~E_DEPRECATED' \
#     -S 127.0.0.1:8080 router.php
# then visit http://127.0.0.1:8080/

set -euo pipefail

REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
WP_DIR=/tmp/wp
DL_DIR=/tmp/wp-dl
WP_VERSION=6.5
THEME_SLUG=maketime-finance

# GitHub mirrors (wordpress.org is sometimes blocked by sandbox allowlists).
WP_TARBALL="https://github.com/WordPress/WordPress/archive/refs/tags/${WP_VERSION}.tar.gz"
SQLITE_TARBALL="https://github.com/WordPress/sqlite-database-integration/archive/refs/heads/main.tar.gz"
IMPORTER_TARBALL="https://github.com/WordPress/wordpress-importer/archive/refs/heads/master.tar.gz"
WP_CLI_PHAR="https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar"

WP="wp --path=${WP_DIR} --allow-root"

log()  { printf '\033[36m==>\033[0m %s\n' "$*"; }
have() { command -v "$1" >/dev/null 2>&1; }

# --- 0. Sanity checks -------------------------------------------------------
have php   || { echo "php not found"; exit 1; }
have curl  || { echo "curl not found"; exit 1; }
have tar   || { echo "tar not found"; exit 1; }

for ext in sqlite3 pdo_sqlite mbstring gd zip; do
	php -m | grep -qi "^${ext}$" || { echo "PHP extension '${ext}' missing"; exit 1; }
done

# --- 1. Install wp-cli ------------------------------------------------------
if ! have wp; then
	log "Installing wp-cli"
	curl -fsSL --retry 4 --retry-delay 2 -o /tmp/wp-cli.phar "${WP_CLI_PHAR}"
	chmod +x /tmp/wp-cli.phar
	sudo mv /tmp/wp-cli.phar /usr/local/bin/wp 2>/dev/null \
		|| mv /tmp/wp-cli.phar "${HOME}/.local/bin/wp" \
		|| { echo "Couldn't install wp-cli to a writable bin dir"; exit 1; }
fi

mkdir -p "${DL_DIR}"

# --- 2. Extract WordPress core ---------------------------------------------
if [ ! -f "${WP_DIR}/wp-settings.php" ]; then
	log "Downloading WordPress ${WP_VERSION}"
	[ -f "${DL_DIR}/wordpress.tar.gz" ] \
		|| curl -fsSL --retry 4 --retry-delay 2 -o "${DL_DIR}/wordpress.tar.gz" "${WP_TARBALL}"
	rm -rf /tmp/WordPress-* "${WP_DIR}"
	tar -xzf "${DL_DIR}/wordpress.tar.gz" -C /tmp
	mv "/tmp/WordPress-${WP_VERSION}" "${WP_DIR}"
fi

# --- 3. SQLite drop-in ------------------------------------------------------
SQLITE_PLUGIN_DIR="${WP_DIR}/wp-content/plugins/sqlite-database-integration"
if [ ! -d "${SQLITE_PLUGIN_DIR}" ]; then
	log "Installing sqlite-database-integration"
	[ -f "${DL_DIR}/sqlite.tar.gz" ] \
		|| curl -fsSL --retry 4 --retry-delay 2 -o "${DL_DIR}/sqlite.tar.gz" "${SQLITE_TARBALL}"
	tar -xzf "${DL_DIR}/sqlite.tar.gz" -C "${WP_DIR}/wp-content/plugins/"
	mv "${WP_DIR}/wp-content/plugins/sqlite-database-integration-main" "${SQLITE_PLUGIN_DIR}"
fi

if [ ! -f "${WP_DIR}/wp-content/db.php" ]; then
	cp "${SQLITE_PLUGIN_DIR}/db.copy" "${WP_DIR}/wp-content/db.php"
	sed -i \
		-e "s|{SQLITE_IMPLEMENTATION_FOLDER_PATH}|${SQLITE_PLUGIN_DIR}|g" \
		-e "s|{SQLITE_PLUGIN}|sqlite-database-integration/load.php|g" \
		"${WP_DIR}/wp-content/db.php"
fi

# --- 4. wp-config -----------------------------------------------------------
if [ ! -f "${WP_DIR}/wp-config.php" ]; then
	log "Writing wp-config"
	cp "${WP_DIR}/wp-config-sample.php" "${WP_DIR}/wp-config.php"
	$WP config set DB_NAME wordpress
	$WP config set DB_USER root
	$WP config set DB_PASSWORD ''
	$WP config set DB_HOST localhost
	$WP config shuffle-salts
	$WP config set WP_DEBUG true --raw
	$WP config set WP_DEBUG_LOG true --raw
	$WP config set WP_DEBUG_DISPLAY false --raw
fi

# --- 5. Install WordPress ---------------------------------------------------
if ! $WP core is-installed 2>/dev/null; then
	log "Installing WordPress"
	$WP core install \
		--url=http://localhost:8080 \
		--title="Make Time Finance (Dev)" \
		--admin_user=admin \
		--admin_password=admin \
		--admin_email=admin@example.com \
		--skip-email
fi

# --- 6. Symlink + activate this theme --------------------------------------
THEME_DEST="${WP_DIR}/wp-content/themes/${THEME_SLUG}"
if [ ! -L "${THEME_DEST}" ]; then
	log "Symlinking theme into wp-content"
	rm -rf "${THEME_DEST}"
	ln -s "${REPO_DIR}" "${THEME_DEST}"
fi

if [ "$($WP theme list --status=active --field=name 2>/dev/null || true)" != "${THEME_SLUG}" ]; then
	log "Activating theme"
	$WP theme activate "${THEME_SLUG}"
fi

# --- 7. WordPress importer + demo content ----------------------------------
IMPORTER_DIR="${WP_DIR}/wp-content/plugins/wordpress-importer"
if [ ! -d "${IMPORTER_DIR}" ]; then
	log "Installing wordpress-importer"
	[ -f "${DL_DIR}/importer.tar.gz" ] \
		|| curl -fsSL --retry 4 --retry-delay 2 -o "${DL_DIR}/importer.tar.gz" "${IMPORTER_TARBALL}"
	tar -xzf "${DL_DIR}/importer.tar.gz" -C "${WP_DIR}/wp-content/plugins/"
	mv "${WP_DIR}/wp-content/plugins/wordpress-importer-master" "${IMPORTER_DIR}"
	$WP plugin activate wordpress-importer
fi

# Import demo content once (idempotency: do it iff there's no "home" page yet)
if [ -z "$($WP post list --post_type=page --name=home --field=ID 2>/dev/null)" ]; then
	log "Importing demo-content.xml"
	$WP import "${REPO_DIR}/demo-content.xml" --authors=create
fi

# --- 8. Site config: homepage, blog page, permalinks -----------------------
HOME_ID="$($WP post list --post_type=page --name=home --field=ID 2>/dev/null | head -1)"
TIPS_ID="$($WP post list --post_type=page --name=tips --field=ID 2>/dev/null | head -1)"
if [ -n "${HOME_ID:-}" ]; then
	$WP option update show_on_front page  >/dev/null
	$WP option update page_on_front "${HOME_ID}"  >/dev/null
fi
[ -n "${TIPS_ID:-}" ] && $WP option update page_for_posts "${TIPS_ID}" >/dev/null
$WP rewrite structure '/%postname%/' --hard >/dev/null 2>&1 || true

# --- 9. PHP built-in server router (URL rewriting) -------------------------
cat > "${WP_DIR}/router.php" <<'PHP'
<?php
// Serve static files directly; otherwise hand off to index.php so WP can
// handle pretty permalinks under the PHP built-in server.
$uri  = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$path = __DIR__ . $uri;
if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
	return false;
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
PHP

log "Setup complete."
log "Start the dev server with:"
log "  cd ${WP_DIR} && php -d error_reporting='E_ALL & ~E_DEPRECATED' -S 127.0.0.1:8080 router.php"
log "Then open http://127.0.0.1:8080/"
