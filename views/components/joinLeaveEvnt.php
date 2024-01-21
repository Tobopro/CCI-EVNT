<div class="evnt-page__join d-flex justify-content-center align-items-center">
    <div id="submit-box" class="mx-2 fs-1 w-100">
        <form action="handlers/evnt-handler.php" method="POST">
            <input type="text" name="action" value="<?php ec($value) ?>" hidden>
            <input type="text" name="id" value="<?php ec($evnt->getId()) ?>" hidden>
            <button type="submit" class="w-100 evnt-confirm-button">
                <?php ec($text) ?> l'Evnt
            </button>
        </form>
    </div>
</div>