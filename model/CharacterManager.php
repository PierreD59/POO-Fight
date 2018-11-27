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
            $bdd = $this->getDb()->exec('DELETE FROM perso WHERE id = ' . $perso->id());
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
    public function getCharacterById(int $id)
    {
        $characterId;

        $query = $this->getDb()->prepare('SELECT * FROM perso WHERE id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $takeCharacter = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($takeCharacter as $character) {
            $characterId = new Character($character);
        }

        return $characterId;
    }

    public function update(Character $perso)
    {

        $q = $this->_db->prepare('UPDATE perso SET damage = :damage WHERE id = :id');

        $q->bindValue(':id', $perso->getId(), PDO::PARAM_INT);
        $q->bindValue(':damage', $perso->getDamage(), PDO::PARAM_INT);
        $q->execute();

    }

}

