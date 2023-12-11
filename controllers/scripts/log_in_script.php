<!-- this script is called when the user completes the log in form  -->
<!-- the post contains the email and the password  -->

<?php

include_once "../classes/user_class.php";
include_once "../functions.php";
session_start();

$email = $_POST['email'];

$password = $_POST['password'];
$password = password_hash($password);

$user = new User(email: $email, password: $password);
$db = connection_dbb();

$user->logIn($db);
?>



