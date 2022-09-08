<?php
if (isset($data['pageName'])) {
    $pageName = $data['pageName'];
}

?>

<div>
    <p class="error404">Une erreur est survenue : ERROR 404 la page demandée : <span id="askPage"><?= $pageName ?></span>
        est introuvable.</p>
</div>