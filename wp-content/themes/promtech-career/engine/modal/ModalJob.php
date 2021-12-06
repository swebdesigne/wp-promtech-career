<?

class ModalJob {
    protected function db_job($param) {
        return get_posts( ['numberposts' => $param, 'post_type' => 'job'] );
    }
}