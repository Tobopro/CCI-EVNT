<?php

require_once __DIR__ . '/../../bootstrap/app.php';

use Controllers\EventPageController;





if (!empty($_POST['button'])) {
    $evntPage = new EventPageController;
    if ($_POST['button'] === 'accept') {
        $evntPage->updateList();
    }
    if ($_POST['button'] == 'remove') {
        $evntPage->removeUser();
    }
}