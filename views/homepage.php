<body id="body-homepage">
    <header>

    </header>
    <main id="homepage">
        <section id="introduction">
            <div class="container-homepage">
                <h1><span class="yellow">Rencontrer du monde</span> n'a jamais été aussi facile</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. </p>
                <a href="" class="btn btn-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        width="24px" height="24px">
                        <path
                            d="M 12 4 A 4 4 0 0 0 12 12 A 4 4 0 0 0 12 4 z M 12 14 C 5.9 14 4 18 4 18 L 4 20 L 20 20 L 20 18 C 20 18 18.1 14 12 14 z" />
                    </svg> Je crée mon compte EVNT</a>

                <ul>
                    <li>
                        <img src="assets/img/icons/icon-argument-calendar-create.svg" alt="icone calendrier avec plus">
                        <strong>Créez</strong>
                        <p>votre évènement lorem ipsum dolor iset</p>
                    </li>
                    <li>
                        <img src="assets/img//icons/icon-argument-party-participate.svg"
                            alt="icone personnes en train de danser">
                        <strong>Participez</strong>
                        <p>votre évènement lorem ipsum dolor iset</p>
                    </li>
                    <li>
                        <img src="assets/img/icons/icon-argument-group-share.svg" alt="icone groupe de personnes">
                        <strong>Partagez</strong>
                        <p>votre évènement lorem ipsum dolor iset</p>
                    </li>
                </ul>
            </div>
        </section>

        <section id="last-evnt">
            <div class="container-homepage">
                <h2>Les dernier <span class="yellow">EVNT</span></h2>
                <a href="" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        width="24px" height="24px">
                        <path
                            d="M 11 5 L 11 11 L 5 11 L 5 13 L 11 13 L 11 19 L 13 19 L 13 13 L 19 13 L 19 11 L 13 11 L 13 5 L 11 5 z" />
                    </svg> Créer un Evnt</a>
                <a href="" class="btn btn-secondary">Voir tous les Evnt</a>
            </div>

            <!-- event cards section -->
            <article class="card-hcarousel">
                <div class="wrapper">
                    <div class="inner">
                        <ul class="carousel-evnt container">
                            <!-- data-flickity='{ "cellAlign": "left", "contain": true, "prevNextButtons": false }' -->
                            <?php
                            // 10 est une valeure temporaire et devra etre remplacé en fonction du nombre de card evnt que l'on veut mettre dans le carousel
                            for ($i = 0; $i < 10; $i++) {
                                echo "<li>";
                                include "../views/components/card.php";
                                echo "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </article>
        </section>

        <section id="quoi-evnt">
            <div class="container-homepage">
                <h2>C'est quoi <span class="white">EVNT</span> ?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                    ut
                    aliquip ex ea commodo consequat. </p>
                <a href="" class="btn btn-secondary">En savoir plus sur Evnt</a>
            </div>
        </section>

        <section id="evnt-passes" class="container-homepage">
            <h2>Les <span class="yellow">EVNT</span> passés</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et
                dolore magna aliqua.</p>
        </section>
    </main>

<footer >
    <div class="footer-homepage">
		<section id="newsletter">
			<div class="container">
				<div>
					<h2>Ne manquez pas les prochains <span class="white">EVNT</span></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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

</html>