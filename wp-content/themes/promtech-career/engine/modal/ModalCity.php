<?

class ModalCity {
    protected function db_city($param) {
        return get_posts( ['numberposts' => $param, 'post_type' => 'city'] );
    }
}