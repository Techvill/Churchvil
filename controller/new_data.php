<?php
include('../class/security.php');
$dbtask = new SYSTEM();

//add employee logic
$failedInfo = "alert alert-danger";
if (isset($_POST['minister'])) {

    $object = $_POST['email'];
    $table = "users";
    $column = "email";
    $countC = "email";

    $fullname = $_POST['fullname'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $country = $_POST['country'];
    $ministry = $_POST['ministry'];
    $about = $_POST['about'];

    $exist = $dbtask->findExist($object, $table, $column, $countC);
    if ($exist > 0) {
        echo "<div class='$failedInfo'> <p> email exists</p> </div>";
    } elseif (empty($fullname)) {
        echo "<div class='$failedInfo'> <p>please enter  Name</p> </div>";
    } elseif ($password != $password2) {
        echo "<div class='$failedInfo'> <p>password do not match</p> </div>";
    } elseif (empty($title)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Surname</p> </div>";
    } elseif (empty($email)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Email</p></div>";
    } elseif (empty($password)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter password</p></div>";
    } elseif (empty($role)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter role</p> </div>";
    } elseif (empty($country)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please chose country</p> </div>";
    } elseif (empty($ministry)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter ministry</p> </div>";
    } elseif (empty($about)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter ministry description</p> </div>";
    } else {

        if (is_array($_FILES)) {
            if ($dbtask->validateImage()) {

                $url = 'profiles/';
                $ur2 = 'profiles/';
                $Location = $url . $_FILES['image']['name'];
                $image = $ur2 . $_FILES['image']['name'];
                $tempName = $_FILES["image"]["tmp_name"];
                $imageQuality = 70;

                $run = $dbtask->compress_image($tempName, $Location, $imageQuality);

                $password = sha1($password);
                $data = array("fullname" => $fullname,
                    "email" => $email,
                    "password" => $password,
                    "initial" => $title,
                    "role" => $role,
                    "about" => $about,
                    "country" => $country,
                    "ministry" => $ministry,
                    "image" => $image
                );
                $table_name = "users";
                $message = " Registered";
                $try = $dbtask->newInsert($table_name, $data, $message);
                if ($try == 1) {

                    $details = "Hi " . $fullname . " <br/>" . " welcome to churchVille  <br/> Kind regards<br/> ChurchVill Team.";

                    $message = '
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family:  Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>churchVille</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 18px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}


footer {
	
 
    left: 0;
    right: 0;
    text-align: center;
    font-family: arial;
}
.footerLinks {
   text-align: center;
}
.footerLinks ul {
	padding: 0;
    list-style-type: none;
    margin: 0;
}
.footerLinks li {
	display: inline;
}
.footerLinks a {
	    color: #655e5e;
	text-decoration: none;
	font-size: 13px;
}
.copyright {
    text-align: center;
}

.copyright p {
	margin: 0;
	color: #b3b3b3;
	font-size: 11px;
}
</style>
</head>

<body style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
							<meta itemprop="name" content="Not scare" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" /><table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; " valign="top">
										<h2>Welcome to  ChurchVill </h2>
										<h3 style="    color: #00aeef;font-size: 28px;">Registration notification</h3>
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
									 ' . $details . '
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block"  style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

									</td>
								</tr></table></td>
					</tr></table><div class="footer" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
					<table width="100%" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
					<footer>
	<div class="footerLinks">
		<ul>
			<li><a href="#">Privacy Policy</a></li>|
  			<li><a href="#">Legal</a></li> |
  			<li><a href="#">Site Map</a></li> |
  			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
	<div class="copyright">
		<p>Copyright © 2019 2019 ChurchVill Inc. All rights reserved</p>
</footer>
					
					</td>
						</tr></table></div></div>
		</td>
		<td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
	</tr></table></body>
</html>

	
	
	';
                    $to = $email;
                    $mySubject = "Registration";
                    $my = $dbtask->sendThisMail($to, $message, $mySubject);


                }
            }
        }


    }

} elseif (isset($_POST['follower'])) {

    $object = $_POST['email'];
    $table = "users";
    $column = "email";
    $countC = "email";

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $country = $_POST['country'];
    $role = "follower";

    $exist = $dbtask->findExist($object, $table, $column, $countC);
    if ($exist > 0) {
        echo "<div class='$failedInfo'> <p> email exists</p> </div>";
    } elseif ($password != $password2) {
        echo "<div class='$failedInfo'> <p>password do not match</p> </div>";
    } elseif (empty($fullname)) {
        echo "<div class='$failedInfo'> <p>please enter  Name</p> </div>";
    } elseif (empty($email)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Email</p></div>";
    } elseif (empty($password)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter password</p></div>";
    } elseif (empty($role)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter role</p> </div>";
    } elseif (empty($country)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please chose country</p> </div>";
    } else {


        $password = sha1($password);


        $data = array("fullname" => $fullname,
            "email" => $email,
            "password" => $password,
            "initial" => "",
            "role" => $role,
            "about" => "",
            "country" => $country,
            "ministry" => ""

        );
        $table_name = "users";
        $message = " Registered";
        $try = $dbtask->newInsert($table_name, $data, $message);
        if ($try == 1) {

            $details = "Hi " . $fullname . " <br/>" . " welcome to churchVille  <br/> Kind regards<br/> ChurchVill Team.";

            $message = '
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family:  Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>churchVille</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;
 width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 18px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}


footer {
	
 
    left: 0;
    right: 0;
    text-align: center;
    font-family: arial;
}
.footerLinks {
   text-align: center;
}
.footerLinks ul {
	padding: 0;
    list-style-type: none;
    margin: 0;
}
.footerLinks li {
	display: inline;
}
.footerLinks a {
	    color: #fffbfb;
	text-decoration: none;
	font-size: 13px;
}
.copyright {
    text-align: center;
}

.copyright p {
	margin: 0;
	color: #b3b3b3;
	font-size: 11px;
}
</style>
</head>

<body style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: rgb(68, 84, 106); margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
							<meta itemprop="name" content="Not scare" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" /><table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; " valign="top">
										<h2>Welcome to  ChurchVill </h2>
										<h3 style="    color: #00aeef;font-size: 28px;">Registration notification</h3>
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
									 ' . $details . '
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block"  style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

									</td>
								</tr></table></td>
					</tr></table><div class="footer" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
					<table width="100%" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
					<footer>
	<div class="footerLinks">
		<ul>
			<li><a href="#">Privacy Policy</a></li>|
  			<li><a href="#">Legal</a></li> |
  			<li><a href="#">Site Map</a></li> |
  			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
	<div class="copyright">
		<p>Copyright © 2019 2019 ChurchVill Inc. All rights reserved</p>
</footer>
					
					</td>
						</tr></table></div></div>
		</td>
		<td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
	</tr></table></body>
</html>

	
	
	';
            $to = $email;
            $mySubject = "Registration";
            $my = $dbtask->sendThisMail($to, $message, $mySubject);


        }


    }
} elseif (isset($_POST['upload'])) {


    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];;
    $type = $_POST['type'];
    $sys_cat = $_POST['sys_cat'];
    $amount = $_POST['amount'];
    $date = date('Y-m-d');


    if (empty($user_id)) {
        echo "<div class='$failedInfo'> <p>login please</p> </div>";
    } elseif (empty($category_id)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please chose category</p> </div>";
    } elseif (empty($title)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter message title</p></div>";
    } elseif (empty($type)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please chose file type</p></div>";
    } elseif (empty($sys_cat)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please selling mode</p> </div>";
    } else {

        if (is_array($_FILES)) {


            if ($dbtask->validateImage()) {

                $url = 'covers/';
                $ur2 = 'covers/';
                $Location = $url . $_FILES['image']['name'];
                $image = $ur2 . $_FILES['image']['name'];
                $tempName = $_FILES["image"]["tmp_name"];
                $imageQuality = 70;
                $run = $dbtask->compress_image($tempName, $Location, $imageQuality);

                if ($sys_cat == "Video") {
                    $uploadDir = "/../video/";
                    $dbDir = "video/";
                    $formName = "myfile";

                    $file = $dbtask->uploadVid($uploadDir, $dbDir, $formName);
                    if ($file) {

                        $data = array("user_id" => $user_id,
                            "category_id" => $category_id,
                            "title" => $title,
                            "file" => $file,
                            "image" => $image,
                            "type" => $type,
                            "sys_cat" => $sys_cat,
                            "amount" => $amount,
                            "date" => $date
                        );
                        $table_name = "messages";
                        $message = " Done!";
                        $try = $dbtask->newInsert($table_name, $data, $message);
                    }

                } elseif ($sys_cat == 'Audio') {

                    $uploadDir = "/../audio_files/";
                    $dbDir = "audio_files/";
                    $formName = "myfile";

                    $file = $dbtask->uploadVid($uploadDir, $dbDir, $formName);
                    if ($file) {

                        $data = array("user_id" => $user_id,
                            "category_id" => $category_id,
                            "title" => $title,
                            "file" => $file,
                            "image" => $image,
                            "type" => $type,
                            "sys_cat" => $sys_cat,
                            "amount" => $amount,
                            "date" => $date
                        );
                        $table_name = "messages";
                        $message = " Done!";
                        $try = $dbtask->newInsert($table_name, $data, $message);
                    }


                } else {


                }
            }
        }


    }

} elseif (isset($_POST['rec'])) {


    $email = $_POST['email'];
    $sample = time();
    $code = sha1($sample);
    $date = date('Y-m-d');


    $table = "users";
    $data = "users.user_id,users.fullname,users.email,users.password,users.initial";
    $condition = " users.email='$email'";
    $myData = $dbtask->conditionTableIN($data, $table, $condition);
    $row = $myData->fetch(PDO::FETCH_ASSOC);

    $user_id = $row['user_id'];
    $initial = $row['initial'];
    $fullname = $row['fullname'];
    $fname = $initial . " " . $fullname;


    if (empty($email)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Email</p></div>";
    } else {


        $data = array("recovery_code" => $code,
            "email" => $email,
            "date" => $date,
            "status" => "active"
        );
        $table_name = "recovery";
        $message = " Recovery code has been sent to $email";
        $try = $dbtask->newInsert($table_name, $data, $message);
        if ($try == 1) {

            $link = "<a target='new' href='http://localhost/church/rec.php?recovery=$code'>Click here</a>   ";

            $details = "Hi " . $fname . " <br/>" . " To recover your password." . $link;

            $message = '
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family:  Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>churchVille</title>


<style type="text/css">
img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none;
 width: 100% !important; height: 100%; line-height: 1.6em;
}
body {
background-color: #f6f6f6;
}
@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }
  h1 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h2 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h3 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h4 {
    font-weight: 800 !important; margin: 10px 0 5px !important;
  }
  h1 {
    font-size: 22px !important;
  }
  h2 {
    font-size: 18px !important;
  }
  h3 {
    font-size: 16px !important;
  }
  .container {
    padding: 0 !important; width: 100% !important;
  }
  .content {
    padding: 0 !important;
  }
  .content-wrap {
    padding: 10px !important;
  }
  .invoice {
    width: 100% !important;
  }
}


footer {
	
 
    left: 0;
    right: 0;
    text-align: center;
    font-family: arial;
}
.footerLinks {
   text-align: center;
}
.footerLinks ul {
	padding: 0;
    list-style-type: none;
    margin: 0;
}
.footerLinks li {
	display: inline;
}
.footerLinks a {
	    color: #fffbfb;
	text-decoration: none;
	font-size: 13px;
}
.copyright {
    text-align: center;
}

.copyright p {
	margin: 0;
	color: #b3b3b3;
	font-size: 11px;
}
</style>
</head>

<body style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: rgb(68, 84, 106); margin: 0;" bgcolor="#f6f6f6">

<table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6"><tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
		<td class="container" width="600" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
			<div class="content" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
				<table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;" bgcolor="#fff"><tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-wrap" style="font-family: Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
							<meta itemprop="name" content="Not scare" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;" /><table width="100%" cellpadding="0" cellspacing="0" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; " valign="top">
										<h2>Account recovery </h2>
										
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
									 ' . $details . '
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block"  style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
	
									</td>
								</tr><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">

									</td>
								</tr></table></td>
					</tr></table><div class="footer" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
					<table width="100%" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"><td class="aligncenter content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
					<footer>
	<div class="footerLinks">
		<ul>
			<li><a href="#">Privacy Policy</a></li>|
  			<li><a href="#">Legal</a></li> |
  			<li><a href="#">Site Map</a></li> |
  			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
	<div class="copyright">
		<p>Copyright © 2019  ChurchVill Inc. All rights reserved</p>
</footer>
					
					</td>
						</tr></table></div></div>
		</td>
		<td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
	</tr></table></body>
</html>

	
	
	';
            $to = $email;
            $mySubject = "Account recovery";
            $my = $dbtask->sendThisMail($to, $message, $mySubject);


        }


    }
} // add asset Types logic
elseif (isset($_POST['new_category'])) {

//post attributes
    $category = $_POST['category'];
    $user_id = $_POST['user_id'];
// Validation
    if (empty($category)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please enter category name</p> </div>";
    } elseif (empty($user_id)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> Please login</p> </div>";
    } else {

        $data = array("category" => $category, "user_id" => $user_id);
        $table_name = "category";
        $message = "category added";
        $try = $dbtask->newInsert($table_name, $data, $message);;


    }

} elseif (isset($_POST['followUser'])) {

//post attributes
    $minister = $_POST['myminister'];
    $liker = $_POST['liker'];
    $fname = $_POST['fname'];
    $user_id = $_POST['myuser_id'];

    $object1 = $_POST['myminister'];
    $object2 = $_POST['myuser_id'];
    $table = "followers";
    $column1 = "user_id";
    $column2 = "minister";
    $countC = "user_id";


    // Validation	
    $exist = $dbtask->findExistTwo($object1, $object2, $table, $column1, $column2, $countC);
    if ($exist > 0) {
        echo "<div class='$failedInfo'> <p> You are following $fname</p> </div>";
    } elseif (empty($user_id)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> login please</p> </div>";
    } elseif (empty($minister)) {
        echo "<div class='alert alert-danger'> <p><i class='icon-remove'></i> error, login</p> </div>";
    } else {
        $details = "You are being followed by $liker";
        $data = array("minister" => $minister, "user_id" => $user_id);
        $table_name = "followers";
        $message = "You are following 	$fname ";
        $try = $dbtask->newInsert($table_name, $data, $message);

        if ($try == 1) {

            $date = date('Y-m-d');
            $data = array("details" => $details, "minister" => $minister, "user_id" => $user_id, "date" => $date, "status" => "active");
            $table_name = "notification";
            $message = "empty";
            $try = $dbtask->newInsert($table_name, $data, $message);
        }


    }

} elseif (isset($_POST['edit_category'])) {

    $category_id = $_POST['category_id'];
    $category = $_POST['category'];


    if (empty($category)) {
        echo "<div class='$failedInfo'> <p>enter category </p> </div>";
    } else {

        $table_name = "category";
        $idC = "category_id= ?";
        $data = array($category, $category_id);
        $cols = array("category");
        $message = "category updated";
        $commit = $dbtask->newUpdate($table_name, $idC, $cols, $data, $message);


    }

} elseif (isset($_POST['update'])) {

    $user_id = $_POST['user_id'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password1'];


    if (empty($pass1 == $pass2)) {
        echo "<div class='$failedInfo'> <p>password do not match</p> </div>";
    } else {
        $password = $pass1;

        $table_name = "users";
        $idC = "user_id= ?";
        $data = array($password, $user_id);
        $cols = array("password");
        $message = "password changed";
        $commit = $dbtask->newUpdate($table_name, $idC, $cols, $data, $message);


    }

} elseif (isset($_POST['acc_rec'])) {

    $user_id = $_POST['user_id'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password1'];
    $email = $_POST['em'];

    if (empty($pass1 == $pass2)) {
        echo "<div class='$failedInfo'> <p>password do not match</p> </div>";
    } else {
        $password = sha1($pass1);

        $table_name = "users";
        $idC = "user_id= ?";
        $data = array($password, $user_id);
        $cols = array("password");
        $message = "password changed  <a href='login.php'>Login here</a>";
        $commit = $dbtask->newUpdate($table_name, $idC, $cols, $data, $message);

        if ($commit) {

            $table_name = "recovery";
            $idC = "email= ?";
            $status = "invalid";
            $data = array($status, $email);
            $cols = array("status");
            $message = "empty";
            $commit = $dbtask->newUpdate($table_name, $idC, $cols, $data, $message);


        }


    }

} elseif (isset($_POST['edit_employee'])) {

    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $notification = $_POST['notification'];

    $phone = $_POST['phone'];
    $institution_id = $_POST['institution_id'];

    if (empty($firstname)) {
        echo "<div class='$failedInfo'> <p>please enter First Name</p> </div>";
    } elseif (empty($lastname)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Surname</p> </div>";
    } elseif (empty($notification)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please choose notification</p></div>";
    } elseif (empty($user_id)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> error</p> </div>";
    } elseif (empty($email)) {
        echo " <div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Email</p></div>";
    } elseif (empty($role)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter role</p> </div>";
    } elseif (empty($phone)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please enter Phone Number</p> </div>";
    } elseif (empty($institution_id)) {
        echo "<div class='$failedInfo'> <p><i class='icon-remove'></i> Please choose institution name</p> </div>";
    } else {


        $table_name = "users";
        $idC = "user_id= ?";
        $data = array($firstname, $lastname, $email, $phone, $institution_id, $role, $notification, $user_id);
        $cols = array("firstname", "lastname", "email", "phone", "institution_id", "role", "notification");
        $message = "updated";
        $commit = $dbtask->newUpdate($table_name, $idC, $cols, $data, $message);


    }

} else {
    echo "mmmmmm";
}

?>