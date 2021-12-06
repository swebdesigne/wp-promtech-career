<?php
/**
 * promtech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package promtech
 */

if ( ! function_exists( 'promtech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function promtech_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on promtech, use a find and replace
		 * to change 'promtech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'promtech', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => esc_html__( 'Header menu', 'promtech' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'promtech_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'promtech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function promtech_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'promtech_content_width', 640 );
}
add_action( 'after_setup_theme', 'promtech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function promtech_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'promtech' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'promtech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'promtech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function promtech_scripts() {
	wp_enqueue_style( 'promtech-style', get_stylesheet_uri() );

	wp_enqueue_style( 'promtech-font-style', get_template_directory_uri() . '/assets/fonts/font.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-slick_slider-style', get_template_directory_uri() . '/assets/libs/slick/slick.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-slick_slider-theme', get_template_directory_uri() . '/assets/libs/slick/slick-theme.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-slick_slider-theme', get_template_directory_uri() . '/assets/libs/slick/slick-theme.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-fancybox-style', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css', array(), '20151215', true );
	wp_enqueue_style( 'promtech-style', get_template_directory_uri() . '/assets/css/main.css', array(), '20151215', true );
	
	wp_enqueue_style( 'promtech-bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap/css/bootstrap.min.css', array(), '20151215', false );
	
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '' );
    wp_enqueue_script( 'jquery', '', '', false, true);

    wp_enqueue_script( 'promtech-bootstrap', get_template_directory_uri() . '/assets//libs/jquery-3.3.1.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-migrate', get_template_directory_uri() . '/assets/libs/jquery-migrate-3.0.1.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-inputmask', get_template_directory_uri() . '/assets/libs/jquery.inputmask.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-marquee', get_template_directory_uri() . '/assets/libs/marque/jquery.marquee.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-slick', get_template_directory_uri() . '/assets/libs/slick/slick.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-bundle', get_template_directory_uri() . '/assets/libs/bootstrap/js/bootstrap.bundle.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-easypiechart', get_template_directory_uri() . '/assets/libs/easy-pie-chart/jquery.easypiechart.min.js', array(), false, true );
	wp_enqueue_script( 'promtech-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );
	
    wp_enqueue_script('promtech-html5shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');
    wp_script_add_data('promtech-html5shiv', 'conditional', 'lt IE 9');
    wp_enqueue_script('promtech-respond', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');
    wp_script_add_data('promtech-respond', 'conditional', 'lt IE 9');
	
}
add_action( 'wp_enqueue_scripts', 'promtech_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* =============================== ADD SLIDER FOR HOME PAGE =============================== */ 

function register_group_post_type() {
  // Слайдер - тип записи
  register_post_type('slider', array(
    'label'         => 'Слайдер',
    'labels'        => array(
	'name'          => 'Слайдер',
	'singular_name' => 'Слайдер',
	'menu_name'     => 'Слайдер',
	'all_items'     => 'Все слайды',
	'add_new'       => 'Добавить слайд',
	'add_new_item'  => 'Добавить новый слайд',
	'edit'          => 'Редактировать',
	'edit_item'     => 'Редактировать слайд',
	'new_item'      => 'Новый слайд',
    ),
    'description'         => 'Слайдер для главной страницы',
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_rest'        => false,
    'rest_base'           => '',
    'show_in_menu'        => true,
    'exclude_from_search' => false,
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    'menu_icon'           => 'dashicons-format-image',
    'hierarchical'        => false,
    'rewrite'             => false,
    'has_archive'         => false,
    'query_var'           => true,
    'supports'            => array( 'title', 'thumbnail' ),
	) );
}
add_action( 'init', 'register_group_post_type' );

/* =============================== ADD SLIDER FOR HOME PAGE END =============================== */ 

/* =============================== ADD JOBS =============================== */ 

function wpschool_create_jobs_posttype(){
	register_post_type('job', array(
		'labels'             => array(
		'name'               => 'Вакансии', // Основное название типа записи
		'singular_name'      => 'Вакансия', // отдельное название записи типа Book
		'add_new'            => 'Добавить вакансию',
		'add_new_item'       => 'Добавить новую вакансию',
		'edit_item'          => 'Редактировать вакансию',
		'new_item'           => 'Новая вакансия',
		'view_item'          => 'Посмотреть вакансию',
		'search_items'       => 'Найти вакансию',
		'not_found'          => 'Вакансий не найдено',
		'not_found_in_trash' => 'В корзине вакансий не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Вакансии'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments','trackbacks')
	) );
}
add_action( 'init', 'wpschool_create_jobs_posttype' );

function wpschool_register_taxonomy() {
	register_taxonomy_for_object_type( 'post_tag', 'job' );
    register_taxonomy_for_object_type( 'category', 'job' );
}
add_action( 'init', 'wpschool_register_taxonomy' );

/* =============================== ADD END =============================== */ 

/* =============================== CREATE CUSTOMER FIELDS =============================== */ 

function my_meta_box() {  
    add_meta_box(  
        'my_meta_box', // Идентификатор(id)
        'Дополнительная информация', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'job', // Где будет отображаться наше поле, в нашем случае в Записях
        'normal',
        'high');
}  
add_action('add_meta_boxes', 'my_meta_box'); // Запускаем функцию
 
$meta_fields = array(  
	array(  
		'label' => 'Адрес:',  
		'desc'  => 'Адрес компании',  
		'id'    => 'address',  // даем идентификатор.
		'type'  => 'textarea'  // Указываем тип поля.
	), 
	array(  
		'label' => 'Заработная плата от:',  
		'desc'  => 'Минимальная ЗП',  
		'id'    => 'min_cost',  // даем идентификатор.
		'type'  => 'number'  // Указываем тип поля.
	), 
	array(  
		'label' => 'Заработная плата до:',  
		'desc'  => 'Максимальная ЗП',  
		'id'    => 'max_cost',  // даем идентификатор.
		'type'  => 'number'  // Указываем тип поля.
	), 
    array(  
        'label' => 'Краткое описание (выводится в карточке вакансии) вакансии',  
        'desc'  => 'Краткое описание вакансии',  
        'id'    => 'small_desc', // даем идентификатор.
        'type'  => 'text'  // Указываем тип поля.
    ),  
    array(  
        'label' => 'Подробное описание (выводится на странице вакансии) вакансии',  
        'desc'  => 'Подробное описание вакансии',  
        'id'    => 'big_desc',  // даем идентификатор.
        'type'  => 'textarea'  // Указываем тип поля.
    ), 
    array(  
        'label' => 'Чекбоксы (флажки)',  
        'desc'  => 'Описание для поля.',  
        'id'    => 'mycheckbox',  // даем идентификатор.
        'type'  => 'checkbox'  // Указываем тип поля.
    ),  
    array(  
        'label' => 'Всплывающий список',  
        'desc'  => 'Описание для поля.',  
        'id'    => 'myselect',  
        'type'  => 'select',  
        'options' => array (  // Параметры, всплывающие данные
            'one' => array (  
                'label' => 'Вариант 1',  // Название поля
                'value' => '1'  // Значение
            ),  
            'two' => array (  
                'label' => 'Вариант 2',  // Название поля
                'value' => '2'  // Значение
            ),  
            'three' => array (  
                'label' => 'Вариант 3',  // Название поля
                'value' => '3'  // Значение
            )  
        )  
    )  
);
 
// Вызов метаполей  
function show_my_metabox() {  
	global $meta_fields; // Обозначим наш массив с полями глобальным
	global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
	// Выводим скрытый input, для верификации. Безопасность прежде всего!
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
 
    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';  
    foreach ($meta_fields as $field) {  
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // Начинаем выводить таблицу
        echo '<tr><th><label for="'.$field['id'].'">'.$field['label'].'</label></th><td>';  
		switch($field['type']) {  
			case 'text':  
				echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
					<br /><span class="description">'.$field['desc'].'</span>';  
			break;
			case 'textarea':  
				echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
					<br /><span class="description">'.$field['desc'].'</span>';  
			break;
			case 'checkbox':  
				echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
					<label for="'.$field['id'].'">'.$field['desc'].'</label>';  
			break;
			// Всплывающий список  
			case 'select':  
				echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
				foreach ($field['options'] as $option) {  
					echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
				}  
				echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
			break;
			case 'number':  
				echo '<input type="number" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30"/>
					<br /><span class="description">'.$field['desc'].'</span>';  
			break;
        }
        echo '</td></tr>';  
    }  
    echo '</table>';
}
 
// Пишем функцию для сохранения
function save_my_meta_fields($post_id) {  
    global $meta_fields;  // Массив с нашими полями
 
    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
        return $post_id;  
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // Проверяем права доступа  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
 
    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }  
    } // end foreach  
}  
add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения

/* =============================== CREATE CUSTOMER FIELDS END =============================== */ 

/* =============================== ADD COMPANY =============================== */ 

function register_group_post_type_brands() {
	// Слайдер - тип записи
	register_post_type('brands', array(
	  'label'         => 'Компании',
	  'labels'        => array(
	  'name'          => 'Компании',
	  'singular_name' => 'Компании',
	  'menu_name'     => 'Компании',
	  'all_items'     => 'Все компании',
	  'add_new'       => 'Добавить компанию',
	  'add_new_item'  => 'Добавить новую компанию',
	  'edit'          => 'Редактировать',
	  'edit_item'     => 'Редактировать компанию',
	  'new_item'      => 'Новая компания',
	  ),
	  'description'         => 'Компании',
	  'public'              => true,
	  'publicly_queryable'  => true,
	  'show_ui'             => true,
	  'show_in_rest'        => false,
	  'rest_base'           => '',
	  'show_in_menu'        => true,
	  'exclude_from_search' => false,
	  'capability_type'     => 'post',
	  'map_meta_cap'        => true,
	  'menu_icon'           => 'dashicons-format-image',
	  'hierarchical'        => false,
	  'rewrite'             => false,
	  'has_archive'         => false,
	  'query_var'           => true,
	  'supports'            => array( 'title', 'thumbnail' ),
	  ) );
  }
  add_action( 'init', 'register_group_post_type_brands' );
  
  /* =============================== ADD COMPANY END =============================== */ 
  


  function register_group_post_type_city() {
	  
	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'region', [ 'city' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Регионы',
			'singular_name'     => 'Регион',
			'search_items'      => 'Найти регион',
			'all_items'         => 'Все регионы',
			'view_item '        => 'Просмотреть регион',
			'parent_item'       => 'Родительский регион',
			'parent_item_colon' => 'Родительский регион:',
			'edit_item'         => 'Править регион',
			'update_item'       => 'Обновить регион',
			'add_new_item'      => 'Добавить новый регион',
			'new_item_name'     => 'Имя нового региона',
			'menu_name'         => 'Регион',
			'back_to_items'     => '← Назад',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
	// Слайдер - тип записи
	register_post_type('city', array(
	  'label'         => 'Города',
	  'labels'        => array(
	  'name'          => 'Города',
	  'singular_name' => 'Города',
	  'menu_name'     => 'Города',
	  'all_items'     => 'Все Города',
	  'add_new'       => 'Добавить город',
	  'add_new_item'  => 'Добавить новый город',
	  'edit'          => 'Редактировать',
	  'edit_item'     => 'Редактировать город',
	  'new_item'      => 'Новая компания',
	  ),
	  'description'         => 'Компании',
	  'public'              => true,
	  'publicly_queryable'  => true,
	  'show_ui'             => true,
	  'show_in_rest'        => false,
	  'rest_base'           => '',
	  'show_in_menu'        => true,
	  'exclude_from_search' => false,
	  'capability_type'     => 'post',
	  'map_meta_cap'        => true,
	  'menu_icon'           => 'dashicons-format-image',
	  'hierarchical'        => false,
	  'rewrite'             => false,
	  'has_archive'         => false,
	  'query_var'           => true,
	  'supports'            => array('title')
	  ) );
  }
  add_action( 'init', 'register_group_post_type_city' );
  function wpschool_register_taxonomy_city() {
	register_taxonomy_for_object_type( 'region', 'city' );
  }
  add_action( 'init', 'wpschool_register_taxonomy_city' );

  /* =============================== ADD COMPANY END =============================== */ 
