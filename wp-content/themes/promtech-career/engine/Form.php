<?

class Form {
    private $data;
    private $city;
    private $company;
    private $contacts;
    private $dir_template = 'engine/view/form/';

    public function __construct($initMethod = '', $param = '')
    {
        $this->city = new City();
        $this->company = new Company();
        $this->contacts = new Contacts();
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    private function form($param = -1) 
    {
        $this->city();
        $this->company();
        $this->contacts();
        $this->this();
    }

    private function city() 
    {
        $this->data['city'] = $this->city->__list();
    }
    
    private function company() 
    {
        $this->data['company'] = $this->company->__list();
    }

    private function contacts() 
    {
        $this->data['contacts'] = $this->contacts;
    }

    private function this() 
    {
        $this->data['this'] = $this;
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->data); }
}