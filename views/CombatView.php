 <?php require 'template/header.php'; ?>


 <form method="post" action="CombatController.php?start=loading">

 <label for="name">Name</label>
 <input name="name" id="name" type="text">

 <input type="submit" value="Click">
 </form>

<div class="container-fluid">
    <div class="row">

<?php foreach ($persos as $perso) { ?>

    <div class="bg-dark m-5 p-5 text-light">
        <p>Name = <?= $perso->getName(); ?></p>
        <a href="CombatController.php?id=<?php $perso->getId(); ?>"><p>Damage = <?= $perso-> getDamage(); ?></p></a>
    </div>

<?php } ?>

    </div>
</div>

 <?php require 'template/footer.php'; ?>