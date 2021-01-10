<?php

include('../class/security.php');
$dbtask = new SYSTEM();

$user_id = $_POST['user_id'];


if (empty($user_id)) {
    echo '<div class="alert alert-danger">
			  <span><b> <i class="fa fa-info"></i> - </b> error !</span>
			  </div>';
} else {
    $id = $user_id;
    $column = "user_id";
    $table = "users";
    $delete = $dbtask->delete_stuff($id, $column, $table);


}


?>