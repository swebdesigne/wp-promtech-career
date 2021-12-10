<?

class Search extends ModalSearch {
    private $search;
    private $dir_template = 'engine/view/search/';

    public function getSearch($name) 
    {
        return $this->$name;
    }
    
    public function setSearch($name, $param) 
    {
        $this->$name($param);
    }

    /**
     * для пользовательского поиска
    */
    public function job_search($param) {
        $this->search = $this->db_job_search($param);
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->menu); }
}