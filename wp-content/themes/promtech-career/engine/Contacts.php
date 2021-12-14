<?

class Contacts {
    private $contacts = [];
    private $dir_template = 'engine/view/contacts/';

    public function __construct($initMethod = '', $param = '')
    {   
        $this->contacts();
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
        return $this->contacts['address'][0];
    }

    public function getContacts() 
    {
        return $this->contacts;
    }

    private function contacts() 
    {
        $this->contacts = [
            'phone' => ['+7 (800) 200-85-89', '+7 (925) 406-01-14', '+7 (925) 406-11-80'],
            'mail' => ['hh@aerospace-systems.ru', 'hh@promtech-dubna.ru'],
            'address' => ['141983 Московская область Дубна ул. Программистов д. 4'],
        ];
    }
}