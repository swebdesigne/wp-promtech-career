<?

class Tools {
    
    static function checkTemplateExist($path) {
        if (file_exists(get_stylesheet_directory().'/'.$path.'.php')) return true;
        else throw new \Exception("Файл ".get_stylesheet_directory().'/'.$path." не найден");
    }

    static function template($path, $params) {
        if (self::checkTemplateExist($path)) 
        get_template_part($path, 'single', $params);
    }

}