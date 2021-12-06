<?

class Job extends ModalJob {
    private $job;

    public function __construct() {

    }

    public function getJob($name) 
    {
        return $this->$name;
    }
    
    public function setJob($name, $param) 
    {
        $this->$name($param);
    }

    public function all_job($param = -1) 
    {
        $this->job = $this->db_job($param);
        foreach($this->job as $k => $post) {
            $item = get_post_meta($post->ID);
            $item['img'] = get_the_post_thumbnail($post->ID);
            $item['category'] = get_the_category($post->ID)[0]->name;
            $item['logo_company'] = get_the_post_thumbnail(unserialize($item['company'][0])[0]);
            $this->job[$k]->items = $item;
        }
        wp_reset_postdata();
    }

    public function template($tamplate, $method, $param) {
        if (empty($this->$tamplate)) (!empty($method)) ? $this->$method($param) : $this->$tamplate($param);
        get_template_part('engine/view/job/'.$tamplate, 'single', $this->$tamplate);
    }
}