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

    <main>


        <!-- Hobbies, diplôme, expériences etc... -->
        <section id="hobbies">
            <h2>Lorem</h2>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, non!
            </div>
            <aside>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Beatae nisi possimus quasi totam! Beatae commodi dignissimos eius
                    exercitationem explicabo natus, nisi reprehenderit sunt temporibus voluptate?
                    Cum deserunt ipsam praesentium sunt?
                </p>
            </aside>
        </section>

        <section>
            <h2>Lorem</h2>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, labore.
            </div>
            <aside>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Beatae nisi possimus quasi totam! Beatae commodi dignissimos eius
                    exercitationem explicabo natus, nisi reprehenderit sunt temporibus voluptate?
                    Cum deserunt ipsam praesentium sunt?
                </p>
            </aside>
        </section>

        <section>
            <h2>Lorem</h2>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, labore.
            </div>
            <aside>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Beatae nisi possimus quasi totam! Beatae commodi dignissimos eius
                    exercitationem explicabo natus, nisi reprehenderit sunt temporibus voluptate?
                    Cum deserunt ipsam praesentium sunt?
                </p>
            </aside>
        </section>

        <section>
            <h2>Lorem</h2>
            <dl>
                <dt>Lorem</dt>
            </dl>

            <aside>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Beatae nisi possimus quasi totam! Beatae commodi dignissimos eius
                    exercitationem explicabo natus, nisi reprehenderit sunt temporibus voluptate?
                    Cum deserunt ipsam praesentium sunt?
                </p>
            </aside>
        </section>

        <section>
            <h2>Lorem</h2>
            <table>
                <thead>
                <tr>
                    <th colspan="2">Lorem ipsum.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit.</td>
                </tr>
                </tbody>
            </table>
            <aside>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Beatae nisi possimus quasi totam! Beatae commodi dignissimos eius
                    exercitationem explicabo natus, nisi reprehenderit sunt temporibus voluptate?
                    Cum deserunt ipsam praesentium sunt?
                </p>
            </aside>
        </section>

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
    </main>

</div>