<?php include('../include/minister_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class=" bwhite">


        <br/>
        <div class="Myheader">
            <h5 class="">My Uploads</h5>


        </div>
        <div class="container">


            <div class="info1"></div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        Message title
                    </th>
                    <th>
                        Category
                    </th>

                    <th>
                        Type
                    </th>

                    <th>
                        Amount
                    </th>

                    <th>
                        Cover
                    </th>

                    <th>
                        Date
                    </th>
                    <th>
                        Views
                    </th>
                    <th>
                        Action
                    </th>


                </tr>
                </thead>
                <tbody>
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
                    $data = "messages.message_id,messages.user_id,messages.category_id,messages.title,messages.file,messages.image,messages.type,messages.sys_cat,
															messages.amount,messages.time,messages.date,messages.view,category.category,users.fullname,users.initial,users.ministry 
															";
                    $condition = " messages.category_id=category.category_id AND messages.user_id=users.user_id AND messages.user_id='$myIdentity'
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
                        $type = $row['sys_cat'];
                        $newdate = $backend->time_ago($time)


                        ?>

                        <tr class="delete">

                            <td>
                                <?php echo $title; ?>
                            </td>
                            <td>
                                <?php echo $category; ?>
                            </td>
                            <td>
                                <?php echo $type; ?>
                            </td>

                            <td>
                                <?php echo $amount; ?>
                            </td>

                            <td>
                                <img src="../<?php echo $image; ?>" alt="Avatar" style="width:50px; height:50px;">
                            </td>

                            <td>
                                <?php echo $newdate; ?>
                            </td>
                            <td>
                                <?php echo $views; ?>
                            </td>
                            <td>
                                <div class="template-demo">

                                    <form method="post">
                                        <a class="btn btn-sm btn-outline-info"
                                           href="play.php?id=<?php echo $message_id; ?>"> <i
                                                    class="fa fa-play-circle"></i></a>


                                        <?php echo '<a href="#" id="' . $message_id . '" class="deleteUpload btn btn-sm btn-outline-danger">  <i class="fa fa-trash"></i> </a>'; ?>


                                    </form>
                                </div>
                            </td>

                        </tr>
                    <?php }
                } ?>

                </tbody>
            </table>


            <center>
                <br/> <br/>
                <div class="page-pagi">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if ($page_cur > 1) {
                                echo '<li class="page-item"><a class="page-link" href="uploads.php?page=' . ($page_cur - 1) . '&&name=LISTING" ><i class="fa fa-angle-double-left"></i></a></li>';
                            } else {
                                echo '<li class="page-item disabled">  <span class="page-link"><i class="fa fa-angle-double-left"></i></span></li>';
                            }
                            for ($i = 1; $i < $total_page; $i++) {
                                if ($page_cur == $i) {
                                    echo '<li class="page-item active"><span class="page-link"> ' . $i . ' <span class="sr-only">(current)</span> </span></li>';
                                } else {
                                    echo '  <li class="page-item"><a class="page-link" href="uploads.php?page=' . $i . '&&name=LISTING"  >' . $i . ' </a></li>';
                                }
                            }
                            if ($page_cur < $total_page) {
                                echo ' <li class="page-item">
	<a class="page-link" href="uploads.php?page=' . ($page_cur + 1) . '&&name=LISTING" > <i class="fa fa-angle-double-right"></i></a></li>';
                            } else {
                                echo '<li class="page-item disabled active">  <span class="page-link"><i class="fa fa-angle-double-right"></i></span></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </center>

            <br/><br/>


        </div>


    </div>
</div>
<!--end actual area-->
</div>
<!--Content area----------->


</div> <!-- End Row -->


<hr>
<?php include('../include/user_footer.php'); ?>