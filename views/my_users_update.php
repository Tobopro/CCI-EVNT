 <main>

 <h2>Modifier Utilisateur <?php echo $user->getUserId() ?></h2>
<!-- /handlers/user-handler.php -->
    <form action="handlers/user-handler.php" method="post">
    <input type="text" name="action" value="UpdateAsAdmin" hidden>
    <input type="text" name="id" value="<?php echo $user->getUserId(); ?>" hidden>
        <!-- Champ ID (non modifiable) -->
        <label for="idUser">ID Utilisateur:</label>
        <input type="text" name="idUser" value="<?php echo $user->getUserId(); ?>" readonly>

        <!-- Champs modifiables -->
        <label for="mail">Email:</label>
        <input type="text" name="mail" value="<?php echo $user->getEmail(); ?>">

        <label for="lastName">Nom:</label>
        <input type="text" name="lastName" value="<?php echo $user->getLastName(); ?>">

        <label for="firstName">Prénom:</label>
        <input type="text" name="firstName" value="<?php echo $user->getFirstName(); ?>">

        
        <label for="City"> Ville: </label>
        <input type="text" name="city" value="<?php echo $user->getCity(); ?>">

        <label for="picture">Photo de profil:</label>
        <input type="text" name="picture" value="<?php echo $user->getProfilePicture(); ?>">

        <label for="coverPicture">Photo de couverture:</label>
        <input type="text" name="coverPicture" value="<?php echo $user->getCoverPicture(); ?>">

        <label for="isPublic">Profil public:</label>
        <input type="checkbox" name="isPublic" value="<?php echo $user->getIsPublic(); ?>">

        <label for="showEvntScores">Afficher les scores:</label>
        <input type="checkbox" name="showEvntScores" value="<?php echo $user->getisDisplayEvntScores(); ?>">

        <label for="showPastEvnts">Afficher les événements passés:</label>
        <input type="checkbox" name="showPastEvnts" value="<?php echo $user->getisDisplayPastEvnts(); ?>">

        <label for="showFutureEvnts">Afficher les événements à venir:</label>
        <input type="checkbox" name="showFutureEvnts" value="<?php echo $user->getisDisplayFutureEvnts(); ?>">
<br>
 <label for="description">Description:</label>
        <textarea name="description"><?php echo $user->getDescription(); ?></textarea>
<br>

        <input type="submit" value="Enregistrer les modifications">
    </form>


 </main>