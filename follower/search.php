<?php include('../include/follower_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">

        <br/>
        <div class="Myheader">

            <h3 class="">Search</h3>


        </div>

        <div class="container-fluid">

            <div class="row   bwhite">

                <div class=" area  col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="row">


                        <?php

                        $search = $_POST['search'];
                        $tab = "messages";
                        $condi = " messages.title='$search' ";
                        $read = $backend->countPageCondi($tab, $condi);
                        $rec = $read->fetch(PDO::FETCH_ASSOC);
                        $total = $rec['total'];
                        if ($total < 1) {
                            echo '<center>
<div class="alert alert-info text-center">	
<h5 ><i class="fa fa-info"></i> - Search has found 0 results</h5>	<br/>
</div>
</center>';
                        } else {

                            echo " <h3 class='text-center myel'>$total results found</h3>    ";
                            $dis = 4;
                            $total_page = ceil($total / $dis);
                            $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
                            $k = ($page_cur - 1) * $dis;
                            $table = "messages,users,category";
                            $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry
";
                            $condition = "messages.category_id=category.category_id AND messages.user_id=users.user_id AND messages.title='$search'  ORDER BY messages.message_id DESC LIMIT $k,$dis";
                            $myData = $backend->conditionTable($table, $condition);
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
                                <hr/>
                            <?php }
                        } ?>


                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="profile-info-left">
                        <div class="section">

                            <div class="card-body par innerlink text-center">

                                <h5 class="card-title">Recent Messages</h5>

                            </div>

                            <div class="row">


                                <?php

                                $table = "messages,users,category";
                                $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
																			messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry
																			";
                                $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id AND messages.user_id='$myIdentity'
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


        <br/>


    </div>
</div>
<!--end actual area-->
</div>
<!--Content area----------->


</div> <!-- End Row -->


<hr>
<?php include('../include/user_footer.php'); ?>