<?php

use App\Controller\AbstractController;

?>
<div id="main-container">
    <div class="side-bar-container">
        <nav id="navbar">
            <div>
                <a href="/?c=user&a=contact-us">Contact</a>
            </div>
            <?php

            if (AbstractController::isAdmin()) {?>
                <div>
                    <a href="/?c=user&a=add-section">Espace admin</a>
                </div><?php
            }
            ?>


            <?php
            if (!isset($_SESSION['user'])) { ?>
                <div>
                    <a href="/?c=user&a=register">Inscription</a>
                </div>

                <div>
                    <a href="/?c=user&a=login">Connexion</a>
                </div><?php
            } else { ?>
                <div>
                    <a href="/?c=user&a=edit-profile">Profil</a>
                </div>

                <div>
                    <a href="/?c=user&a=log-out">Se déconnecter</a>
                </div>

                <?php
            }

            ?>


        </nav>
    </div>

    <main id="flagSection">


    </main>


</div>

<div id="figureFlipContainer">
    <figure id="containerFlip">
        <div id="card">
            <div id="front">
                <img src="https://picsum.photos/200/300" alt="Random Image">
            </div>

            <div id="back">
                <img src="https://picsum.photos/210/310" alt="Random Image">
            </div>
        </div>
        <figcaption id="figcaptionFlip">Random Image</figcaption>
    </figure>
</div>
