<?php

use App\Controller\AbstractController;
use App\Model\Entity\User;

if (isset($data['user'])) {
    /* @var User $user */
    $user = $data['user'];
}
?>

<div>
    <h1>Profil</h1>
    <p> Mail: <?= $user->getEmail() ?></p>
    <?php
    if (!AbstractController::isAdmin()) {?>
    <a href="/?c=user&a=delete">Supprimer le compte</a><?php
}?>

</div>

