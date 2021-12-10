<?
class Slider extends ModalSlider {
    private $slider;
    private $dir_template = 'engine/view/slider/';

    public function __construct($initMethod, $param)
    {
        $this->$initMethod($param);
    }

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
        $this->slider = $this->db_home_slider($param);
        foreach($this->slider as $k => $post) {
            $this->slider[$k]->slideURL = get_the_post_thumbnail_url($post->ID);
        }
        wp_reset_postdata();
    }
    
    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->job); }
}