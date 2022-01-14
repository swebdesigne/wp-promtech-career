<?

class ModalMenu {
    protected function db_header_menu($param) {
        $menu = (array) get_posts( ['numberposts' => $param, 'post_type' => 'page', 'order' => 'asc'] );
        // sort($menu);
        return $menu;
    }
}