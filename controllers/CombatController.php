<?php
require '../entities/Character.php';
require '../model/Database.php';
require '../model/CharacterManager.php';

$characterManager = new CharacterManager(Database::DB());
$persos = $characterManager->getCharacter();


if(isset($_GET['id'])) 
{
    $toto = $characterManager->getCharacterById(27);
    $toto->hitCharacter();
    $hit = $characterManager->update($toto);

    if($hit >= 100) {
        $toto->deleteCharacter($hit);
    }
}

if(isset($_GET['start'])) 
{
    if($_GET['start'] == 'loading') 
    {
        $name = $_POST['name'];
        if(isset($name) && !empty($name)) {
            $test = new Character([
                "name" => $name,
                "damage" => 0
                ]);
            $characterManager->addCharacter($test);
        }
    }
}


include "../views/CombatView.php";
