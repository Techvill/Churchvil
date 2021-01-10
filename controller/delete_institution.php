<?php

include('../class/security.php');
$dbtask = new SYSTEM();

$institution_id = $_POST['institution_id'];


if (empty($institution_id)) {
    echo '<div class="alert alert-danger">
			  <span><b> <i class="fa fa-info"></i> - </b> error !</span>
			  </div>';
} else {
    $id = $institution_id;
    $column = "institution_id";
    $table = "institution";
    $delete = $dbtask->delete_stuff($id, $column, $table);


}


?>