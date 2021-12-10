<?

class Company extends ModalCompany {
    private $title;
    public $property;
    private $company_id;
    private $dir_template = 'engine/view/company/';

    public function __construct($initMethod = '', $param = '')
    {
        $this->property = new CompanyPropertyContainer();
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getCompanyId() 
    {
        return $this->title;
    }

    public function setCompanyId($id)
    {
        $this->company_id = $id;
    }

    public function __list($param = -1) {
        return $this->db_company($param);
    }

    public function view($tamplate) 
    { 
        Tools::view($this->dir_template.$tamplate, $this->company); 
    }
}