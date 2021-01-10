<?php


include('../class/dt.php');
include('../class/class.php');

$successInfo = "alert alert-success";
$failedInfo = "alert alert-danger";
$myDB = "REPO";

$table1 = "

CREATE TABLE `institution`(
`institution_id` INT (20) NOT NULL AUTO_INCREMENT,
`institution_name` VARCHAR (50)NOT NULL,
PRIMARY KEY (institution_id)
)
";


$table2 = "
CREATE TABLE `users`(
`user_id` INT (20) NOT NULL AUTO_INCREMENT,
`firstname` VARCHAR (50)NOT NULL,
`lastname` VARCHAR (50) NOT NULL,
`email` VARCHAR (100)NOT NULL,
`phone` VARCHAR (50)NOT NULL,
`password` VARCHAR (70)NOT NULL,
`institution_id` INT (20)NOT NULL,
`role` VARCHAR (100)NOT NULL,
`notification` VARCHAR (100)NOT NULL,
PRIMARY KEY (user_id),
FOREIGN KEY (institution_id) REFERENCES institution(institution_id) ON DELETE CASCADE ON UPDATE CASCADE
)
";


$table3 = "
CREATE TABLE `deal`(
`deal_id` INT (20) NOT NULL AUTO_INCREMENT,
`institution_id` INT (20)NOT NULL,
`transaction_date` date NOT NULL,
`start_date` date NOT NULL,
`end_date` VARCHAR (50)NOT NULL,
`purchase_amount` DECIMAL (19,2)NOT NULL,
`repurchase_amount` DECIMAL (19,2)NOT NULL,
`interest` float (10)NOT NULL,
`status` VARCHAR (50)NOT NULL,
`code` TEXT NOT NULL,
`timec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`user_id` INT (20)NOT NULL,
PRIMARY KEY (deal_id),
FOREIGN KEY (user_id) REFERENCES users(user_id),
FOREIGN KEY (institution_id) REFERENCES institution(institution_id)ON DELETE CASCADE ON UPDATE CASCADE
)
";


$table4 = "
CREATE TABLE `notification`(
`notification_id` INT (20) NOT NULL AUTO_INCREMENT,
`details` TEXT NOT NULL,
`deal_id` INT (40)NOT NULL,
`user_id` INT (50)NOT NULL,
`date` date NOT NULL,
`status` VARCHAR (50)NOT NULL,
`moment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (notification_id),
FOREIGN KEY (deal_id) REFERENCES deal(deal_id) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
)
";


$dbtask = new SYSTEM();
$instance = new SHOWDOWN();

$create1 = $instance->SetUPQuery("DROP DATABASE IF EXISTS $myDB ");
$create2 = $instance->SetUPQuery("CREATE DATABASE $myDB");
$tables = array($table1, $table2, $table3, $table4);

foreach ($tables as $queryStatement) {
    $create3 = $dbtask->arrayQuery($queryStatement);
}

if ($create1 && $create2 && $create3) {
    if (isset($_POST['first_name'])) {


        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $role = "admin";
        $pass = $_POST['password'];
        $phone = $_POST['phoneNo'];
        $institution_id = 1;
        $notification = "no";

        if (empty($firstname)) {
            echo "<div class='$failedInfo'> <p>please enter First Name</p> </div>";
        } elseif (empty($lastname)) {
            echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Surname</p> </div>";
        } elseif (empty($email)) {
            echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Email</p></div>";
        } elseif (empty($role)) {
            echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter role</p> </div>";
        } elseif (empty($phone)) {
            echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Phone Number</p> </div>";
        } else {
            $password = sha1($pass);


            $message = "";
            $data = array("institution_name" => "Reserve bank");
            $table_name = "institution";
            $try1 = $dbtask->newInsert($table_name, $data, $message);

            if ($try1) {

                $data = array("firstname" => $firstname, "lastname" => $lastname, "email" => $email,
                    "phone" => $phone, "password" => $password, "institution_id" => 1, "role" => $role, "notification" => $notification
                );
                $table_name = "users";
                $button = '	<br/><center>	<a href="app/" class="btn btn-success">proceed</a></center>';
                $message = "<div style='background-color:white;'>Admin added, system installed</div>" . $button;
                $try = $dbtask->newInsert($table_name, $data, $message);


            } else {
                echo "wup";

            }


        }

    } else {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Oooooops!</p> </div>";
    }

} else {


    echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Failed to install </p> </div>";

}


?>
