<?

class AdminSlider {

    public function __construct()
    {
        $this->init();
    }

    private function init() 
    {

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
        
    }
}