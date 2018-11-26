<?php
require '../entities/Character.php';
require '../model/Database.php';
require '../model/CharacterManager.php';

$characterManager = new CharacterManager(Database::DB());
$perso = $characterManager->getCharacter();

$name = $_POST['name'];
$damage = $_POST['damage'];


if(isset($name) and !empty($name)) {
    echo "Character create !";
}


include "../views/CombatView.php";
