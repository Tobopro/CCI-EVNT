<header>
    <nav class="navigation ">
        <div class="row  align-items-center px-2 justify-content-between ">
            <div class="col-1 ">
                <a href="?url=home"><img src="./assets/img/logo.svg" alt="logo" class="navigation__logo"></a>
            </div>

            <div class="col-3 col-lg-2 offset-1 navigation__hidden find-evnt-button">
                <a href="?url=dashboard">
                    <button type="button" class="find-evnt-button">Trouver un Evnt</button>
                </a>
            </div>

            <div class="col-3 col-lg-3 offset-2 text-end navigation__hidden">
                <a href="?url=creation_EVNT">
                    <button type="button" class="evnt-button"><i class="fas fa-plus"></i> Créer un Evnt</button>
                </a>
            </div>

            <?php
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    // Utilisateur connecté
  
    echo '<div class="col-4 col-lg-3 p-2 text-end offset-lg-0 login-register">';
   
    echo '<a href="?url=logout">';
    echo '<i class="fa-solid fa-circle-xmark fa-2xl px-2 yellow-icon d-inline-block  "></i>';
    echo '</a>';
    
    echo '<a href="?url=profile">';
    echo '<div class="navigation__hidden d-lg-inline-block">' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '</div>';
    echo '<i class="fa-solid fa-circle-user fa-2xl px-2 yellow-icon d-inline-block  "></i>';
    echo '</a>';
    echo '</div>';
} else {
    // Utilisateur non connecté
    echo '<div class="col-5 col-lg-3 p-2 text-end offset-lg-0 login-register">';
    echo '<a href="?url=logout">';

    echo '<div class="navigation__hidden d-lg-inline-block">Se connecter/s\'inscrire</div>';
    echo '</a>';
    echo '<a href="?url=profile">';
    echo '<i class="fa-solid fa-circle-user fa-2xl px-2 yellow-icon d-inline-block  "></i>';
    echo '</a>';
    echo '</div>';
}
?>
            
        </div>

        <div class=" navigation__bottom align-items-center ">
            <div class=""><a href="?url=carte"><i class="fa-solid fa-map fa-2xl yellow-icon "></i></a></div>
            <div class=""><a href="?url=creation_EVNT"><i class="fas fa-plus fa-2xl yellow-icon"></i></a></div>
            <div class=""><a href="?url=dashboard"><i class="fa-solid fa-grip-vertical fa-2xl yellow-icon"></i></a>
            </div>
        </div>
    </nav>
</header>