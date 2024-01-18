<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <section id="filter" class="container-fluid">
        <!-- Selection Filter -->
        <div class="row bg-warning d-flex justify-content-end mt-md-3 border rounded mx-0 mx-lg-5 py-2">



            <form action="" method="GET">
                <label for="search">Rechercher: </label>
                <input id="search" type="text" name="search" value="<?php $searchField ?>">
                <input type="hidden" name="url" value="my_users">
                <input type="submit" value="Rechercher">

            </form>
        </div>
    </section>

        <h2 class="title-section col-6">Tous les utilisateurs</h2>
        <a class="col-6" href="index.php?url=my_events"><h2 class="title-section">Tous les événements</h2></a>
    <div class="justify-content-center d-flex">
                        <p>
                            <?php
                            // Supposons que $totalPages soit le nombre total de pages
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<a style="color:black; text-decoration:underline;" href="?url=my_users&page=' . $i . '">' . $i . '</a> ';
                            }
                            ?>
                        </p>
                    </div>
           <?php foreach ($hydratedUsers as $hydratedUser) : ?>
       
            <article class="evnt-single col-3 m-5">
                <a href="">
                    <img class="img-une" src="<?php echo $hydratedUser->getProfilePicture() ?>"
                        alt="photographie d'un groupe de fêtard" />
                    <div class="padding-evnt">
                        <ul class="details-evnt">
                            <li> <?php echo $hydratedUser->getEmail() ?></li>
                            <li> <?php echo $hydratedUser->getFirstName() ?></li>
                            
                            <div class="container">

                                <?php $id=$hydratedUser->getUserId();?>
                                <div class="row">
                                    <form action="/handlers/user-handler.php" method="POST">
                                        <input type="text" name="action" value="delete" hidden>
                                        <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                            
                              
                                    <form action="/index.php?url=my_users_update" method="POST">
                                        <input type="text" name="action" value="displayUpdateForm" hidden>
                                        <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                        <button type="submit" class="btn btn-warning">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        
                             
                        </ul>
                     


                    </div>
                </a>
            </article>
        <?php endforeach; ?>
        
    </div>
</div>
