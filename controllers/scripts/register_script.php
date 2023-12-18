<?php

include_once "../classes/user_class.php";
include_once "../functions.php";
session_start();

//get register form data and put it in a User instance
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$city = $_POST['city'];
$description = $_POST['description'];
$profilePicture = $_POST['profilePicture'];
$coverPicture = $_POST['coverPicture'];
$prefferedCategories = $_POST['prefferedCategories'];

$user = new User(email: $email, password: $password, firstName: $firstName, lastName: $lastName, city: $city, description: $description, profilePicture: $profilePicture, coverPicture: $coverPicture, prefferedCategories: $prefferedCategories);

$db = connection_dbb();

//register the user
$user->register($db);

//check for session variables indicating register failure
if (isset($_SESSION['email_exists']) && $_SESSION['email_exists'] == true) {
    header("Location: ../../index.php?reg=fail&reason=email");
    exit();
} else if (isset($_SESSION['auth']) && $_SESSION['auth'] == false) {
    header("Location: ../../index.php?reg=fail&reason=password");
    exit();
} else {
    header("Location: ../../index.php?reg=success");
    exit();
}

?>