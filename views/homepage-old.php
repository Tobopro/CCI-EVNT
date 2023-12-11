<main>
    <div class="container-fluid">
        <!-- inscription+yellow cards container -->
        <div class="row d-flex justify-content-center mt-5  ">
            <!-- inscription section -->
            <section id="inscription" class="col-8 col-lg-4 d-flex justify-content-center d-lg-block">
                <div class="container offset-lg-2 col-8 p-0 pb-4 login-panel">
                    <div class="row">

                        <!-- logo -->
                        <img src="img/logo.svg" alt="logo-du-site-Evnt" class="login-panel__logo mb-md-4">
                        <button type="button" class="mt-md-4 d-flex flex-column align-items-center h-50"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Se connecter / S'inscrire
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-body my-modal ">
                                        <div class="row">
                                            <div class="col-lg-3 offset-lg-5">
                                                <h2>Inscription</h2>
                                            </div>
                                            <div class="col-lg-1 offset-lg-3">
                                                <button type="button" class="btn-close text-end" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                        </div>


                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1"
                                                    class="form-label mt-4">Prénom</label>
                                                <input type="name" class="form-control" id="exampleInputName1"
                                                    placeholder="Joe" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1" class="form-label mt-4">Nom</label>
                                                <input type="lastName" class="form-control" id="exampleInputLastName1"
                                                    placeholder="Doe" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label mt-4">Adresse
                                                    e-mail</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="prenom.nom@exemple.fr">
                                                <small id="emailHelp" class="form-text text-muted">Promis, on ne la
                                                    partage avec personne.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1" class="form-label mt-4">Mot de
                                                    passe</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    placeholder="*******" autocomplete="off">
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn  mt-5  ">Save changes</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- connection buttons -->
                        <a class="d-flex btn col-8 px-0 mb-2 login-panel__button"><i
                                class="fa-brands fa-google offset-1 col-3 d-flex justify-content-center align-items-center"
                                aria-hidden="true"></i>
                            <span class="col-5">Google</span>
                        </a>
                        <a class="d-flex btn col-8 px-0 mb-2 login-panel__button"><i
                                class="fa-brands fa-facebook offset-1 col-3 d-flex justify-content-center align-items-center"
                                aria-hidden="true"></i>
                            <span class="col-5">Facebook</span>
                        </a>
                        <a class="d-flex btn col-8 px-0 mb-2 login-panel__button"><i
                                class="fa-brands fa-x-twitter offset-1 col-3 d-flex justify-content-center align-items-center"
                                aria-hidden="true"></i>
                            <span class="col-5">X.com</span>
                        </a>
                        <a class="d-flex btn col-8 px-0 mb-2 login-panel__button"><i
                                class="fa-solid fa-at offset-1 col-3 d-flex justify-content-center align-items-center"
                                aria-hidden="true"></i>

                            <span class="col-5">E-mail</span>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    </section>
    <section id="cardsByThree" class="col-12 col-lg-6 d-flex align-items-center  justify-content-center ">
        <div class="row d-lg-block ">
            <div class="col-3 offset-1 offset-md-0 col-md-4 container-yellow-card-1">
                <div class=" yellow-card box--yellow">
                    <img src="./assets/img/icons/calendar-days.png" alt="icon de calendrier" class="w-50">
                    <h5 class="card-content fs-6 m-3">Créez</h5>
                </div>
            </div>
            <div class="col-3 offset-1 offset-md-0 col-md-4 container-yellow-card-2">
                <div class="yellow-card box--yellow">
                    <img src="./assets/img/icons/confettis.png" alt="icone de confettis" class="w-50">
                    <h5 class="card-content fs-6 m-3">Participez</h5>
                </div>
            </div>
            <div class="col-3 offset-1 offset-md-0 col-md-4 container-yellow-card-3">
                <div class="yellow-card box--yellow">
                    <img src="./assets/img/icons/high-five.png" alt="icone tape m'en cinq" class="w-50">
                    <h5 class="card-content fs-6 m-3">Partagez</h5>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <div class="container-fluid">
        <!-- event cards + map container -->
        <div class="row m-5 ">
            <!-- map section -->
            <section id="map_homepage" class="col-12 col-md-12 offset-0 col-lg-3 offset-lg-1 ">
                <div class="d-flex justify-content-center my-5">
                    <div id="map" class="map-homepage"></div>
                </div>
            </section>

        </div>
    </div>
    <!-- event cards section -->
    <section class="card-hcarousel">
        <div class="wrapper">
            <div class="inner">
                <?php
                // 10 est une valeure temporaire et devra etre remplacé en fonction du nombre de card evnt que l'on veut mettre dans le carousel
                for ($i = 0; $i < 10; $i++) {
                    include "../views/components/card-desktop.php";
                }
                ?>
            </div>
        </div>
    </section>

    <section id="newsletterCarousel" class=" text-black ">
        <!-- information carousel section -->
        <div id="carouselExampleInterval" class="carousel carousel-dark slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner ">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators change-buttons-newsletter">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                            class="active my-slide-button" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2" class=" my-slide-button"></button>

                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="100000">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="newsletter-content">
                                        <div class="blur-filter-vertical"></div>
                                        <img src="./assets/img/nature-morte-carte.jpg" class="d-block w-100  "
                                            alt="...">
                                        <div class="text-on-image d-none d-lg-block ">
                                            <h2 class="mb-5"> Une soirée de déglingo</h2>

                                            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione
                                                cupiditate velit, architecto dolorum
                                                repellendus incidunt nam libero maiores explicabo voluptate sequi
                                                molestias porro repellat quam ab
                                                distinctio, reprehenderit at eligendi?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-0">

                                    <div class="text-after-image d-block d-lg-none">

                                        <h2 class="mb-5 "> Une soirée de déglingo</h2>
                                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione
                                            cupiditate velit, architecto dolorum
                                            repellendus incidunt nam libero maiores explicabo voluptate sequi
                                            molestias porro repellat quam ab
                                            distinctio, reprehenderit at eligendi?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item " data-bs-interval="100000">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="newsletter-content">
                                        <div class="blur-filter-vertical"></div>
                                        <img src="./assets/img/tourne-disque-tournant-vinyle-vintage.jpg"
                                            class="d-block w-100  " alt="...">
                                        <div class="text-on-image d-none d-lg-block ">
                                            <h2 class="mb-5"> Une soirée de déglingo</h2>
                                            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione
                                                cupiditate velit, architecto dolorum
                                                repellendus incidunt nam libero maiores explicabo voluptate sequi
                                                molestias porro repellat quam ab
                                                distinctio, reprehenderit at eligendi?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-0">
                                    <div class="text-after-image d-block d-lg-none">
                                        <h2 class="mb-5 "> Une soirée de déglingo</h2>
                                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione
                                            cupiditate velit, architecto dolorum
                                            repellendus incidunt nam libero maiores explicabo voluptate sequi
                                            molestias porro repellat quam ab
                                            distinctio, reprehenderit at eligendi?</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev  " type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <!-- founders+whoAreWe container -->

        <div class="row m-3 d-flex justify-content-between  align-items-center">
            <section id="founders" class="col-12 col-lg-6 my-5 pe-5">

                <div class="row about-us ">
                    <div class="d-flex align-items-center justify-md-content-evenly flex-column flex-md-row">
                        <div class="col-12 col-md-3">
                            <div class="col-12 mb-3 text-center">
                                <img src="./assets/img/portrait.jpg" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ms-3">
                            <div class="col-12 mb-3 text-founders">
                                <h3>Tom Boyer</h3>
                                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-md-content-evenly flex-column flex-md-row-reverse">
                        <div class=" col-12 col-md-3">
                            <div class="col-12 mb-3 text-center">
                                <img src="./assets/img/portrait.jpg" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ms-3">
                            <div class="col-12 mb-3 text-founders">
                                <h3>Nicolas Kch</h3>
                                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-md-content-evenly flex-column flex-md-row">
                        <div class="col-12 col-md-3">
                            <div class="col-12 mb-3 text-center">
                                <img src="./assets/img/portrait.jpg" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ms-3">
                            <div class="col-12 mb-3 text-founders">
                                <h3>Leo Kowalski</h3>
                                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="who-are-we" class="col-12 offset-0 col-lg-5 offset-lg-1 my-5">
                <h3 class="text-center">Comment EVNT a vu le jour ? </h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis incidunt eaque debitis cumque
                    porro quasi officia tempora sequi quae, vero ipsum assumenda accusantium doloremque adipisci
                    nulla, quos deleniti? Optio, voluptatum.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis incidunt eaque debitis cumque
                    porro quasi officia tempora sequi quae, vero ipsum assumenda accusantium doloremque adipisci
                    nulla, quos deleniti? Optio, voluptatum.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis incidunt eaque debitis cumque
                    porro quasi officia tempora sequi quae, vero ipsum assumenda accusantium doloremque adipisci
                    nulla, quos deleniti? Optio, voluptatum.</p>
            </section>
        </div>
    </div>
</main>