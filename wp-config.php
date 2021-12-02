<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'admin_promtech' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin_promtech' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'Tm5~a9i1' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!&FrFBjBnAaV{KaNy[1w%92saHTcYtA6&@*9Af<!9/}@^n+9Y3HRA!D,;w,=)DaU' );
define( 'SECURE_AUTH_KEY',  ';^o ;+=4#b&cg?bj:b.m^5t#|i;1Cxr[N3jvrA+pio>^bvt:D7q7R!:u9Rc_SI9;' );
define( 'LOGGED_IN_KEY',    '9PE-v.E+mNH2PPGSz/RN+xl~+}zR~}L) >e^i%BKP<05Q$@n:o|8Bs;;f=9>D*pZ' );
define( 'NONCE_KEY',        'j~4,OOY/$ ?OAI)TIlJl2:G-f`l#dDEL)hqr=:jz/DDKK1mDd]#P KQ}h:7__Z(4' );
define( 'AUTH_SALT',        '|85Umca{)e669ha%7}.5zJvhcN:6fPCV1Ol9]kD]h3-WGp|DZ0Jnt-lO5NI5^>wT' );
define( 'SECURE_AUTH_SALT', '[T_XE?Z~l#>f-*&Q3nvtkTQ=m-m@!T=]^:4iI3$gD`zbmB&BBzp_,Fv*i,]|C+{C' );
define( 'LOGGED_IN_SALT',   ', J[]=).xBo1(l4G$C<EI~X-2aJ@#aL0|!ol+ 0krq/0}%9WDjmVz}7zZ|u/Fb[U' );
define( 'NONCE_SALT',       'XF&b9a~;1E./XN`aK>dS@ig:ey*faDKx(|/qd?dsAN3?*Z=CS]M^G#>!&`SilmCH' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
