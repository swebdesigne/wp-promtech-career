<?

class AdminPhoto {
    public function __construct()
    {
        $this->init();
    }
    private function init() 
    {
        function register_group_post_type_photo() {
            
            // список параметров: wp-kama.ru/function/get_taxonomy_labels
            register_taxonomy( 'photo_tag', [ 'photo' ], [
                'label'                 => '', // определяется параметром $labels->name
                'labels'                => [
                    'name'              => 'Фотографии',
                    'singular_name'     => 'Фотографии',
                    'search_items'      => 'Найти Фотографию',
                    'all_items'         => 'Все регионы',
                    'view_item '        => 'Просмотреть фотографию',
                    'edit_item'         => 'Править фотографию',
                    'update_item'       => 'Обновить фотографию',
                    'add_new_item'      => 'Добавить новую фотографию',
                    'new_item_name'     => 'Имя новоой фотографии',
                    'menu_name'         => 'Теги',
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
            register_post_type('photo', array(
            'label'         => 'Фотографии',
            'labels'        => array(
            'name'          => 'Фотографии',
            'singular_name' => 'Фотографии',
            'menu_name'     => 'Фотографии',
            'all_items'     => 'Все фотографии',
            'add_new'       => 'Добавить фотографию',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать фотографию',
            'new_item'      => 'Новая Фотографию',
            ),
            'description'         => 'Фотографии',
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
        add_action( 'init', 'register_group_post_type_photo' );
        function wpschool_register_taxonomy_photo() {
            register_taxonomy_for_object_type( 'photo_tag', 'photo' );
        }
        add_action( 'init', 'wpschool_register_taxonomy_photo' );
    }
}