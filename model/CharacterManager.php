<?php 

class CharacterManager 
{

    private $_db;

    /**
     * Constructor
     * 
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */

    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     * 
     * @param PDO $db
     * @return  self
     */

    public function setDb(PDO $db)
    {
        $this->_db = $db;
        return $this;
    }

    public function addCharacter($test)
    {
        $bdd = $this->getDb()->prepare('INSERT INTO perso(name, damage) VALUES(:name, :damage)');

        $bdd->bindValue(':name', $test->getName(), PDO::PARAM_STR);
        $bdd->bindValue(':damage', $test->getDamage(), PDO::PARAM_INT);

        $bdd->execute();
    }

    public function deleteCharacter() 
    {
        if ($damage = 100) 
        {
            $bdd = $this->getDb()->exec('DELETE FROM perso WHERE id = ' . $perso->id());
        }
    }

    public function getCharacter()
    {
        $arrayOfCharacter = [];
        $query = $this->getDb()->query('SELECT * FROM perso');
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) 
        {
            $arrayOfCharacter[] = new Character($user);
        }

        return $arrayOfCharacter;
    }

    public function update(Character $perso)
    {

        $q = $this->_db->prepare('UPDATE perso SET damage = :damage WHERE id = :id');

        $q->bindValue(':damage', $perso->hitCharacter(), PDO::PARAM_INT);
        $q->execute();

    }

}

