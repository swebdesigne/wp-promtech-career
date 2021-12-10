<?

class CompanyPropertyContainer implements PropertyContainerInterface {
    private $propertyContainer = [];

    public function addProperty($propertyName, $value) 
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    public function updateProperty($propertyName, $value) 
    {
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new \Exception("Property $propertyName not found");
        } 
        $this->propertyContainer[$propertyName] = $value;
    }

    public function deleteProperty($propertyName) 
    {
         unset($this->propertyContainer[$propertyName]);
    }

    public function getProperty($propertyName) 
    {
        return (!empty($this->propertyContainer[$propertyName])) ? $this->propertyContainer[$propertyName] : null;
    }
}