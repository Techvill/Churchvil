<?php
session_start();
include('../class/security.php');
$newAuth = new  AUTHENTICATE();
$backend = new  SYSTEM();
$newAuth->userToken();

$myIdentity = $newAuth->myID;
$myName = $newAuth->user;
$myRole = $newAuth->myrole;
$myEmail = $newAuth->myEmail;
$myMinistry = $newAuth->myMinistry;
$myImage = $newAuth->myImage;
$initial = $newAuth->initial;
$about = $newAuth->about;
$liker = $initial . "  " . $myName;
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CHURCHVILL</title>

<!-- Main Styling -->
<link href="../media/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="../media/css/style.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../media/vid/mediaelementplayer.css">
<style>


    code {
        font-size: 0.8em;
    }

    #player2-container .mejs__time-buffering, #player2-container .mejs__time-current, #player2-container .mejs__time-handle,
    #player2-container .mejs__time-loaded, #player2-container .mejs__time-hovered, #player2-container .mejs__time-marker, #player2-container .mejs__time-total {
        height: 2px;
    }

    #player2-container .mejs__time-total {
        margin-top: 9px;
    }

    #player2-container .mejs__time-handle {
        left: -5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ffffff;
        top: -5px;
        cursor: pointer;
        display: block;
        position: absolute;
        z-index: 2;
        border: none;
    }

    #player2-container .mejs__time-handle-content {
        top: 0;
        left: 0;
        width: 12px;
        height: 12px;
    }

    .my-select {
        visibility: hidden;
    }
</style>
</head>

<body>


<header>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2 pd">
                <a href="index.php"><img src="../media/images/l2.png" class="logo"></a>

                <div id="button-box" class="button-box float-left">

                    <button type="button" id="toggle-nav" class="toggle-nav mywhiteb">MENU<span>&#9776;</span></button>
                </div>

            </div> <!-- End Logo & Menu-Toggle -->

            <div class="col-md-5 pd">
                <form method="post" action="search.php" class="myfomdown">
                    <div class=" row ">

                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-sm form-control-borderless" name="search"
                                   type="search" placeholder="Search ministers or messages">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button class="btn btn-outline-light btn-sm" type="submit">Search</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div><!-- End Search-Bar -->

            <div class="col-md-5 pd">
                <ul id="user-info">
                    <li>
                        <ul class="notifications">

                            <?php
                            $table = "notification";
                            $condition = "minister= '$myIdentity' AND status ='active'";
                            $myData = $backend->conditionTable($table, $condition);
                            $total = $myData->rowcount();
                            if ($total > 0) {
                                ?>

                                <li><a href="notifications.php"><i
                                                class="fa fa-bell"></i><span><?php echo $total; ?></span></a></li>
                                <?php
                            } else {

                                echo '<li><a href="notifications.php"><i class="fa fa-bell"></i></a></li>';

                            }

                            ?>

                        </ul>
                    </li>
                    <li>


                    </li>
                    <li>

                        <img src="../<?php echo $myImage; ?>">
                        <div>

                            <p class="username"><?php echo $initial . "  " . $myName; ?></p>
                            <p><a class="mywhite" href="logout.php">Logout</a></p>

                        </div>

                    </li>
                </ul> <!-- End Ul -->
            </div> <!-- End User Information -->

        </div> <!-- End Row -->
    </div> <!-- End Container-Fluid -->
</header>
<!-- End Header -->

<hr>


<div class="row">

    <!--sidemenu----------->
    <div class="col-md-3 ">

        <div class="hrline sid">
            <div class="colorleft text-center text-muted">
                <h6><strong>Browse</strong></h6>
            </div>
        </div>
        <!-- SIDEBAR MENU -->


        <div class="smenu">

            <ul class="nav flex-column">


                <li class="nav-item">
                    <a class="nav-link disabled" href="videos.php">Video's <i class="fa fa-film"> </i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="audio.php">Audio's <i class="fa fa-music"> </i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="login.php">Login</a>
                </li>
                <?php
                $table = " followers";
                $data = "COUNT(followers.user_id) AS tt";
                $condition = " followers.minister='$myIdentity'";
                $myData = $backend->conditionTableIN($data, $table, $condition);
                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                    $tt = $row['tt'];

                    ?>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Follows (<?php echo $tt; ?>)</a>
                    </li>

                <?php } ?>
            </ul>
            <div class="hrline xx">
            </div>


        </div>


        <!-- END MENU -->


    </div>
    <!-- end  sidemenu----------->


    <div class="col-md-9">

        <div id="top-bar">
            <div class="box">


                <div id="navigation" class="navigation">
                    <nav id="nav">
                        <ul class="sf-menu">
                            <li><a class="mun" href="index.php">Home</a></li>
                            <li><a href="ministers.php">Ministers </a></li>
                            <li><a href="list.php">Categories </a></li>
                            <li><a href="freebies.php">Freebies </a></li>
                            <li><a href="new.php">New release </a></li>
                            <li><a href="#">My uploads <i class="fa fa-chevron-down"></i></a>
                                <ul class="1stchild">
                                    <li class="childi"><a href="upload.php">Upload</a></li>
                                    <li class="childi"><a href="uploads.php">View uploads</a></li>

                                </ul>
                            </li>


                            <li><a href="#">Account <i class="fa fa-chevron-down"></i></a>
                                <ul class="1stchild">
                                    <li class="childi"><a href="account.php">Change password</a></li>
                                    <li class="childi"><a href="myinfo.php?id=<?php echo $myIdentity; ?>">account
                                            details</a></li>
                                    <li class="childi"><a href="payment.php">Payments</a></li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>


            </div>
        </div>