<?

class Main {
    public static function init($className, $initMethod, $param = '')
    {
        if (class_exists($className)) return new $className($initMethod, $param);
        else throw new \Exception("Класс $className не найден");
    }
}