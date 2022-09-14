<?php

use App\Controller\AbstractController;

if (!AbstractController::isAdmin()) {
    header("Location: /?c=home&f=accessDenied");
}
?>

<div>
    <h1>Ajoutez une section: </h1>
    <fieldset>
        <form action="/?c=section&a=add-section" method="post">
            <label for="title">Titre : </label>
            <input type="text" id="title" name="title" placeholder="Titre..." minlength="4" maxlength="50" required>

            <label for="content">Contenu : </label>
            <input type="text" id="content" name="content" placeholder="Titre..." minlength="4" maxlength="255" required>

            <input type="submit" value="Ajouter" name="submit" required>
        </form>

    </fieldset>
</div>