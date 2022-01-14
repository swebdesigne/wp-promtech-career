<?

class Contacts {
    private $contacts = [];
    private $entire_learning;
    private $dir_template = 'engine/view/contacts/';

    public function __construct($initMethod = '', $param = '')
    {   
        $this->contacts();
        $this->entire_learning();
        if(!empty($initMethod)) $this->$initMethod($param);
    }

    public function getPhone() 
    {
       return $this->contacts['phone'];
    }

    public function getMail() 
    {
        return $this->contacts['mail'];
    }

    public function getAddress() 
    {
        return $this->contacts['address'];
    }

    public function getContacts() 
    {
        return $this->contacts;
    }

    public function get_entire_learning_hr() 
    {
        return $this->entire_learning['hr'];
    }
  
    public function get_entire_learning_phone() 
    {
        return $this->entire_learning['phone'];
    }

    public function get_entire_learning_mail() 
    {
        return $this->entire_learning['mail'];
    }

    private function contacts() 
    {
        $this->contacts = [
            'phone' => ['+7 (800) 200-85-89', '+7 (925) 406-01-14', '+7 (925) 406-11-80'],
            'mail' => ['hh@aerospace-systems.ru', 'hh@promtech-dubna.ru'],
            'address' => '141983, Московская область, Дубна, ул. Программистов, д. 4',
        ];
    }

    private function entire_learning() 
    {
        $this->entire_learning = [
            'hr' => 'Кондрашова Мария',
            'phone' => '+7 (495) 526-69-77',
            'mail' => 'KondrashovaMS@aks.aero',
        ];
    }
}