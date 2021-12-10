<?

class ModalJob {
    protected function db_job($param) {
        return get_posts( ['numberposts' => $param, 'post_type' => 'job'] );
    }

    protected function db_taxonomy_job($param) {
        return get_terms( 'teg_job', ['number' => $param] );
    }
}