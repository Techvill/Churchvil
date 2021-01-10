<?php include('../include/minister_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">


        <br/>
        <div class="Myheader">
            <h3 class="">Categories</h3>


        </div>
        <div class="row">
            <?php

            $tab = "messages,users,category";
            $condi = "messages.category_id=category.category_id AND messages.user_id=users.user_id ";
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
                $data = "COUNT(messages.message_id) AS tm,messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
															messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry, users.image AS um 
															";
                $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id AND messages.user_id='$myIdentity'
																GROUP BY category.category_id ASC LIMIT $k,$dis";
                $myData = $backend->conditionTableIN($data, $table, $condition);
                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                    $message_id = $row['message_id'];
                    $category = $row['category'];
                    $category_id = $row['category_id'];
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
                    $up = $row['um'];
                    $tm = $row['tm'];
                    $newdate = $backend->time_ago($time)


                    ?>

                    <div class="col-md-3 col-sm-6 col-xs-12 pud">
                        <div class="card area text-center">
                            <a href="categ.php?id=<?php echo $category_id; ?>&&nm=<?php echo $category; ?>">
                                <div class="maske">
                                    <img src="../<?php echo $up; ?>" alt="Avatar" class="Overlayimage1"
                                         style="width:100%">

                                    <div class="middle">
                                        <div class="MyCaption"><i class="fa fa-eye"></i></div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body par innerlink">
                                <h5 class="card-title st"
                                    title="<?php echo $category; ?>"><?php echo $category; ?></h5></p>
                                <p class=" syt"> <?php echo $fname; ?> <br/><span class="yui"><?php echo $tm; ?> Messages </span>
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
                            echo '<li class="page-item"><a class="page-link" href="list.php?page=' . ($page_cur - 1) . '&&name=LISTING" ><i class="fa fa-angle-double-left"></i></a></li>';
                        } else {
                            echo '<li class="page-item disabled">  <span class="page-link"><i class="fa fa-angle-double-left"></i></span></li>';
                        }
                        for ($i = 1; $i < $total_page; $i++) {
                            if ($page_cur == $i) {
                                echo '<li class="page-item active"><span class="page-link"> ' . $i . ' <span class="sr-only">(current)</span> </span></li>';
                            } else {
                                echo '  <li class="page-item"><a class="page-link" href="list.php?page=' . $i . '&&name=LISTING"  >' . $i . ' </a></li>';
                            }
                        }
                        if ($page_cur < $total_page) {
                            echo ' <li class="page-item">
	<a class="page-link" href="list.php?page=' . ($page_cur + 1) . '&&name=LISTING" > <i class="fa fa-angle-double-right"></i></a></li>';
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


<hr>
<?php include('../include/user_footer.php'); ?>