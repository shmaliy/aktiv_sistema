<?php
// ** MySQL settings ** //
define('DB_NAME', 'aktivsis_wrdp1');    // The name of the database
define('DB_USER', 'aktivsis_wrdp1');     // Your MySQL username
define('DB_PASSWORD', '0KQ0{u7uYQ9D'); // ...and password
define('DB_HOST', 'localhost');    // 99% chance you won't need to change this value
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');




// Change SECRET_KEY to a unique phrase.  You won't have to remember it later,
// so make it long and complicated.  You can visit https://www.grc.com/passwords.htm
// to get a phrase generated for you, or just make something up.
define('SECRET_KEY', 'uVbJ9NORKMGXBdFOsddx1tnR0KQ0{u7uYQ9Dbkh85veVu4Ub3O3TS8T0KQ0{u7uYQ9DqwnSUYcjsiQC6tUtvnyd'); // Change this to a unique phrase.

// You can have multiple installations in one database if you give each a unique prefix
$table_prefix  = 'wp_';   // Only numbers, letters, and underscores please!

// Change this to localize WordPress.  A corresponding MO file for the
// chosen language must be installed to wp-content/languages.
// For example, install de.mo to wp-content/languages and set WPLANG to 'de'
// to enable German language support.
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

define('ABSPATH', dirname(__FILE__).'/');
require_once(ABSPATH.'wp-settings.php');
?>
