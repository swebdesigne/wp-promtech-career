<?

class Menu extends ModaMenu {
    private $menu;
    private $dir_template = 'engine/view/menu/';

    public function __construct($initMethod, $param)
    {
        $this->$initMethod($param);
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
    public function header_menu($param = -1) {
        $this->menu = $this->db_header_menu($param);
        $currenturl = get_permalink();
        foreach ($this->menu as $k => $cat) {
            $this->menu[$k]->link = get_page_link($cat->ID);
            if ($this->menu[$k]->link == $currenturl)
                $this->menu[$k]->class = 'active';
            $this->menu[$k]->title = $cat->post_title;
        }
    }

    public function template($tamplate) { Tools::template($this->dir_template.$tamplate, $this->menu); }
}