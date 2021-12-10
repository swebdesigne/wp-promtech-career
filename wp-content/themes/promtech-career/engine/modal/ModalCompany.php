<?

class ModalCompany {
    protected function db_company($param) {
        return get_posts( ['numberposts' => $param, 'post_type' => 'brands'] );
    }
}