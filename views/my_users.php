<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <h2 class="title-section">Tous les événements</h2>
    
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
                                        <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
                                    </form>
                                </div>
                            </div>
                            <li><a class="btn btn-warning" href="handlers/user_update_handler.php?id=<?= $hydratedUser->getUserId() ?>">Modifier</a></li>
                             
                        </ul>
                     


                    </div>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</div>
