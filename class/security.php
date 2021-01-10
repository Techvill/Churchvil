<?php

include('class.php');
include('mp3.php');

CLASS AUTHENTICATE
{

    public $myID;
    public $user;
    public $myrole;
    public $myEmail;
    public $myMinistry;
    public $myImage;
    public $initial;
    public $about;


    public function userToken()
    {
        @session_start();
        if (isset($_SESSION['Admin_acc'])) {
            $this->myID = $_SESSION['Admin_acc'];
            $this->user = $_SESSION['Admin_username'];
            $this->myrole = $_SESSION['Admin_role'];
            @$this->myEmail = $_SESSION["Admin_email"];

            return $this;

        } elseif (isset($_SESSION['minister_acc'])) {
            $this->myID = $_SESSION['minister_acc'];
            $this->user = $_SESSION['minister_username'];
            $this->myrole = $_SESSION['minister_role'];
            @$this->myEmail = $_SESSION['minister_Email'];
            @$this->myMinistry = $_SESSION['ministry'];
            @$this->myImage = $_SESSION['myImage'];
            @$this->initial = $_SESSION['initial'];
            @$this->about = $_SESSION['about'];
            return $this;

        } elseif (isset($_SESSION['user_acc'])) {
            $this->myID = $_SESSION['user_acc'];
            $this->user = $_SESSION['user_username'];
            $this->myrole = $_SESSION['user_role'];
            @$this->myEmail = $_SESSION['user_Email'];


            return $this;

        } else {
            $newAuth = new AUTHENTICATE();
            $link = "../index.php";
            $redirect = $newAuth->myLink($link);
            exit();

        }
    }


    public function myLink($link)
    {

        echo "<script type='text/javascript'>
									window.location = '$link'	
								 </script> ";


    }

    public function userAccess($email, $pass, $obj)
    {

        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $password = sha1($pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM $obj WHERE users.email = ? AND users.password= ? ";
            $statement = $pdo->prepare($sql);
            $status = "active";
            $statement->execute(array($email, $password));
            $data = $statement->fetch(PDO::FETCH_ASSOC);

            if ($data > 0) {

                $system_acc = $data["user_id"];
                $myname = $data["fullname"];
                $myrole = $data["role"];
                $myEmail = $data["email"];
                $myministry = $data["ministry"];
                $myImage = $data["image"];
                $initial = $data["initial"];
                $about = $data["about"];
                $newAuth = new AUTHENTICATE();
                $userRole = $newAuth->accounts($myrole, $system_acc, $myname, $myEmail, $myministry, $myImage, $initial, $about);


            } else {

                echo "<div class='alert alert-danger'> Wrong username or password</div>";

            }

        } catch (PDOException $e) {
            echo "failed: " . $e->getMessage() . "\n";
            exit;
        }


    }

    public function accounts($myrole, $system_acc, $myname, $myEmail, $myministry, $myImage, $initial, $about)
    {
        session_start();

        $newAuth = new AUTHENTICATE();


        if ($myrole == "admin") {
            $link = "admin/";
            $_SESSION['Admin_username'] = $myname;
            $_SESSION['Admin_role'] = $myrole;
            $_SESSION['Admin_acc'] = $system_acc;
            $_SESSION['Admin_email'] = $myEmail;
            $_SESSION['ministry'] = $myministry;
            $redirect = $newAuth->myLink($link);

        } elseif ($myrole == "minister") {
            $link = "minister/";
            $_SESSION['minister_username'] = $myname;
            $_SESSION['minister_role'] = $myrole;
            $_SESSION['minister_acc'] = $system_acc;
            $_SESSION['minister_Email'] = $myEmail;
            $_SESSION['ministry'] = $myministry;
            $_SESSION['myImage'] = $myImage;
            $_SESSION['initial'] = $initial;
            $_SESSION['about'] = $about;
            $redirect = $newAuth->myLink($link);


        } elseif ($myrole == "follower") {
            $link = "follower/";
            $_SESSION['user_username'] = $myname;
            $_SESSION['user_role'] = $myrole;
            $_SESSION['user_acc'] = $system_acc;
            $_SESSION['user_Email'] = $myEmail;


            $redirect = $newAuth->myLink($link);
        } else {


            echo "<div class='alert alert-danger'>  please call support</div>";
        }


    }


}



