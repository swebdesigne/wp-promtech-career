<?

class AdminInterview {
    public function __construct()
    {
        $this->init();
    }

    private function init() {
        function register_group_post_type_interview() {
            // Слайдер - тип записи
            register_post_type('interview', array(
              'label'         => 'Интервью',
              'labels'        => array(
              'name'          => 'Интервью',
              'singular_name' => 'Интервью',
              'menu_name'     => 'Интервью',
              'all_items'     => 'Все интервью',
              'add_new'       => 'Добавить интервью',
              'add_new_item'  => 'Добавить новое интервью',
              'edit'          => 'Редактировать',
              'edit_item'     => 'Редактирование',
              'new_item'      => 'Новое интервью',
              ),
              'description'         => 'Интервью',
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
          add_action( 'init', 'register_group_post_type_interview' );
    }
}