<?php

include('../class/security.php');
$dbtask = new SYSTEM();

$category_id = $_POST['category_id'];


if (empty($category_id)) {
    echo '<div class="alert alert-danger">
			  <span><b> <i class="fa fa-info"></i> - </b> error !</span>
			  </div>';
} else {
    $id = $category_id;
    $column = "category_id";
    $table = "category";
    $delete = $dbtask->delete_stuff($id, $column, $table);


}


?>