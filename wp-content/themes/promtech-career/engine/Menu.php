<?

class Menu extends ModalMenu {
    private $menu;
    private $current_url;
    private $dir_template = 'engine/view/menu/';

    public function __construct($initMethod, $param)
    {   
        // удаляем все что между ? и =, нужно для того чтобы очистить ссылку от гэт параметра, чтобы в методе header_menu могли сравнивать ссылки
        $this->current_url = (preg_match("/\\?.+\\=/m", get_permalink())) ? preg_replace("/\\?.+\\=/m", "", get_permalink())."/" :  get_permalink();
        if(!empty($initMethod)) $this->$initMethod($param);
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
     * Метод формирует подменю из пользовательских категорий
     * @param - $idCatPosts - id категории поста:
     * 37 - меню Компаний
    */
    private function extraSubMenu($sub_menu, $idCatPosts) {
        $extra_sub_menu = $sub_menu->__list(-1);
        foreach($extra_sub_menu as $key => $item) {
            $extra_sub_menu[$key]->post_parent = $idCatPosts;
            $extra_sub_menu[$key]->link = get_page_link($item->ID);
        }
        usort($extra_sub_menu, 'sort_submenu');
        return $extra_sub_menu;
    }

    /**
     * метод формирует массив для меню в header 
     * создаем поле $this->menu, которое возвращается как результат работы метода. 
     * И по умолчанию сохраняем в него элементы самого высокого уровня, которые содержатся в ключе с индексом 0, массива $parents_arr. 
     * По сути, сейчас мы получили массив элементов верхнего уровня, в который нужно добавить дочерние элементы, непосредственно в ячейку с ключом children.
     * @param - $param - указывает - какое кол-во элементов необходимо получить из БД
    */
    public function header_menu($param = -1) {
        $category = $this->db_header_menu($param);

        // Добавляем меню Компаний в `О корпорации`
        $category = array_merge($category, $this->extraSubMenu(new Company, 37));

        foreach($category as $cat) { if ($cat->ID == 381) continue; $parents_arr[$cat->post_parent][$cat->ID] = $cat; }   
        $this->menu = $parents_arr[0];
        $this->generateElemTree($this->menu, $parents_arr);

        // Сортируем меню по имени
        foreach($this->menu as $menu) usort($menu->children, 'sort_submenu');
    }

   /**
     * метод подменю для главного меню в шапке
     * @param - $treeElem - ссылка на массив (поле)
     * @param - в $parents_arr, ключи это идентификаторы родительских элементов
    */
    private function generateElemTree(&$treeElem, $parents_arr) {
        foreach($treeElem as $key => $item) {
            $treeElem[$key]->link = get_page_link($item->ID);

            if ($treeElem[$key]->link == $this->current_url) { 
                $treeElem[$key]->class = 'active'; 
                $parentID = $treeElem[$key]->post_parent; 
                if($parentID != 0) $parents_arr[0][$parentID]->class = 'active';
            }

            if (!isset($item->children)) $treeElem[$key]->children = [];

            if (isset($parents_arr[$key])) {
                $treeElem[$key]->class_submenu = 'submenu dropdown';
                $treeElem[$key]->class_dropdown_toggle = 'dropdown-toggle';
                $treeElem[$key]->children = $parents_arr[$key];
                $this->generateElemTree($treeElem[$key]->children, $parents_arr);
            }
        }
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->menu); }
}

function sort_submenu( $a, $b ) {

    $a1 = mb_strtolower($a->post_title, 'UTF-8');
    $b1 = mb_strtolower($b->post_title, 'UTF-8'); 

    return strcmp( 
        wp_strip_all_tags( $a1 ),
        wp_strip_all_tags( $b1 )
    );
}