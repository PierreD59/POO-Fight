<?php 

// if (!isset($_GET['page'])) {
//     require('controllers/CombatController.php');
// } else {
//     require('controllers/' . htmlspecialchars($_GET['page']) . 'Controller.php');
// }

header('Location: controllers/CombatController.php');