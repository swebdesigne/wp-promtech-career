<?

interface PropertyContainerInterface {
    public function addProperty($propertyName, $value);

    public function updateProperty($propertyName, $value);

    public function deleteProperty($propertyName);

    public function getProperty($propertyName);
}