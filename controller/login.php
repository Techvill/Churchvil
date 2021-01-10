<?php

include('../class/security.php');
$dbtask = new SYSTEM();

//initialising aunthentication
$auth = new AUTHENTICATE();
$pass = $_POST['password'];
$email = $_POST['email'];

//validating null input
if (empty($email)) {
    echo "<div class='alert alert-danger'>please enter your username</div>";
} elseif (empty($pass)) {
    echo "<div class='alert alert-danger'> please enter password</div>";
} else {
    $obj = "users";
    $authenticate = $auth->userAccess($email, $pass, $obj);

}
?>
