<?php include('../include/follower_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">

        <div class="container-fluid">


            <div class="row   bwhite">
                <?php
                $thisID = $_GET['id'];
                $table = "users";
                $data = "users.user_id,users.fullname,users.email,users.password,users.initial,users.role,users.about,users.country,users.image,users.ministry";
                $condition = " users.user_id='$thisID'";
                $myData = $backend->conditionTableIN($data, $table, $condition);
                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                    $user_id = $row['user_id'];
                    $initial = $row['initial'];
                    $fullname = $row['fullname'];
                    $fname = $initial . " " . $fullname;
                    $ministry = $row['ministry'];
                    $role = $row['role'];
                    $about = $row['about'];
                    $country = $row['country'];

                    $image = $row['image']


                    ?>

                    <div class=" area  col-md-6 col-sm-6 col-xs-12 pud">
                        <div class="dym">
                            <a href="">
                                <div class="maske ">
                                    <img src="../<?php echo $image; ?>" alt="Avatar" class="Overlayimage"
                                         style="width:100%">

                                    <div class="middle text-center">

                                    </div>
                                </div>
                            </a>
                            <div class="card-body par innerlink text-center">
                                <h5 class="card-title"><?php echo $fname; ?></h5>
                                <p> <?php echo $ministry; ?></p>
                                <?php
                                if ($user_id == $myIdentity) {


                                } else {

                                    ?>
                                    <form id="user" method="post">

                                        <input type="hidden" name="followUser">
                                        <input type="hidden" name="myuser_id" value="<?php echo $myIdentity; ?>">
                                        <input type="hidden" name="liker" value="<?php echo $liker; ?>">
                                        <input type="hidden" name="fname" value="<?php echo $fname; ?>">
                                        <input type="hidden" name="myminister" value="<?php echo $thisID; ?>">
                                        <div class="info"></div>
                                        <center>
                                            <button type="submit" class="btn btn-primary">Follow</button>
                                        </center>

                                    </form>

                                <?php } ?>
                            </div>

                            <br/><br/><br/>

                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pud">
                        <div class="profile-info-left">
                            <div class="section">
                                <h3>About <?php echo $fname; ?></h3>


                                <p class="text-muted"><?php echo $ministry; ?> </p>


                                <h3>Recent</h3>


                                <br/>
                                <div class=" par innerlink text-center">

                                    <h5 class="card-title">Recent Messages</h5>

                                </div>

                                <div class="row">


                                    <?php

                                    $table = "messages,users,category";
                                    $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
																			messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry
																			";
                                    $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id AND users.user_id='$myIdentity' 
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

                                                        <p class="mp"><?php echo $fname; ?><br/><?php echo $views; ?>
                                                            views . <?php echo $newdate; ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>


                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
</div></div></div>


<hr>
<?php include('../include/user_footer.php'); ?>