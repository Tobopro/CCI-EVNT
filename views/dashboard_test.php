<div class="events_event__cards">
    <?php foreach ($events as $event) : ?>
        <?php var_dump($event); ?>
        <div class="event-card">
            <img src="assets/img/Category-pictures/board-games/board1.jpg" alt="Image de l'événement">
            <h2><?= $event->getTitle(); ?></h2>
            <p>Nom de l'organisateur : <?= $event->getOrganizerName(); ?></p>
            <p>Catégories :
                <?php foreach ($event->getCategories() as $category) : ?>
                    <?= $category->getName(); ?>,
                <?php endforeach; ?>
            </p>
            <p>Participants : <?= $event->getNbParticipants(); ?>/<?= $event->getMaxParticipants(); ?></p>
            <a href="?url=page_EVNT" class="event-link">Page de l'événement</a>
            <div class="interaction-icons">
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid fa-share-nodes"></i>
            </div>
        </div>
    <?php endforeach; ?>
</div>
