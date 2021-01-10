<?php
include_once('db_class.php');
require 'PHPMailer/PHPMailerAutoload.php';

class SYSTEM
{


    public function newInsert($table_name, $data, $message)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $keys = array();
            $values = array();
            $pdo_key = array();
            foreach ($data as $key => $value) {
                $keys[] = $key;
                $pdo_key[] = "?";
                $values[] = $value;
            }

            $tableKey = implode(",", $keys);
            $instanceKey = implode(",", $pdo_key);
            $result = $pdo->prepare("INSERT INTO $table_name($tableKey) VALUES($instanceKey)");

            $result->execute($values);
            $feedback = ($result) ? true : false;
            $count = $result->rowCount();
            if ($count == '0') {
                echo "<div class='alert alert-danger'>ERROR, contact support </div>";
            } else {

                if ($message == "empty") {

                } else {

                    echo "<div class='alert alert-success'>  $message </div>";
                    $dd = 1;
                    return $dd;
                }
            }
            return $feedback;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>failed</div> " . $e->getMessage() . "\n";
            exit;
        }
    }


    public function delete_stuff($id, $column, $table)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "DELETE FROM $table WHERE $column = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array($id));
            $feedback = ($stmt) ? true : false;
            $count = $stmt->rowCount();
            if ($count == '0') {
                echo "<div class='alert alert-danger'>ERROR, contact support </div>";
            } else {
                echo "<div class='alert alert-success'>  Deleted </div>";
            }
            return $feedback;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: ";
            exit;
        }
    }

    public function findExist($object, $table, $column, $countC)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT COUNT($countC) AS total FROM $table WHERE $column='$object'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            $total = $row['total'];
            return $total;

        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function findFile($object, $table, $column, $file)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT $table.$file  FROM $table WHERE $column=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array($object));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $gte = $row[$file];

            $Nonsense = "../" . $gte;
            return $Nonsense;

        } catch (PDOException $e) {
            echo "fatal error, call support: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function arrayQuery($queryStatement)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $queryStatement;
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function getTableByID($table, $col, $id)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM $table WHERE $col = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array($id));
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function checkConfimed($deal_id)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT notification.status,COUNT(notification.notification_id) AS total FROM users,notification,deal WHERE notification.user_id=users.user_id AND notification.deal_id=deal.deal_id AND notification.deal_id='$deal_id' AND notification.status='approved' GROUP BY notification.status";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $status = $row['status'];
                $total = $row['total'];


                $query1 = "SELECT COUNT(notification.notification_id) AS allt FROM users,notification,deal WHERE notification.user_id=users.user_id AND notification.deal_id=deal.deal_id AND notification.deal_id='$deal_id' ";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute();
                $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

                $allt = $row1['allt'];

                $perc = ceil(($total / $allt) * 100);

                if ($perc < 100) {

                    return $perc;
                } else {
                    $check = new SYSTEM();

                    return $perc;

                    $status = "approved";

                    $table_name = "deal";
                    $idC = "deal_id= ?";
                    $data = array($status, $deal_id);
                    $cols = array("status");
                    $message = "empty";
                    $commit = $check->newUpdate($table_name, $idC, $cols, $data, $message);

                }


            }
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function UpdateView($views, $message_id)
    {
        $check = new SYSTEM();
        $view = 1 + $views;


        $table_name = "messages";
        $idC = "message_id= ?";
        $data = array($view, $message_id);
        $cols = array("view");
        $message = "empty";
        $commit = $check->newUpdate($table_name, $idC, $cols, $data, $message);


    }

    public function newUpdate($table_name, $idC, $cols, $data, $message)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $col = array();
            foreach ($cols as $key) {
                $col[] = "$key = ?";
            }
            $tableKey = implode(",", $col);
            $result = $pdo->prepare("UPDATE $table_name SET $tableKey WHERE $idC");
            $result->execute($data);
            $feedback = ($result) ? true : false;
            $count = $result->rowCount();
            if ($count == '0') {
                if ($message == "empty") {

                } else {

                    echo "<div class='alert alert-success'>  $message </div>";
                    $dd = 11;
                    return $dd;
                }

            } else {

                if ($message == "empty") {

                } else {

                    echo "<div class='alert alert-success'>  $message </div>";
                    $dd = 11;
                    return $dd;
                }
            }
            return $feedback;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }

    }

    public function uploadVid($uploadDir, $dbDir, $formName)
    {

        $currentDir = getcwd();
        $errors = []; // Store all foreseen and unforseen errors here
        $fileExtensions = ['mp4', 'avi', 'audio/mp3', 'mp3']; // Get all the file extensions

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
                return $dburl;
            } else {
                echo "<div class='alert alert-danger'> An error occurred </div>";
                //echo "Not uploaded because of error #".$_FILES[$formName]["error"];
            }
        } else {
            //foreach ($errors as $error) {
            //echo $error . "These are the errors" . "\n";
        }

    }

    public function getStuff($table)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM $table ";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }


    public function conditionTable($table, $condition)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM $table WHERE $condition ";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }


    }


    public function convertDate($str)
    {
        try {
            //$newdate =date('dS M Y',strtotime($str));
            $newdate = date('M Y', strtotime($str));
            return $newdate;
        } catch (PDOException $e) {
            $error = new ERROR_CLASS();
            $msg = "MSG: Error has occured. call admin!\nfile:" . $e->getFile() . "\non line:" . $e->getLine() . "\n\n";
            $error->report_error($msg);
        }
    }

    public function getsmonth()
    {
        try {
            $pdo = Database::connect();
            $query = "SELECT MAX(date) AS date FROM salaries";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            $error = new ERROR_CLASS();
            $msg = "MSG: Error has occured. call admin!\nfile:" . $e->getFile() . "\non line:" . $e->getLine() . "\n\n";
            $error->report_error($msg);
            $customError = "<div class='alert alert-danger'>fatal error, call suport</div>";
            echo "<div class='alert simple-danger'>$customError</div>";
        }
    }


    public function conditionTableIN($data, $table, $condition)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT $data FROM $table WHERE $condition ";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }


    }

    public function getTableData($table)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM $table";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }


    }

    public function findExistTwo($object1, $object2, $table, $column1, $column2, $countC)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT COUNT($countC) AS total FROM $table WHERE $column1='$object1' AND $column2='$object2'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $total = $row['total'];
            return $total;

        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }

    }

    public function dataTableIN($data, $table)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT $data FROM $table";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }


    }


    public function getStuffExcept($table, $except)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM $table WHERE role!=? ";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array($except));
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function login($username, $password)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM users WHERE username= ? AND password= ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array($username, $password));
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }

    }


    public function Counttable($table, $column)
    {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT COUNT($column) AS total
								FROM $table
								";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
            $pdo = Database::disconnect();
        } catch (PDOException $e) {
            $error = new ERROR();
            $msg = "MSG: Error has occured. call admin!\nfile:" . $e->getFile() . "\non line:" . $e->getLine() . "\n\n";
            $error->report_error($msg);
        }
    }

    public function sendThisMail($to, $message, $mySubject)
    {

        try {
            $email = $to;

            $mail = new PHPMailer;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'donmap2@gmail.com';  // SMTP username
            $mail->Password = 'mulanje123'; // SMTP password
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                          // TCP port to connect to

            $mail->setFrom('info@ChurchVille.com', 'ChurchVille');
            $mail->addReplyTo('Noreply', 'ChurchVille');
            $mail->addAddress($email);   // Add a recipient
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = $mySubject;
            $bodyContent = $message;
            $mail->Body = $bodyContent;

            if (!$mail->send()) {
                echo 'email could not be sent.';

                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {

            }

        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function countPageCondi($tab, $condi)
    {
        try {
            $pdo = Database::connect();
            $query = "select count(*) \"total\"  from $tab WHERE $condi";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            $web_error = new web_error();
            $msg = "MSG: web_error has occured. call admin!\nfile:" . $e->getFile() . "\non line:" . $e->getLine() . "\n\n";
            $web_error->report_web_error($msg);
        }
    }

    public function time_ago($date)
    {
        $check = new SYSTEM();
        $is_valid = $check->is_date_time_valid($date);

        if ($is_valid) {

            $timestamp = strtotime($date);

            $difference = time() - $timestamp;

            $periods = array("sec", "min", "hour", "day", "week", "month", "year", "decade");

            $lengths = array("60", "60", "24", "7", "4.35", "12", "10");


            if ($difference > 0) { // this was in the past time

                $ending = "ago";

            } else { // this was in the future time

                $difference = -$difference;

                $ending = "just now";

            }

            for ($j = 0; $difference >= $lengths[$j]; $j++)

                $difference /= $lengths[$j];

            $difference = round($difference);

            if ($difference != 1)

                $periods[$j] .= "";

            $text = "$difference $periods[$j] $ending";

            return $text;

        } else {

            return 'Date Time must be in "yyyy-mm-dd hh:mm:ss" format';

        }

    }

    public function is_date_time_valid($date)
    {
        if (date('Y-m-d H:i:s', strtotime($date)) == $date) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function compress_image($source_url, $mydestination_url, $quality)
    {

        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
        $destination_url = "../" . $mydestination_url;
        imagejpeg($image, $destination_url, $quality);

        return $destination_url;
    }

    public function validateImage()
    {
        $file = ($_FILES['image']['type'] == 'image/gif') ||
            ($_FILES['image']['type'] == 'image/jpeg') ||
            ($_FILES['image']['type'] == 'image/JPG') ||
            ($_FILES['image']['type'] == 'image/png') ||
            ($_FILES['image']['type'] == 'image/pjpeg');
        return $file;

    }

}


?>