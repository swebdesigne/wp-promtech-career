<?

class AdminCompany {
    public function __construct()
    {
        $this->init();
    }

    private function init() {
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
              'supports'            => array( 'title', 'thumbnail', 'editor' ),
              ) );
          }
          add_action( 'init', 'register_group_post_type_brands' );
    }
}