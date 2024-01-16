<main>
    <div class="cover-and-info">
        <div class="cover-picture">
            <button class="cover-picture__btn">
                <a href="?url=edition_profil">
                    <p>Modifier</p>
                </a>
            </button>
            <img src="./assets/img/tourne-disque-tournant-vinyle-vintage.jpg" alt="">
        </div>
        <div class="container-fluid">
            <div id="profile-up" class="row ">
                <div id="profile-picture" class="col-3 col-lg-2 mx-lg-5 mx-md-1 mx-0">
                    <img src="./assets/img/portrait.jpg" alt="">
                </div>
                <div id="profile-name" class="col-2 col-lg-1  ms-md-5 ms-lg-0 position-relative  mt-lg-0 text-center ">
                    <p>
                        <?php echo $user->getLastName() ?><br>
                        <?php echo $user->getFirstName() ?>
                    </p>
                </div>
                <div id="profile-numbers" class="col-3 col-md-4 col-lg-1 offset-2 offset-lg-6  mt-lg-0">
                    <div class="row">
                        <div class="col-12">
                            <p>
                                <?php echo $user->getCity() ?>
                            </p>
                        </div>
                        <div class="col-12 d-block d-lg-none ">
                            <p> Abonnés</p>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <p> Evénements</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php displayErrorsAndMessages(); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-lg-8 my-auto">
                <div id="future-events" class="mx-5">
                    <h4> Evenements à venir</h4>

                    <div class="col-12  justify-content-center d-flex">
                        <section id="carouselCard" class="row flex-wrap ">
                            <div id="carouselExampleControls" class="carousel slide carousel-dark"
                                data-bs-ride="carousel">
                                <div class="carousel-inner ">
                                    <div class="carousel-item active">
                                        <div class="d-flex car-item">
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="d-flex car-item">
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                    </div>
                </div>


                <div id="interests" class="mx-5">
                    <h4> Centres d'interêts</h4>
                    <div class=" py-2 mb-5 box--yellow fs-5">
                        <ul>
                            <li>Bar à jeux</li>
                            <li>Sport</li>
                            <li>Sortie culturelle</li>
                        </ul>
                    </div>
                </div>
                <div id="bio" class="mx-5">
                    <h4> Description</h4>
                    <div class=" p-3 mb-5 box--yellow fs-5">
                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore
                            reprehenderit, autem
                            recusandae
                            aspernatur minus eaque repellat fuga rem placeat exercitationem consequatur
                            beatae
                            voluptatum
                            sunt
                            architecto repellendus non dignissimos quas quam.</p>
                    </div>
                </div>

                <div id="past-events" class="mx-5 mb-5">
                    <div class="col-12  justify-content-center d-flex">
                        <section id="carouselCard" class="row flex-wrap ">
                            <div id="carouselExampleControls" class="carousel slide carousel-dark"
                                data-bs-ride="carousel">
                                <div class="carousel-inner ">
                                    <div class="carousel-item active">
                                        <div class="d-flex car-item">
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="d-flex car-item">
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-il-desktop">
                                                <div class="card-il-desktop__bot">
                                                    <div class="card-il-desktop__bot-left">
                                                        <div class="card-il-desktop__bot-left-content">
                                                            <h2>Titre de l'evnt</h2>
                                                            <h3>Nom de l'organisateur</h3>
                                                        </div>
                                                        <a class="card-il-desktop__bot-left-btn" href="">Page de
                                                            l'Evnt</a>
                                                    </div>
                                                    <div class="card-il-desktop__bot-right">
                                                        <div class="card-il-desktop__bot-right-i">
                                                            <i
                                                                class="fa-regular fa-heart card-il-desktop__bot-right-i-like"></i>
                                                            <i
                                                                class="fa-solid fa-share-nodes card-il-desktop__bot-right-i-share"></i>
                                                        </div>
                                                        <div class="card-il-desktop__bot-right-u">
                                                            <i class="fa-solid fa-user"></i>
                                                            <p>3/12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div id="indicators-lg" class="col-0 col-lg-3 d-none d-lg-block">
                <div class="box__profile--black mt-5 mt-lg-0">
                    <div class="black-card  ">
                        <p><span class="indicator__number--size">22</span><br>participations</p>
                    </div>
                </div>
                <div class="box__profile--black  mt-5">
                    <div class="black-card  ">
                        <p><span class="indicator__number--size">13</span><br>participations</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>