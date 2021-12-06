<?

class  Menu extends ModaMenu {
    private $header_menu = [];

    public function __construct() {

    }

    public function getMenu($name) 
    {
        return $this->$name;
    }
    
    public function setMenu($name, $param) 
    {
        $this->$name($param);
    }

    /**
     * метод формирует массив для меню в header 
    */
    public function header_menu($param) {
        $this->header_menu = $this->db_header_menu($param);
        $currenturl = get_permalink();
        foreach ($this->header_menu as $k => $cat) {
            $this->header_menu[$k]->link = get_page_link($cat->ID);
            if ($this->header_menu[$k]->link == $currenturl)
                $this->header_menu[$k]->class = 'active';
            $this->header_menu[$k]->title = $cat->post_title;
        }
    }

    public function template($tamplate, $method, $param) {
        if (empty($this->$tamplate)) (!empty($method)) ? $this->$method($param) : $this->$tamplate($param);
        get_template_part('engine/view/menu/'.$tamplate, 'single', $this->$tamplate);
    }
}