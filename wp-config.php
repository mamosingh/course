<?php
# Database Configuration
define( 'DB_NAME', 'wp_minimauk' );
define( 'DB_USER', 'minimauk' );
define( 'DB_PASSWORD', 'xBEKj87MRWr4F0LTyJrr' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = 'wp_74c202wzbq_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'L/N;bp%O<I&9v@_UXMuw#hc3OI#hK+@0dRxS%dk|ct-yz&H^o7%7)+w&R*Z>ng]}');
define('SECURE_AUTH_KEY',  '+z%G$M]PvYWQBZ+feE9-A;+ei$&_+;]+r:A$XfB,k{2eG/}e9nmYi2Z<9+t=-I U');
define('LOGGED_IN_KEY',    ']%D88Xh~cxJm!y~x?NCqIc@Fleh1@+J$W,J>-/S8xwqNw,UM=KZM Jj76 TYTgsl');
define('NONCE_KEY',        'y Ff6=Tby3C}v.$d.-Lf|/L6*?+LlvHeieudU|<DnGvL%Lv|IJ}t7:3;@H[P;75I');
define('AUTH_SALT',        'Ho8]dL,M7r?+pfXy6mj:u]C]r(&1>T;rO9=r24s6*2ZL|sa@5ulpX!*H^gDP&i|+');
define('SECURE_AUTH_SALT', 'GesCbc/,k1%%++.IH5s@rV6rB?^=N^IpRjY>/Js+TZob-+/S%]EWpSt?LRa 4WU&');
define('LOGGED_IN_SALT',   ':+1oeSQ)t>3ZFOERiV`a|#n7v|Y 6xZU1C-)f$I^p`QsU;m1xysla4e~d%,89HGZ');
define('NONCE_SALT',       'xr2POz7N3[w$T}NeUN]8Ax!1o:qxo4tEXQ-YHdtuR}C<R_u|pJ*`iE}$OVM(.UnQ');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'minimauk' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '4e4b6124e308b6e726fa0de04d089159023cad10' );

define( 'WPE_CLUSTER_ID', '120289' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'minimauk.wpengine.com', 1 => 'minimauk.com', 2 => 'www.minimauk.com', );

$wpe_varnish_servers=array ( 0 => 'pod-120289', );

$wpe_special_ips=array ( 0 => '35.197.246.141', );

$wpe_netdna_domains=array ( 1 =>  array ( 'zone' => '1l26oep7c252ixvyl2wnxstl', 'match' => 'minimauk.com', 'secure' => true, 'enabled' => true, ), 2 =>  array ( 'zone' => 'aspu2c4q0m1yd9qv2ahbv8ir', 'match' => 'www.minimauk.com', 'secure' => true, 'enabled' => true, ), );

$wpe_netdna_domains_secure=array ( 1 =>  array ( 'zone' => '1l26oep7c252ixvyl2wnxstl', 'match' => 'minimauk.com', 'secure' => true, 'enabled' => true, ), 2 =>  array ( 'zone' => 'aspu2c4q0m1yd9qv2ahbv8ir', 'match' => 'www.minimauk.com', 'secure' => true, 'enabled' => true, ), );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );


# WP Engine ID


# WP Engine Settings







# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
