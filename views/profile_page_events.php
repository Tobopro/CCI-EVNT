<main>
    <div class="cover-and-info">
        <div class="cover-picture">
            <img src="<?php echo $user->getCoverPicture() ?>" alt="">
        </div>
        <div class="container-fluid">
            <div id="profile-up" class="row ">
                <div id="profile-picture" class="col-3 col-lg-2 mx-lg-5 mx-md-1 mx-0">
                    <img src="<?php echo $user->getProfilePicture() ?>" alt="">
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
        
        </div>
    </div>
</main>