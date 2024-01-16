<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <h2 class="title-section col-6">Tous les utilisateurs</h2>
        <a class="col-6" href="index.php?url=my_events"><h2 class="title-section">Tous les événements</h2></a>
        
    
        <?php foreach ($hydratedUsers as $hydratedUser) : ?>
       
            <article class="evnt-single col-3 m-5">
                <a href="">
                    <img class="img-une" src="assets/img/energetic-dancer-dynamic-glamorous-light.jpg"
                        alt="photographie d'un groupe de fêtard" />
                    <div class="padding-evnt">
                        <ul class="details-evnt">
                            <li> <?= $hydratedUser->getEmail() ?></li>
                            <li> <?= $hydratedUser->getFirstName() ?></li>
                            
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
