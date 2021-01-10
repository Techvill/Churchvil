<?php
include('../class/security.php');
$dbtask = new SYSTEM();

//add employee logic
$failedInfo = "alert alert-danger";
if (isset($_POST['start'])) {


    $object = $_POST['email'];
    $table = "users";
    $column = "email";
    $countC = "email";

    $email = $_POST['email'];
    $role = $_POST['role'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];


    $exist = $dbtask->findExist($object, $table, $column, $countC);
    if ($exist > 0) {
        echo "<div class='$failedInfo'> <p> your email already exist</p> </div>";
    } elseif ($pass != $pass2) {
        echo "<div class='$failedInfo'> <p>password do not match</p> </div>";
    } elseif (empty($email)) {
        echo "<div class='$failedInfo'> <p>enter email</p> </div>";
    } elseif (empty($role)) {
        echo "<div class='$failedInfo'> <p>choose account</p> </div>";
    } elseif (empty($pass)) {
        echo "<div class='$failedInfo'> <p> enter password</p> </div>";
    } elseif (empty($pass2)) {
        echo "<div class='$failedInfo'> <p> enter password</p> </div>";
    } else {
        session_start();
        $_SESSION['mypass'] = $pass;
        $_SESSION['userRole'] = $role;
        $_SESSION['userEmail'] = $email;
        $link = "step2.php";

        echo "<script type='text/javascript'>
									window.location = '$link'	
								 </script> ";

    }

}


?>