<?php include('../include/minister_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">


        <br/>
        <div class="Myheader">

            <h3 class="">Ministers</h3>


        </div>
        <div class="row">
            <?php


            $table = "users";
            $data = "COUNT(users.user_id) AS total";
            $read = $backend->dataTableIN($data, $table);
            $rec = $read->fetch(PDO::FETCH_ASSOC);
            $total = $rec['total'];
            if ($total < 1) {
                echo '<center>
									<div class="alert alert-info">	
									<b><i class="fa fa-info"></i> -</b> No ministers.	
									</div>
									</center>';
            } else {
                $dis = 12;
                $total_page = ceil($total / $dis);
                $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $k = ($page_cur - 1) * $dis;

                $table = "users";
                $data = "users.user_id,users.fullname,users.email,users.password,users.initial,users.role,users.about,users.country,users.image,users.ministry
															";

                $myData = $backend->dataTableIN($data, $table);
                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                    $user_id = $row['user_id'];
                    $initial = $row['initial'];
                    $fullname = $row['fullname'];
                    $fname = $initial . " " . $fullname;
                    $ministry = $row['ministry'];
                    $role = $row['role'];
                    $about = $row['about'];
                    $country = $row['country'];

                    $image = $row['image'];


                    ?>

                    <div class="col-md-3 col-sm-6 col-xs-12 pud">
                        <div class="card area text-center">
                            <a href="details.php?id=<?php echo $user_id; ?>">
                                <div class="maske">
                                    <img src="../<?php echo $image; ?>" alt="Avatar" class="Overlayimage1"
                                         style="width:100%">

                                    <div class="middle">
                                        <div class="MyCaption"><i class="fa fa-eye"></i></div>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body par innerlink">
                                <h5 class="card-title st" title="<?php echo $fname; ?>"> <?php echo $fname; ?></h5>
                                <p class=" syt"> <?php echo $ministry; ?> </p>


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
                            echo '<li class="page-item"><a class="page-link" href="ministers.php?page=' . ($page_cur - 1) . '&&name=LISTING" ><i class="fa fa-angle-double-left"></i></a></li>';
                        } else {
                            echo '<li class="page-item disabled">  <span class="page-link"><i class="fa fa-angle-double-left"></i></span></li>';
                        }
                        for ($i = 1; $i < $total_page; $i++) {
                            if ($page_cur == $i) {
                                echo '<li class="page-item active"><span class="page-link"> ' . $i . ' <span class="sr-only">(current)</span> </span></li>';
                            } else {
                                echo '  <li class="page-item"><a class="page-link" href="ministers.php?page=' . $i . '&&name=LISTING"  >' . $i . ' </a></li>';
                            }
                        }
                        if ($page_cur < $total_page) {
                            echo ' <li class="page-item">
	<a class="page-link" href="ministers.php?page=' . ($page_cur + 1) . '&&name=LISTING" > <i class="fa fa-angle-double-right"></i></a></li>';
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