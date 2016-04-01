<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/* local */
define('DB_NAME', 'drmarty');
define('DB_USER', 'drmarty');
define('DB_PASSWORD', 'drmarty');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
/**/

/* staging * /
define('DB_NAME', 'mind2web_drmarty');
define('DB_USER', 'mind2web_drmarty');
define('DB_PASSWORD', 'Sf@biani1');
define('DB_HOST', 'mysql-mind2web.alwaysdata.net');
define('DB_CHARSET', 'utf8');
/**/

/* prod * /
define('DB_NAME', 'drmarty');
define('DB_USER', 'drmarty');
define('DB_PASSWORD', 'drmarty');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
/**/

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B`^D<L2||,@Acta(R^G$y:n#8-M/k[x=@{2$qC*W_plTHF=j+4!-M!zt:CpB*lJO');
define('SECURE_AUTH_KEY',  '#{?-o7P<$[N^I]cP4LX,e)[!4R^HLwK+M!-O$HqEI-?:m+3{>xV*d%AK^zBsku)&');
define('LOGGED_IN_KEY',    '|)#a[Hap?rruJP-ZI9}I=ZL?RVnIUfK^4E[?80EDpW+*AU L}C*c0|y:6[nl0ndh');
define('NONCE_KEY',        'md|4[rNR@3o*:HL~(&(,(xK903Oc[[<g1idUJ:B+Sitq!h3`8N[lA#-EZ`R5XPG9');
define('AUTH_SALT',        'PS*<H+`wO@^}`| 0KL{TTk0lR-VL^iNlkL%dAG,|G.SgSQM1;0vWg a~PGi]-.i7');
define('SECURE_AUTH_SALT', ':@k3+=-thob-Vi4yRC<gjP^z$5F2KU@cJj^Yll,dSF@_q ->E*{{rmy-3J?a~bwS');
define('LOGGED_IN_SALT',   '`PNNB -0-d~#oOp!D`N$doSutOa0_luc<3Y]g%Gt1N|:hq4T|s.<Z[b4Eb)C}Y?c');
define('NONCE_SALT',       '5-|/y,T.;tz^Ox6_)~bdCp+?uiwPKG?0o@0+/*mt_bTgsz1R9DnX/_T~-;rm.r3<');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'drmarty_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');