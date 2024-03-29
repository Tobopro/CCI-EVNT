<body id="body-homepage">
    <main id="homepage">
        <section id="introduction">
            <div class="container-homepage">
                <h1><span class="yellow">Rencontrer du monde</span> n'a jamais été aussi facile</h1>
               

                <?php if (!Auth::getCurrentUser()): ?>
                    <a href="?url=creation_profile" class="btn btn-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                            <path
                                d="M 12 4 A 4 4 0 0 0 12 12 A 4 4 0 0 0 12 4 z M 12 14 C 5.9 14 4 18 4 18 L 4 20 L 20 20 L 20 18 C 20 18 18.1 14 12 14 z" />
                        </svg> Je crée mon compte EVNT
                    </a>
                <?php endif ?>

                <ul>
                    <li>
                        <img src="assets/img/icons/icon-argument-calendar-create.svg" alt="icone calendrier avec plus">
                        <strong>Créez</strong>
                        <p>Envie de faire découvrir vos centres d'intêréts ?</p>
                    </li>
                    <li>
                        <img src="assets/img//icons/icon-argument-party-participate.svg"
                            alt="icone personnes en train de danser">
                        <strong>Participez</strong>
                        <p>Envie d'élargir votre cercle social ? </p>
                    </li>
                    <li>
                        <img src="assets/img/icons/icon-argument-group-share.svg" alt="icone groupe de personnes">
                        <strong>Partagez</strong>
                        <p>Envie de créer des moments inoubliables ? </p>
                    </li>
                </ul>
            </div>
        </section>

        <section id="last-evnt">
            <div class="container-homepage">
                <h2>Les dernier <span class="yellow">EVNT</span></h2>
                <a href="?url=creation_EVNT" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" width="24px" height="24px">
                        <path
                            d="M 11 5 L 11 11 L 5 11 L 5 13 L 11 13 L 11 19 L 13 19 L 13 13 L 19 13 L 19 11 L 13 11 L 13 5 L 11 5 z" />
                    </svg> Créer un Evnt</a>
                <a href="?url=dashboard" class="btn btn-secondary">Voir tous les Evnt</a>
            </div>

            <!-- event cards section -->
            <article class="card-hcarousel">
                <div class="wrapper">
                    <div class="inner">
                        <ul class="carousel-evnt container">
                            <!-- data-flickity='{ "cellAlign": "left", "contain": true, "prevNextButtons": false }' -->
                        <?php foreach ($hydratedEvents as $hydratedEvent):

                        ?>
                    <li>
                    <article class="evnt-single mb-2">
                        <a href="<?php ec('?url=evnt&id=' . $hydratedEvent->getId()) ?>">
                            <img class="img-une" src="assets/img/energetic-dancer-dynamic-glamorous-light.jpg"
                                alt="photographie d'un groupe de fêtard" />
                            <div class="padding-evnt">
                                <ul class="details-evnt">
                                    <li><img src="assets/img/icons/icon-map-marker.svg" alt="icone map marker" />
                                        <?php  ec($hydratedEvent->getAdress()) ?>
                                    </li>
                                    <li><img src="assets/img/icons/icon-calendar.svg" alt="icone calendrier" />
                                        <?php ec($hydratedEvent->getDateEvnt()) ?>
                                    </li>
                                    <li><img src="assets/img/icons/icon-group.svg" alt="icone groupe" />
                                        <?php ec($hydratedEvent->getNbParticipants()) ?>
                                    </li>
                                </ul>
                                <h3>
                                    <?php ec($hydratedEvent->getTitle()) ?>
                                </h3>
                                <ul class="liste-categories">
                                    <li>
                                        <?php $hydratedEvent->getCategoryName(); ?>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </article>
                        </li>
                    <br>
                    <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </article>
        </section>

        <section id="quoi-evnt">
            <div class="container-homepage">
                <h2>C'est quoi <span class="white">EVNT</span> ?</h2>
                <p>EVNT est une plateforme en ligne pour permettre à ses utilisateurs de créer,</p><p> partager, et rejoindre différents événements dans leurs alentours.​</p><br><p>
Regroupés en différents groupes de centre d’intérêts,</p><p> EVNT permet de trouver avec facilité une communauté</p><p> qui partage les mêmes centres d’intérêts. </p><br>
                <a href="" class="btn btn-secondary">En savoir plus sur Evnt</a>
            </div>
        </section>

        <section id="evnt-passes" class="container-homepage">
            <h2>Les <span class="yellow">EVNT</span> passés</h2>
            <p>Section en construction.</p>
        </section>
    </main>

    <footer>
        <div class="footer-homepage">
            <section id="newsletter">
                <div class="container-homepage">
                    <div>
                        <h2>Ne manquez pas les prochains <span class="white">EVNT</span></h2>
                        <p>Section en construction.</p>
                    </div>

                    <form>
                        <input type="email" name="your-email" placeholder="Votre adresse email">
                        <input type="submit" name="send" value="Envoyer">
                    </form>
                </div>
            </section>

            <section id="nav-footer" class="container">

                <div>
                    <img src="assets/img/evnt-logo-jaune.svg" alt="logo EVNT">
                    <address>
                        EVNT Group<br />
                        234 avenue de Colmar<br />
                        01 02 03 04 05<br />
                        evnt-group@email.fr
                    </address>
                </div>

                <nav>
                    <ul>
                        <li><a href="">Mon compte EVNT</a></li>
                        <li><a href="">Qui sommes-nous ?</a></li>
                        <li><a href="">Consulter les EVNT</a></li>
                        <li><a href="">Créer un EVNT</a></li>
                    </ul>
                </nav>

                <nav>
                    <ul>
                        <li><a href="">Mentions légales</a></li>
                        <li><a href="">Politique de confidentialité</a></li>
                        <li><a href="">Plan du site</a></li>
                        <li><a href="">Contacter EVNT</a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </footer>
</body>