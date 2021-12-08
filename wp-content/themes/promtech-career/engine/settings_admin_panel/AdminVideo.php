<?

class AdminVideo {
    public function __construct()
    {
        $this->init();
    }

    private function init() {
        function register_group_post_type_video() {
            // Слайдер - тип записи
            register_post_type('video', array(
              'label'         => 'Видео',
              'labels'        => array(
              'name'          => 'Видео',
              'singular_name' => 'Видео',
              'menu_name'     => 'Видео',
              'all_items'     => 'Все видео',
              'add_new'       => 'Добавить видео',
              'add_new_item'  => 'Добавить новое видео',
              'edit'          => 'Редактировать',
              'edit_item'     => 'Редактировать видео',
              'new_item'      => 'Новое видео',
              ),
              'description'         => 'Видео',
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
              'supports'            => array( 'title' ),
              ) );
          }
          add_action( 'init', 'register_group_post_type_video' );
    }
}