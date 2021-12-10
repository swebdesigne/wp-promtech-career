<?

class Tools {
    
    static function checkTemplateExist($path) {
        if (file_exists(get_stylesheet_directory().'/'.$path.'.php')) return true;
        else throw new \Exception("Файл ".get_stylesheet_directory().'/'.$path." не найден");
    }

    static function view($path, $params) {
        if (self::checkTemplateExist($path)) 
            get_template_part($path, 'single', $params);
    }

    static function mdd($arr) {
        echo "start =============== start";
        echo "<pre>";
        print_r($arr);
        die('end =============== end');
    }
    
    static function md($arr) {
        echo "start =============== start";
        echo "<pre>";
        print_r($arr);
        echo 'end =============== end';
    }

}