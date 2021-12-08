<?

class AdminJob {
    public function __construct()
    {
        $this->init();
    }
    private function init() 
    {
        function wpschool_create_post_type_job(){
            // список параметров: wp-kama.ru/function/get_taxonomy_labels
            register_taxonomy( 'teg_job', [ 'job' ], [
                'label'             => '', // определяется параметром $labels->name
                'labels'            => [
                    'name'              => 'Рубрики',
                    'singular_name'     => 'Рубрика',
                    'search_items'      => 'Найти рубрику',
                    'all_items'         => 'Все рубрики',
                    'view_item '        => 'Просмотреть рубрику',
                    'parent_item'       => 'Родительская рубрика',
                    'parent_item_colon' => 'Родительская рубрика:',
                    'edit_item'         => 'Править рубрику',
                    'update_item'       => 'Обновить рубрику',
                    'add_new_item'      => 'Добавить новую рубрику',
                    'new_item_name'     => 'Имя новой рубрики',
                    'menu_name'         => 'Рубрики',
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
        
        add_action( 'init', 'wpschool_create_post_type_job' );
        function wpschool_register_taxonomy_job() {
            register_taxonomy_for_object_type( 'teg_job', 'job' );
        }
        add_action( 'init', 'wpschool_register_taxonomy_job' );
    }
}