<?

class Digital {
    private $digit;
    private $dir_template = 'engine/view/digit/';

    public function __construct($initMethod = '', $param = '')
    {
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    private function home_staic_video($param = -1) 
    {

    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->digit); }
}