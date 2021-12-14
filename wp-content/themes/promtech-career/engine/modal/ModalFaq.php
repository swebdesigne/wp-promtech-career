<?

class ModalFaq {
    protected function db_faq($param) {
        return get_posts( ['numberposts' => $param, 'post_type' => 'faq'] );
    }

}