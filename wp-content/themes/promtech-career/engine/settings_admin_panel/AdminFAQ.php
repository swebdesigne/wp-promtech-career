<?


class AdminFAQ {
    public function __construct()
    {
        $this->init();
    }

    private function init() 
    {
        function register_group_post_type_faq() {
            
            // список параметров: wp-kama.ru/function/get_taxonomy_labels
            register_taxonomy( 'tag_faq', [ 'faq' ], [
                'label'                 => '', // определяется параметром $labels->name
                'labels'                => [
                    'name'              => 'Часто задаваемые вопросы',
                    'singular_name'     => 'Регион',
                    'search_items'      => 'Найти регион',
                    'all_items'         => 'Все регионы',
                    'view_item '        => 'Часто задаваемые вопросы',
                    'parent_item'       => 'Часто задаваемые вопросы',
                    'parent_item_colon' => 'Часто задаваемые вопросы:',
                    'edit_item'         => 'Править вопрос',
                    'update_item'       => 'Обновить вопрос',
                    'add_new_item'      => 'Добавить новый вопрос',
                    'new_item_name'     => 'Наименование вопроса',
                    'menu_name'         => 'Рубрика',
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
            register_post_type('faq', array(
            'label'         => 'Вопросы',
            'labels'        => array(
            'name'          => 'Вопросы',
            'singular_name' => 'Вопросы',
            'menu_name'     => 'Часто задаваемые вопросы',
            'all_items'     => 'Все вопросы',
            'add_new'       => 'Добавить вопрос',
            'add_new_item'  => 'Добавить новый вопрос',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать вопрос',
            'new_item'      => 'Новая компания',
            ),
            'description'         => 'Вопросы',
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
        add_action( 'init', 'register_group_post_type_faq' );
        function wpschool_register_taxonomy_faq() {
            register_taxonomy_for_object_type( 'tag_faq', 'faq' );
        }
        add_action( 'init', 'wpschool_register_taxonomy_faq' );
    }
}