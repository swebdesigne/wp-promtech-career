<?

class ModalSlider {
    protected function db_home_slider($param) {
        return get_posts( ['numberposts' => $param, 'post_type' => 'slider'] );
    }
}