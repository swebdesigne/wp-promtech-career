<?

class Video {
    private $video;
    private $dir_template = 'engine/view/video/';

    public function __construct($initMethod = '', $param = '')
    {
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    private function home_staic_video($param = -1) 
    {

    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->video); }
}