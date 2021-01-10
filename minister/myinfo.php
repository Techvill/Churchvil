<?php include('../include/minister_header.php'); ?>

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
                                        <div class="MyCaption"> Follow</div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body par innerlink text-center">
                                <h5 class="card-title"><?php echo $fname; ?></h5>
                                <p> <?php echo $ministry; ?></p>

                            </div>

                            <br/><br/><br/>

                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 pud">
                        <div class="profile-info-left">
                            <div class="section">
                                <h3>About <?php echo $fname; ?></h3>


                                <p class="text-muted"><?php echo $ministry; ?> </p>


                                <h3>Statistics</h3>


                                <br/>

                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item purple">
                                                <h3 class="pull-right">
                                                    <i class="fa fa-users"></i>
                                                </h3>
                                                <?php
                                                $thisID = $_GET['id'];
                                                $table = " followers";
                                                $data = "COUNT(followers.user_id) AS tt";
                                                $condition = " followers.user_id='$thisID'";
                                                $myData = $backend->conditionTableIN($data, $table, $condition);
                                                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                                    $tt = $row['tt'];

                                                    ?>
                                                    <h4 class="list-group-item-heading count purple"> <?php echo $tt;; ?></h4>

                                                <?php } ?>
                                                <p class="list-group-item-text">
                                                    Followers</p>
                                            </a>

                                            <a href="#" class="list-group-item blue">
                                                <h3 class="pull-right green">
                                                    <i class="fa fa-upload"></i>
                                                </h3>
                                                <?php
                                                $thisID = $_GET['id'];
                                                $table = " messages";
                                                $data = "COUNT(messages.user_id) AS tt";
                                                $condition = " messages.user_id='$thisID'";
                                                $myData = $backend->conditionTableIN($data, $table, $condition);
                                                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                                    $tt = $row['tt'];

                                                    ?>
                                                    <h4 class="list-group-item-heading count green"> <?php echo $tt;; ?></h4>
                                                <?php } ?>

                                                <p class="list-group-item-text">
                                                    Uploaded messages</p>
                                            </a>

                                            <a href="#" class="list-group-item ">
                                                <h3 class="pull-right skyblue">
                                                    <i class="fa fa-download"></i>
                                                </h3>
                                                <h4 class="list-group-item-heading count skyblue">
                                                    0</h4>
                                                <p class="list-group-item-text">
                                                    Download messages</p>
                                            </a>


                                        </div>
                                    </div>
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