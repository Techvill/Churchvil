<?php
include('../class/security.php');
$dbtask = new SYSTEM();

//add employee logic
if (isset($_POST['Employees'])) {

    //post fields
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $job_title = $_POST['jobtitle'];
    $phone_No = $_POST['phoneNo'];
    $Section = $_POST['Section'];
    $password = $_POST['password'];


    //validation
    if (empty($first_name)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter first name</p> </div>";
    } elseif (empty($middle_name)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please middle name</p> </div>";
    } elseif (empty($last_name)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter last name</p> </div>";
    } elseif (empty($email)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter email</p> </div>";
    } elseif (empty($job_title)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter job title</p> </div>";
    } elseif (empty($phone_No)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter phone number</p> </div>";
    } elseif (empty($Section)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter Section</p> </div>";
    } elseif (empty($password)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter password</p> </div>";
    } else
        $pass = sha1($password);
    {
        $data = array("fname" => $first_name,
            "mname" => $middle_name,
            "lname" => $last_name,
            "email" => $email,
            "jobtitle" => $job_title,
            "phoneNo" => $phone_No,
            "Section" => $Section,
            "password" => $pass);


        $table_name = "employees";
        $message = "successful";
        $try = $dbtask->newInsert($table_name, $data, $message);;
    }

} // add asset Types logic
elseif (isset($_POST['institution'])) {

//post attributes
    $institution_name = $_POST['Institution_name'];

// Validation
    if (empty($institution_name)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter Institution name</p> </div>";
    } else {

        $data = array("institution_name" => $institution_name);
        $table_name = "institution";
        $message = "successful";
        $try = $dbtask->newInsert($table_name, $data, $message);;


    }

} // add locations logic

elseif (isset ($_POST['update_Institution'])) {
//post attributes
    $institution_id = $_POST['institution_id'];
    $institution_name = $_POST['institution_name'];


    if (empty($institution_id)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> error</p> </div>";
    } elseif (empty($institution_name)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter institution_name</p> </div>";
    } else {


        $table_name = "institution";
        $idC = "institution_id= ?";
        $data = array($institution_name, $institution_id);
        $cols = array("institution_name", "institution_id";
        $message = "successful";
        $commit = $dbtask->newUpdate($table_name, $idC, $cols, $data, $message);


    }

} // add assets logic

elseif (isset($_POST['assetTag'])) {

//post attributes
    $asset_Tag = $_POST['assetTag'];
    $serialNumber = $_POST['serialNumber'];
    $assetDescription = $_POST['assetDescription'];
    $assetTypeID = $_POST['assetTypeID'];
    $originalCost = $_POST['originalCost'];
    $condition = $_POST['condition'];
    $aquisitionDate = $_POST['aquisitionDate'];

// Validation
    if (empty($asset_Tag)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset tag</p> </div>";
    } elseif (empty($serialNumber)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter serial number</p> </div>";
    } elseif (empty($asset)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset</p> </div>";
    } elseif (empty($assetTypeID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset type ID</p> </div>";
    } elseif (empty($originalCost)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter original cost</p> </div>";
    } elseif (empty($condition)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset condition</p> </div>";
    } elseif (empty($aquisitionDate)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset aquisition date</p> </div>";
    } else {


        $data = array("assetTag" => $asset_Tag, "serialNumber" => $serialNumber, "asset" => $asset, "assetTypeID" => $assetTypeID, "originalCost" => $originalCost, "condition" => $condition, "aquisitionDate" => $aquisitionDate);
        $table_name = "assets";
        $message = "successful";
        $try = $dbtask->newstaff($table_name, $data, $message);

    }

} // add Materials logic
elseif (isset($_POST['materialDescription'])) {

//post attributes
    $material_Description = $_POST['materialDescription'];
    $cost = $_POST['cost'];
    $aquisitionDate = $_POST['aquisitionDate'];
    $assetID = $_POST['assetID'];

// Validation
    if (empty($material_Description)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter material Description</p> </div>";
    } elseif (empty($cost)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter cost</p> </div>";
    } elseif (empty($$aquisitionDate)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter aquisitionDate</p> </div>";
    } elseif (empty($assetID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset ID</p> </div>";
    } else {

        $data = array("materialDescription" => $material_Description);
        $table_name = "materials";
        $message = "successful";
        $try = $dbtask->newstaff($table_name, $data, $message);

    }

} // add asset revalues logic (this needs to be removed as it has been merged in Materials)

elseif (isset ($_POST['improvement'])) {
//post attributes
    $asset_ID = $_POST['assetID'];
    $improvement = $_POST['improvement'];
    $revalued_Cost = $_POST['revaluedCost'];


    if (empty($asset_ID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset ID</p> </div>";
    } elseif (empty($improvement)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter improvements made</p> </div>";
    } elseif (empty($revalued_Cost)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter  cost revalued of asset</p> </div>";
    } else {

        $data = array("assetID" => $asset_ID, "improvement" => $improvement, "revaluedCost" => $revalued_Cost);
        $table_name = "assetrevalues";
        $message = "successful";
        $try = $dbtask->newstaff($table_name, $data, $message);


    }

} // add disposals logic

elseif (isset ($_POST['improvement'])) {
//post attributes
    $asset_ID = $_POST['assetID'];
    $disposalDate = $_POST['disposalDate'];
    $disposalProceeds = $_POST['disposalProceeds'];


    if (empty($asset_ID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset ID</p> </div>";
    } elseif (empty($disposalDate)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter disposal Date</p> </div>";
    } elseif (empty($disposalProceeds)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter  disposal Proceeds</p> </div>";
    } else {

        $data = array("assetID" => $asset_ID, "disposalDate" => $disposalDate, "disposalProceeds" => $disposalProceeds);
        $table_name = "disposals";
        $message = "successful";
        $try = $dbtask->newstaff($table_name, $data, $message);


    }
} // add inventoryHolders logic

elseif (isset($_POST['assetTag'])) {

//post attributes
    $empID = $_POST['empID'];
    $assetAssignedDate = $_POST['serialNumber'];
    $locationID = $_POST['assetAssignedDate'];
    $assetID = $_POST['assetID'];
    $status = $_POST['status'];
    $comment = $_POST['comment'];

// Validation
    if (empty($empID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter empID</p> </div>";
    } elseif (empty($assetAssignedDate)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter Asset Assigned Date</p> </div>";
    } elseif (empty($locationID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter location ID</p> </div>";
    } elseif (empty($assetID)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter asset ID</p> </div>";
    } elseif (empty($status)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter status</p> </div>";
    } elseif (empty($comment)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter comment</p> </div>";
    } else {


        $data = array("empID" => $empID, "assetAssignedDate" => $assetAssignedDate, "$locationID" => $locationID, "assetID" => $assetID, "status" => $status, "comment" => $comment);
        $table_name = "inventoryHolders";
        $message = "successful";
        $try = $dbtask->newstaff($table_name, $data, $message);

    }


} else {
    echo "nothing clicked";
}

?>