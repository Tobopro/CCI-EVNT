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

// check for session variables indicating log failure 
if (isset($_SESSION['email_exists']) && $_SESSION['email_exists'] == false) {
    header("Location: ../../index.php?log=fail&reason=email");
    exit();
} else if (isset($_SESSION['auth']) && $_SESSION['auth'] == false) {
    header("Location: ../../index.php?log=fail&reason=password");
    exit();
} else if (isset($_SESSION['banned']) && $_SESSION['banned'] == true) {
    header("Location: ../../index.php?log=fail&reason=banned");
    exit();
} else {
    header("Location: ../../index.php?log=success");
    exit();
}

?>



