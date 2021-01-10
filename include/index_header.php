<?php

include('class/security.php');
$newAuth = new  AUTHENTICATE();
$backend = new  SYSTEM();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CHURCHVILL</title>

<!-- Main Styling -->
<link href="media/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="media/css/style.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="media/vid/mediaelementplayer.css">
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
                <a href="index.php"><img src="media/images/l2.png" class="logo"></a>

                <div id="button-box" class="button-box float-left">

                    <button type="button" id="toggle-nav" class="toggle-nav mywhiteb">MENU<span>&#9776;</span></button>
                </div>

            </div> <!-- End Logo & Menu-Toggle -->

            <div class="col-md-5 pd">
                <form class="myfomdown">
                    <div class=" row ">

                        <!--end of col-->
                        <div class="col">
                            <input class="form-control form-control-sm form-control-borderless" type="search"
                                   placeholder="Search ministers or messages">
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
            </ul>
            <div class="hrline xx">
            </div>


        </div>


        <div class="smenu">
            <div class="colorleft text-center text-muted">
                <h6><strong>Create account </strong></h6>
                <br/>
            </div>

            <form id="start" method="post">
                <div class="container-fluid">


                    <div class="form-group">
                        <select class="form-control form-control-sms" name="role">
                            <option>Select account</option>
                            <option value="minister">Minister</option>
                            <option value="follower">Follower</option>
                        </select>
                    </div>

                    <input type="hidden" name="start">

                    <div class="form-group">
                        <input type="email" class="form-control form-control-sm" name="email"
                               aria-describedby="emailHelp" placeholder="email">

                    </div>


                    <div class="form-group">
                        <input type="password" class="form-control form-control-sm" name="password"
                               aria-describedby="emailHelp" placeholder="password">

                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-sm" name="password2"
                               aria-describedby="emailHelp" placeholder="repeat password">

                    </div>

                    <div class="form-group">
                        <div class="info"></div>

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Get started</button>
                    </div>
                    <br/>

                </div>
            </form>

        </div>
        <!-- END MENU -->


    </div>
    <!-- end  sidemenu----------->