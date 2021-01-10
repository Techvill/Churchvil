<?php

function upVid($uploadDir, $dbDir, $formName)
{
    $currentDir = getcwd();


    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['mp4', 'avi', 'png']; // Get all the file extensions

    $fileName = $_FILES[$formName]['name'];
    $fileSize = $_FILES[$formName]['size'];
    $fileTmpName = $_FILES[$formName]['tmp_name'];
    $fileType = $_FILES[$formName]['type'];
    @$fileExtension = strtolower(end(explode('.', $fileName)));

    $uploadPath = $currentDir . $uploadDir . basename($fileName);
    $dburl = $dbDir . basename($fileName);

    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "<div class='alert alert-danger'> This file extension is not allowed. Please upload a mp4 or avi file</div>";
    }

    if ($fileSize > 20000000) {
        $errors[] = "<div class='alert alert-danger'> This file is more than 20MB. </div>";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "<div class='alert alert-success'> Video uploaded</div>";
        } else {
            echo "<div class='alert alert-danger'> An error occurred </div>";
        }
    } else {
        //foreach ($errors as $error) {
        //echo $error . "These are the errors" . "\n";
    }

}


if (isset($_POST['submit'])) {

    $uploadDir = "'/../ul/'";
    $dbDir = "'/../ul/'";
    $formName = "myfile";
    $send = upVid($uploadDir, $dbDir, $formName);
}

?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" id="fileToUpload">
    <input type="submit" name="submit" value="Upload File Now">
</form>
	