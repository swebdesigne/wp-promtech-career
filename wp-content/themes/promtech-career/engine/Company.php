<?
// header('Content-Type: text/html; charset=utf-8');
class Company extends ModalCompany {
    private $data;
    private $dir_template = 'engine/view/company/';

    public function __construct($initMethod = '', $param = '')
    {
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function getAboutCompany() 
    {
        $about[] = $this->db_about_company();
        $this->get_data($about);
        $this->data['about'] =  $about[0];
        //  Tools::mdd($this->data['about']);
    }

    public function set($initMethod = '', $param = '')
    {
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function getData($name = '')
    {
        if (!empty($name)) return $this->data[$name];
        return $this->data;
    }


    public function get_list($param = -1) 
    {
        $this->data['company'] = $this->db_company($param);
        $this->get_data($this->data['company']);
    }

    public function __list($param = -1) 
    {
        return $this->db_company($param);
    }

    public function single_video($name) 
    {
        $this->data['video'] = $this->db_single_video($name);
        return $this->data['video'];
    }

    public function interview_of_company($name)
     {
        $this->data['interview_of_company'] = $this->db_interview_of_company($name);
        return $this->data['interview_of_company'];
    }

    public function interview($param) 
    {
        $this->data['interview'] = $this->db_interview($param);
    }

    public function single_interview($param) 
    {
        $this->data['single_interview'] = $this->db_single_interview($param);
    }

    public function view($tamplate){ Tools::view($this->dir_template.$tamplate, $this->data); }
}