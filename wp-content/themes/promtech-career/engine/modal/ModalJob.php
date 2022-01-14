<?

class ModalJob {
    protected function db_job($param) 
    {
        $salary = $this->salary();

        return get_posts( ['numberposts' => $param, 'post_type' => 'job', 'meta_key' => 'internship', 'meta_value'=> 0,
         "orderby" => "salary_from", "order" => "desc", "orderby" => "salary_to", "order" => "desc"
        ] );

    }

    private function salary() {
        $salary = [];
        extract($_GET);
        if (isset($salary_from)) {
            return [
                'relation'		=> 'AND',
                array(
                    'key'	 	=> 'salary_from',
                    'value'	  	=> $salary_from,
                    'compare' 	=> '<=',
                ),
                array(
                    'relation'		=> 'OR',
                    array(
                        'key'	 	=> 'salary_to',
                        'value'	  	=> $salary_from,
                        'compare' 	=> '>=',
                    ),
                    array(
                        'key'	 	=> 'salary_to',
                        'value'	  	=> '',
                        'compare' 	=> '=',
                    )
                ),
            ];
        } 
        return '';
    }

    protected function db_ajax_job($param) 
    {//'offset' => $param['offset'],
        return get_posts( ['numberposts' => -1,  'post_type' => 'job', 'meta_key' => 'internship', 'meta_value'=> 0,
        "orderby" => "salary_from", "order" => "desc", "orderby" => "salary_to", "order" => "desc"
        ] );
    }
    
    protected function db_ajax_internship($param) 
    {//'offset' => $param['offset'],
        return get_posts( ['numberposts' => -1,  'post_type' => 'job', 'meta_key' => 'internship', 'meta_value'=> 1,
        "orderby" => "salary_from", "order" => "desc", "orderby" => "salary_to", "order" => "desc"
        ] );
    }
    
    protected function db_taxonomy_job($param) 
    {
        return get_terms( 'teg_job', ['number' => $param] );
    }

    protected function db_internship($param) 
    {
        return get_posts( ['numberposts' => $param, 'post_type' => 'job', 'meta_key' => 'internship', 'meta_value'=>1] );
    }

}