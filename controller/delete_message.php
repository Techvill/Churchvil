<?php

include('../class/security.php');
$dbtask = new SYSTEM();

$message_id = $_POST['message_id'];


if (empty($message_id)) {
    echo '<div class="alert alert-danger">
			  <span><b> <i class="fa fa-info"></i> - </b> error !</span>
			  </div>';
} else {
    $table = "messages";
    $object = $message_id;
    $column = "message_id";
    $file = "file";

    $myFile = $dbtask->findFile($object, $table, $column, $file);
    if ($file) {
        $remove = unlink($myFile);

        $id = $message_id;
        $column = "message_id";
        $table = "messages";
        $delete = $dbtask->delete_stuff($id, $column, $table);
    }


}


?>