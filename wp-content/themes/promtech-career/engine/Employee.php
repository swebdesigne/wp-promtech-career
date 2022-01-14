<?php

class Employee extends ModalEmployee {
    private $data;
    private $dir_template = 'engine/view/employess_and_partners/';
    function __construct()
    {
        $this->info();
    }

    public function getInfo($name) 
    {
        return $this->data[$name];
    }

    private function info() 
    {
        $this->data['info'] = $this->db_employee();
        $this->data['category'] = $this->db_data_category();
    }

    public function get_single() {
        return $this->db_data_single();
    }

    public function view($tamplate) { Tools::view($this->dir_template.$tamplate, $this->data); }
}