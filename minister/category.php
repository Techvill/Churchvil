<?php include('../include/minister_header.php'); ?>


<?php if (isset($_GET['edit'])) { ?>


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
                                <h5 class="card-title">Update category</h5>
                                <p><?php echo $myMinistry; ?></p>

                                <?php
                                $category_id = $_GET['edit'];
                                $table = "category";
                                $condition = "category.category_id='$category_id'";
                                $myData = $backend->conditionTable($table, $condition);
                                while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                    $category_id = $row['category_id'];
                                    $category = $row['category'];
                                    ?>

                                    <form id="user" method="post">

                                        <input type="hidden" name="edit_category">
                                        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm"
                                                   id="exampleInputEmail1" name="category"
                                                   value="<?php echo $category; ?>">
                                        </div>


                                        <div class="form-group">
                                            <div class="info"></div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                                        </div>
                                        <br/>

                                    </form>
                                <?php } ?>


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


<?php } else { ?>


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
                                <h5 class="card-title">New category</h5>
                                <p><?php echo $myMinistry; ?></p>


                                <form id="user" method="post">

                                    <input type="hidden" name="new_category">
                                    <input type="hidden" name="user_id" value="<?php echo $myIdentity; ?>">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                                               name="category" placeholder="enter category">
                                    </div>


                                    <div class="form-group">
                                        <div class="info"></div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Add</button>
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

                                    <h5 class="card-title"> Message Category</h5>

                                </div>

                                <div class="row">


                                    <div class="info1"></div>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                Category
                                            </th>
                                            <th>
                                                Action
                                            </th>


                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                        $table = "users,category";
                                        $data = "category.category_id,category.category,users.initial,users.fullname";
                                        $condition = " category.user_id =users.user_id AND users.user_id='$myIdentity'
						";
                                        $myData = $backend->conditionTableIN($data, $table, $condition);
                                        while ($row = $myData->fetch(PDO::FETCH_ASSOC)) {
                                            $category_id = $row['category_id'];
                                            $category = $row['category'];
                                            $table = "users,category,messages";
                                            $data = "COUNT(messages.message_id) AS tt";
                                            $condition = "  messages.category_id='$category_id' AND messages.category_id=category.category_id GROUP BY category.category_id";
                                            $myData1 = $backend->conditionTableIN($data, $table, $condition);
                                            $row1 = $myData1->fetch(PDO::FETCH_ASSOC);
                                            $tt = $row1['tt'];
                                            ?>
                                            <tr class="delete">

                                                <td>
                                                    <?php echo $category; ?> : <?php echo $tt; ?>
                                                </td>

                                                <td>
                                                    <div class="template-demo">

                                                        <form method="post">
                                                            <a href="category.php?edit=<?php echo $category_id; ?>"
                                                               class="btn btn-sm btn-outline-info"> <i
                                                                        class="fa fa-edit"></i> </a>


                                                            <?php echo '<a href="#" id="' . $category_id . '" class="deleteCat btn btn-sm btn-outline-danger">  <i class="fa fa-trash"></i> </a>'; ?>


                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>


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

<?php } ?>


<?php include('../include/user_footer.php'); ?>