<?

class Tools {
    
    static function checkTemplateExist($path) 
    {
        if (file_exists(get_stylesheet_directory().'/'.$path.'.php')) return true;
        else throw new \Exception("Файл ".get_stylesheet_directory().'/'.$path." не найден");
    }

    static function view($path, $params) 
    {
        if (self::checkTemplateExist($path)) 
            get_template_part($path, 'single', $params);
    }

    static function clearPhone($str) 
    {
        return preg_replace("/[^0-9]/", "", $str);
    }

    static function mdd($arr)
     {
        echo "\nstart =============== start\n";
        echo "<pre>";
        print_r($arr);
        die("\nend =============== end\n");
    }
    
    static function md($arr) 
    {
        echo "\nstart =============== start\n";
        echo "<pre>";
        print_r($arr);
        echo "\nend =============== end\n";
    }

}