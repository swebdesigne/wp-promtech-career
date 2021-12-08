<?

class AdminArticle {
    public function __construct()
    {
        $this->init();
    }

    private function init() {
        add_filter('post_type_labels_post', 'rename_posts_labels');
        function rename_posts_labels( $labels ){
            // заменять автоматически не пойдет например заменили: Запись = новость, а в тесте получится так "Просмотреть новость"

            /* оригинал
                stdClass Object (
                    'name'                  => 'Записи',
                    'singular_name'         => 'Запись',
                    'add_new'               => 'Добавить новую',
                    'add_new_item'          => 'Добавить запись',
                    'edit_item'             => 'Редактировать запись',
                    'new_item'              => 'Новая запись',
                    'view_item'             => 'Просмотреть запись',
                    'search_items'          => 'Поиск записей',
                    'not_found'             => 'Записей не найдено.',
                    'not_found_in_trash'    => 'Записей в корзине не найдено.',
                    'parent_item_colon'     => '',
                    'all_items'             => 'Все записи',
                    'archives'              => 'Архивы записей',
                    'insert_into_item'      => 'Вставить в запись',
                    'uploaded_to_this_item' => 'Загруженные для этой записи',
                    'featured_image'        => 'Миниатюра записи',
                    'set_featured_image'    => 'Задать миниатюру',
                    'remove_featured_image' => 'Удалить миниатюру',
                    'use_featured_image'    => 'Использовать как миниатюру',
                    'filter_items_list'     => 'Фильтровать список записей',
                    'items_list_navigation' => 'Навигация по списку записей',
                    'items_list'            => 'Список записей',
                    'menu_name'             => 'Записи',
                    'name_admin_bar'        => 'Запись',
                )
            */

            $new = array(
                'name'                  => 'Новости',
                'singular_name'         => 'Новость',
                'add_new'               => 'Добавить новость',
                'add_new_item'          => 'Добавить новость',
                'edit_item'             => 'Редактировать новость',
                'new_item'              => 'Новая новость',
                'view_item'             => 'Просмотреть новость',
                'search_items'          => 'Поиск новостей',
                'not_found'             => 'Новость не найдена.',
                'not_found_in_trash'    => 'Новость в корзине не найдено.',
                'parent_item_colon'     => '',
                'all_items'             => 'Все новости',
                'archives'              => 'Архивы новостей',
                'insert_into_item'      => 'Вставить в новость',
                'uploaded_to_this_item' => 'Загруженные для этой новости',
                'featured_image'        => 'Миниатюра новости',
                'filter_items_list'     => 'Фильтровать список новостей',
                'items_list_navigation' => 'Навигация по списку новостей',
                'items_list'            => 'Список новостей',
                'menu_name'             => 'Новости',
                'name_admin_bar'        => 'Новость', // пункте "добавить"
            );

            return (object) array_merge( (array) $labels, $new );
        }
        function unregister_taxonomy_post_tag(){
            register_taxonomy('post_tag', array());
        }
        add_action('init', 'unregister_taxonomy_post_tag');
    }
}