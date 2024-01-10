<?php

require_once("../models/Evnt.php");
require_once("../helpers/class/DB.php");



Use Models\Evnt;



$db = DB::getDB();
$allevnts = Evnt::getAllEvents($db);


echo '<table border="1">
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Address</th>
            <th>Description</th>
            <th>Price</th>
            <th>Price Info</th>
            <th>Participants</th>
            <th>Free Entry</th>
            <th>User ID</th>
            <th>Category ID</th>
            <th>Image URL</th>
            <th>Likes</th>
            <th>Reports</th>
        </tr>
    </thead>
    <tbody>';

foreach ($allevnts as $event) {
    $idEvent=$event['idEvent'];
    $event = Evnt::hydrate($event);
    echo '<tr>
            <td>' . $event->getTitle() . '</td>
            <td>' . $event->getDateEvnt() . '</td>
            <td>' . $event->getAdress() . '</td>
            <td>' . $event->getDescription() . '</td>
            <td>' . $event->getPrice() . '</td>
            <td>' . $event->getPriceInfo() . '</td>
            <td>' . $event->getNbParticipants() . '</td>
            <td>' . ($event->getIsFreeEntry() ? 'Yes' : 'No') . '</td>
            <td>' . $event->getIdUser() . '</td>
            <td>' . $event->getIdCategory() . '</td>
            <td>' . $event->getUrlImage() . '</td>
            <td>' . $event->getNbLike() . '</td>
            <td>' . $event->getNbReport() . '</td>
            <td><a style="color:yellow; background-color:black" href="edit.php?id=' . $idEvent . '">Edit</a></td>
            <td><a style="color:yellow; background-color:black" href="handlers/evnt_delete_handler.php?id=' . $idEvent . '">Delete</a></td>
        </tr>';
}

echo '</tbody>
</table>';




// foreach ($test as $key => $value) {
//     echo $value->getTitle();
//     echo $value->getDateEvnt()->format('Y-m-d H:i:s');
//     echo $value->getAdress();
//     echo $value->getDescription();
//     echo $value->getPrice();
//     echo $value->getPriceInfo();
//     echo $value->getNbParticipants();
//     echo $value->getIsFreeEntry();
//     echo $value->getIdUser();
//     echo $value->getIdCategory();
//     echo $value->getUrlImage();
//     echo $value->getNbLike();
//     echo $value->getNbReport();
//     echo "<br>";
// }