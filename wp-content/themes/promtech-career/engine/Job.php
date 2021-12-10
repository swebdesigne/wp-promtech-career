<?

class Job extends ModalJob {
    private $job;
    private $category;
    private $company;
    private $dir_template = 'engine/view/job/';

    public function __construct($initMethod, $param)
    {
        $this->$initMethod($param);
    }

    public function getJob($name) 
    {
        return $this->$name;
    }
    
    public function setJob($name, $param) 
    {
        $this->$name($param);
    }

    private function job($param = -1) 
    {
        $this->job = $this->db_job($param);
        foreach($this->job as $k => $post) {
            $item = get_post_meta($post->ID);
            $item['img'] = get_the_post_thumbnail($post->ID);
            $item['link'] = get_page_link($post->ID);
            $item['category'] = get_the_category($post->ID)[0]->name;
            $item['logo_company'] = get_the_post_thumbnail(unserialize($item['company'][0])[0]);
            $item['name_company'] = get_the_title(unserialize($item['company'][0])[0]);
            $this->job[$k]->items = $item;
        }
        $this->job['category'] = $this->job_category();
        Tools::mdd($this->job);
        wp_reset_postdata();
    }

    private function job_category() 
    {
        $this->category = $this->db_taxonomy_job('all');
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->job); }
}