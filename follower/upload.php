<?php include('../include/follower_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">

        <div class="container-fluid">

            <div class="row   bwhite">

                <div class=" area  col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="dym">

                        <div class="maske ">


                        </div>

                        <div class="card-body par innerlink text-center">
                            <h5 class="card-title">Upload message</h5>
                            <p><?php echo $myMinistry; ?></p>


                            <form id="user" method="post">

                                <input type="hidden" name="upload">
                                <input type="hidden" name="user_id" value="<?php echo $myIdentity; ?>">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="title" placeholder="message Title">
                                </div>

                                <div class="form-group">
                                    <select class="form-control form-control-sm" name="category_id">
                                        <option>Select message category</option>
                                        <?php
                                        $table = "category";
                                        $myData = $backend->getTableData($table);
                                        while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                            $category_id = $row['category_id'];
                                            $category = $row['category'];

                                            ?>
                                            <option value="<?php echo $category_id; ?>"><?php echo $category; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>File </label>
                                    <input type="file" class="form-control form-control-sm" name="myfile"
                                           aria-describedby="emailHelp">

                                </div>


                                <div class="form-group">
                                    <label>Cover pic </label>
                                    <input type="file" class="form-control form-control-sm" name="image"
                                           aria-describedby="emailHelp" placeholder="Email">

                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" name="sys_cat">
                                        <option>File type</option>
                                        <option value="Audio">Audio</option>
                                        <option value="Video">Video</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control form-control-sm" name="type">
                                        <option value="Free">Free</option>
                                        <option value="Paid">Paid</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="amount" aria-describedby="password" placeholder="amount">
                                </div>


                                <div class="form-group">
                                    <div class="info"></div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Upload</button>
                                </div>
                                <br/>


                            </form>


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