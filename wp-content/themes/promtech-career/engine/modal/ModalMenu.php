<?

class ModaMenu {
    protected function db_header_menu($param) {
        $menu = (array) get_posts( ['numberposts' => $param, 'post_type' => 'page'] );
        sort($menu);
        return $menu;
    }
}