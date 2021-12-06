<?

class Search extends ModalSearch {
    private $job_search;

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
        $this->job_search = $this->db_job_search($param);
    }

    public function template($tamplate) {
        get_template_part('engine/view/search/'.$tamplate);
    }

}