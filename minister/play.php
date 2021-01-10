<?php include('../include/minister_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">

        <div class="container-fluid">

            <div class="row   bwhite">

                <div class=" area  col-md-8 col-sm-12 col-xs-12 pud">
                    <div class="dym">

                        <div class="maske ">


                        </div>

                        <div class="card-body par innerlink ">


                            <?php
                            $thisID = $_GET['id'];
                            $table = "messages,users,category";
                            $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
																			messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry
																			";
                            $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id 
																				AND messages.message_id='$thisID'
																				GROUP BY messages.message_id ASC LIMIT 6";
                            $myData = $backend->conditionTableIN($data, $table, $condition);
                            while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                $message_id = $row['message_id'];
                                $category = $row['category'];
                                $title = $row['title'];
                                $amount = $row['amount'];
                                $initial = $row['initial'];
                                $fullname = $row['fullname'];
                                $fname = $initial . " " . $fullname;
                                $ministry = $row['ministry'];
                                $time = $row['time'];
                                $date = $row['date'];
                                $file = $row['file'];
                                $views = $row['view'];
                                $image = $row['image'];
                                $sys_cat = $row['sys_cat'];

                                $viewUpdaate = $backend->UpdateView($views, $message_id);

                                $ext = pathinfo($file, PATHINFO_EXTENSION);

                                ?>

                                <section>

                                    <form action="#" method="get">
                                        <select class="my-select" name="lang">

                                            <option value="en" selected>English (en)</option>

                                        </select>

                                        <label>
                                            <select class="my-select" name="stretching">

                                                <option value="responsive " selected>Responsive</option>

                                            </select>
                                        </label>
                                    </form>
                                </section>
                                <?php
                                if ($sys_cat == "Video") {

                                    ?>
                                    <div class="players" id="player1-container  vidDiv">


                                        <div class="media-wrapper">
                                            <video id="player1" width="300" height="380" style="width:100%;"
                                                   poster="../<?php echo $image; ?>" preload="none" controls playsinline
                                                   webkit-playsinline>
                                                <source src="../<?php echo $file; ?>" type="video/<?php echo $ext; ?>">
                                                <track srclang="en" kind="subtitles" src="mediaelement.vtt">
                                                <track srclang="en" kind="chapters" src="chapters.vtt">
                                            </video>
                                        </div>
                                        <div class="row ry">
                                            <div class="col-sm-6">
                                                <h5 class=""><?php echo $title; ?> <span
                                                            class="specialT">- <?php echo $initial; ?> <?php echo $myName; ?> (<?php echo $myMinistry; ?>)</span>
                                                </h5><br/>
                                                <p class="vidp"><?php echo $views; ?> views</p>
                                            </div>
                                            <div class="col-sm-6">


                                                <ul class="social-icons-ql">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>

                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-align-justify"></i> Save </a></li>


                                                </ul>

                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <a href="../<?php echo $file; ?>" class="btn btn-outline-primary">Download
                                                <span class="fa fa-download"></span></a>

                                        </div>
                                        <hr/>
                                        <br>

                                        <br>

                                    </div>
                                    <?php
                                } else {
                                    ?>

                                    <div class="players" id="player2-container">
                                        <ul class="event-list">
                                            <li>
                                                <img alt="Independence Day" src="../<?php echo $image; ?>"/>
                                                <div class="infok">
                                                    <h2 class="title"><?php echo $fname; ?></h2>
                                                    <br/>

                                                    <div class="media-wrapper">
                                                        <audio id="player2" preload="none" controls
                                                               style="max-width:100%;">
                                                            <source src="../<?php echo $file; ?>"
                                                                    type="audio/<?php echo $ext; ?>">
                                                        </audio>
                                                    </div>
                                                    <ul>
                                                        <li style="width:50%;"><a href="#website"><span
                                                                        class="fa fa-globe"></span> <?php echo $views; ?>
                                                            </a></li>

                                                    </ul>
                                                </div>
                                                <div class="social">
                                                    <ul>
                                                        <li class="facebook" style="width:33%;"><a
                                                                    href="#facebook"><span
                                                                        class="fa fa-facebook"></span></a></li>
                                                        <li class="twitter" style="width:34%;"><a href="#twitter"><span
                                                                        class="fa fa-twitter"></span></a></li>
                                                        <li class="google-plus" style="width:33%;"><a
                                                                    href="#google-plus"><span
                                                                        class="fa fa-google-plus"></span></a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                        </ul>
                                        <h5 class=""><?php echo $title; ?> <span
                                                    class="specialT">- <?php echo $myName; ?> (<?php echo $myMinistry; ?>)</span>
                                        </h5><br/>
                                        <div class="text-center">
                                            <a href="../<?php echo $file; ?>" class="btn btn-outline-primary">Download
                                                <span class="fa fa-download"></span></a>
                                        </div>

                                        <br>
                                    </div>
                                <?php }
                            } ?>


                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 pud">
                    <div class="profile-info-left">
                        <div class="section">

                            <div class=" par innerlink text-center">

                                <h5 class="card-title">Recent Messages</h5>

                            </div>

                            <div class="row">


                                <?php

                                $table = "messages,users,category";
                                $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
																			messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry
																			";
                                $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id 
																				GROUP BY messages.message_id ASC LIMIT 6";
                                $myData = $backend->conditionTableIN($data, $table, $condition);
                                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                    $message_id = $row['message_id'];
                                    $category = $row['category'];
                                    $title = $row['title'];
                                    $amount = $row['amount'];
                                    $initial = $row['initial'];
                                    $fullname = $row['fullname'];
                                    $fname = $initial . " " . $fullname;
                                    $ministry = $row['ministry'];
                                    $time = $row['time'];
                                    $date = $row['date'];
                                    $file = $row['file'];
                                    $views = $row['view'];
                                    $image = $row['image'];

                                    $newdate = $backend->time_ago($time)


                                    ?>
                                    <div class="col-md-12 col-sm-6 col-xs-12 pud">
                                        <div class="media td">

                                            <img class="mr-3" src="../<?php echo $image; ?>"
                                                 alt="Generic placeholder image">
                                            <a href="play.php?id=<?php echo $message_id; ?>">
                                                <div class="media-body">
                                                    <h5 class="mt-0"
                                                        title="<?php echo $title; ?>"> <?php echo $title; ?>    </h5>
                                                    <span class="mp"><?php echo $category; ?></span>

                                                    <p class="mp"><?php echo $fname; ?><br/><?php echo $views; ?> views
                                                        . <?php echo $newdate; ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
<!--end actual area-->
</div>
<!--Content area----------->


</div> <!-- End Row -->


<hr>
<?php include('../include/user_footer.php'); ?>