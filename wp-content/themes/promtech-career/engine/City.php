<?

class City extends ModalCity {
    private $city;
    private $title;
    public $property;
    private $city_id;
    private $dir_template = 'engine/view/city/';

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

    public function getCityId() 
    {
        return $this->title;
    }

    public function setCityId($id)
    {
        $this->city_id = $id;
    }

    public function __list($param = -1) {
        return $this->db_city($param);
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->city); }
}