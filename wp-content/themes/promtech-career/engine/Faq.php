<?

class Faq extends ModalFaq {
    private $data;
    private $dir_template = 'engine/view/faq/';

    public function __construct($initMethod = '', $param = '')
    {
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    private function faq($param = -1) 
    {
        $this->data['faq'] = $this->db_faq($param);
        foreach($this->data['faq'] as $key => &$post) {
            $item = get_post_meta($post->ID);
            $post->answ = $item['answ'][0];
        }
        $this->data['have_question'] = new Form('contacts');
        wp_reset_postdata();
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->data); }
}