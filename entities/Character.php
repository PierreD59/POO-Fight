<?php 
declare(strict_types = 1);

class Character
{
    private $id,
            $name,
            $damage;


    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) 
        {
            // get the name of the setter
            $method = 'set' . ucfirst($key);
                
            // if setter exist
            if (method_exists($this, $method)) 
            {
            // call setter
                $this->$method($value);
            }
        }
    }

    public function setId($id)
    {
        $id = (int) $id;
        $this->_id = $id;
        return $this;
    }
    public function setName(string $name)
    {
        $this->_name = $name;
        return $this;
    }
    public function setDamage($damage)
    {
        $damage = (int) $damage;
        $this->_damage = $damage;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function getDamage()
    {
        return $this->_damage;
    }

}
