<?

class Slider extends ModalSlider {
    private $home_slider;

    public function getSlider($name) 
    {
        return $this->$name;
    }
    
    public function setSlider($name, $param) 
    {
        $this->$name($param);
    }

    private function home_slider($param = -1) 
    {
        $this->home_slider = $this->db_home_slider($param);
        foreach($this->home_slider as $k => $post) {
            $this->home_slider[$k]->imgURL = get_the_post_thumbnail_url($post->ID);
        }
        wp_reset_postdata();
    }

    public function template($tamplate, $method, $param) {
        if (empty($this->$tamplate)) (!empty($method)) ? $this->$method($param) : $this->$tamplate($param);
        get_template_part('engine/view/slider/'.$tamplate, 'single', $this->$tamplate);
    }
}