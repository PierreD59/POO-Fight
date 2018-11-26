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

    public function addCharacter()
    {
        $bdd = getData();
        $bdd = $this->getDb()->prepare('INSERT INTO perso(id, name, damage) VALUES(:id, :name, :damage)');

        $bdd->bindValue(':id', $perso->getId());
        $bdd->bindValue(':name', $perso->getName(), PDO::PARAM_INT);
        $bdd->bindValue(':damage', $perso->getDamage(), PDO::PARAM_INT);

        $bdd->execute();
    }

    public function deleteCharacter($perso) 
    {
        if ($_damage = 100) 
        {
            $bdd = getData();
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
            $arrayOfCharacter[] = new User($user);
        }

        return $arrayOfCharacter;
    }

}

