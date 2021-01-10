<?php include('../include/minister_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">

        <div class="container-fluid">

            <div class="row   bwhite">

                <div class=" area  col-md-6 col-sm-6 col-xs-12 pud">
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
                                            <video id="player1" width="300" height="260" style="max-width:100%;"
                                                   poster="../<?php echo $image; ?>" preload="none" controls playsinline
                                                   webkit-playsinline>
                                                <source src="../<?php echo $file; ?>" type="video/<?php echo $ext; ?>">
                                                <track srclang="en" kind="subtitles" src="mediaelement.vtt">
                                                <track srclang="en" kind="chapters" src="chapters.vtt">
                                            </video>
                                        </div>
                                        <h5 class=""><?php echo $title; ?> <span
                                                    class="specialT">- <?php echo $myName; ?> (<?php echo $myMinistry; ?>)</span>
                                        </h5><br/>
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
                                                    <p class="desc"><?php echo $title; ?></p>
                                                    <br/><br/>
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
                <div class="col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="profile-info-left">
                        <div class="section">

                            <div class="card-body par innerlink text-center">

                                <h5 class="card-title">Recent Messages</h5>

                            </div>

                            <div class="row">
                                <div class="[ col-xs-12 col-sm-offset-2 col-sm-12 ]">
                                    <ul class="event-list">

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


                                            ?>
                                            <li>
                                                <img alt="Independence Day" src="../<?php echo $image; ?>"/>
                                                <div class="infok">
                                                    <h2 class="title"><?php echo $fname; ?></h2>
                                                    <p class="desc"><?php echo $title; ?></p>
                                                    <p><a class="desc"
                                                          href="play.php?id=<?php echo $message_id; ?>"><span
                                                                    class="fa fa-file-audio-o "></span> Play</a></p>
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
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>


        <br/>
        <div class="text-center"><h3> My videos</h3></div>
        <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12 pud">
                <div class="card area">
                    <a href="">
                        <div class="maske">
                            <img src="../media/images/3.jpg" alt="Avatar" class="Overlayimage" style="width:100%">
                            <span class="duration">4:03</span>
                            <div class="middle">
                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body par innerlink">
                        <h5 class="card-title" title="Bishop TD Jakes :Woman thou loose">Bishop TD Jakes :Woman thou
                            loose</h5>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 pud">
                <div class="card area">
                    <a href="">
                        <div class="maske">
                            <img src="../media/images/3.jpg" alt="Avatar" class="Overlayimage" style="width:100%">
                            <span class="duration">4:03</span>
                            <div class="middle">
                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body par innerlink">
                        <h5 class="card-title" title="Relationships">Bishop TD Jakes :Relationships</h5>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 pud">
                <div class="card area">
                    <a href="">
                        <div class="maske">
                            <img src="../media/images/3.jpg" alt="Avatar" class="Overlayimage" style="width:100%">
                            <span class="duration">4:03</span>
                            <div class="middle">
                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body par innerlink">
                        <h5 class="card-title" title="Love">Bishop TD Jakes :Love</h5>

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