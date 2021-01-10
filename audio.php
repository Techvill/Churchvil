<?php include('include/index_header.php'); ?>

    <!--Content area----------->
    <div class="col-md-9">


        <?php include('include/2ndNav.php'); ?>


        <!--actual area-->

        <div class="respectMArgin">
            <div class="">


                <br/>
                <div class="Myheader">

                    <h3 class="">Audios</h3>


                </div>
                <div class="row">
                    <?php


                    $tab = "messages,users,category";
                    $condi = "messages.category_id=category.category_id AND messages.user_id=users.user_id ORDER BY messages.message_id ASC ";
                    $read = $backend->countPageCondi($tab, $condi);
                    $rec = $read->fetch(PDO::FETCH_ASSOC);
                    $total = $rec['total'];
                    if ($total < 1) {
                        echo '<center>
									<div class="alert alert-info">	
									<b><i class="fa fa-info"></i> -</b> No messages.	
									</div>
									</center>';
                    } else {
                        $dis = 12;
                        $total_page = ceil($total / $dis);
                        $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
                        $k = ($page_cur - 1) * $dis;

                        $table = "messages,users,category";
                        $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
															messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry 
															";
                        $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id  AND sys_cat='Video'
																ORDER BY messages.message_id ASC LIMIT $k,$dis";
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

                            <div class="col-md-3 col-sm-6 col-xs-12 pud">
                                <div class="card area text-center">
                                    <a href="play.php?id=<?php echo $message_id; ?>">
                                        <div class="maske">
                                            <img src="<?php echo $image; ?>" alt="Avatar" class="Overlayimage1"
                                                 style="width:100%">
                                            <span class="duration"><?php echo $ministry; ?></span>
                                            <div class="middle">
                                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="card-body par innerlink">
                                        <h5 class="card-title st"
                                            title="<?php echo $title; ?>"><?php echo $title; ?></h5></p>
                                        <p class=" syt"> <?php echo $fname; ?> <br/><span
                                                    class="yui"><?php echo $views; ?> views . <?php echo $newdate; ?></span>
                                        </p>

                                    </div>
                                </div>
                            </div>

                        <?php }
                    } ?>


                </div>

                <center>
                    <br/> <br/>
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                if ($page_cur > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="audio.php?page=' . ($page_cur - 1) . '&&name=LISTING" ><i class="fa fa-angle-double-left"></i></a></li>';
                                } else {
                                    echo '<li class="page-item disabled">  <span class="page-link"><i class="fa fa-angle-double-left"></i></span></li>';
                                }
                                for ($i = 1; $i < $total_page; $i++) {
                                    if ($page_cur == $i) {
                                        echo '<li class="page-item active"><span class="page-link"> ' . $i . ' <span class="sr-only">(current)</span> </span></li>';
                                    } else {
                                        echo '  <li class="page-item"><a class="page-link" href="audio.php?page=' . $i . '&&name=LISTING"  >' . $i . ' </a></li>';
                                    }
                                }
                                if ($page_cur < $total_page) {
                                    echo ' <li class="page-item">
	<a class="page-link" href="audio.php?page=' . ($page_cur + 1) . '&&name=LISTING" > <i class="fa fa-angle-double-right"></i></a></li>';
                                } else {
                                    echo '<li class="page-item disabled active">  <span class="page-link"><i class="fa fa-angle-double-right"></i></span></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </center>


            </div>
        </div>
        <!--end actual area-->
    </div>
    <!--Content area----------->


    </div> <!-- End Row -->


<?php include('include/index_footer.php'); ?>