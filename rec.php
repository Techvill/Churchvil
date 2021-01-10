<?php include('include/step2header.php'); ?>

    <!--Content area----------->
    <div class="col-md-9">
        <div class="hrline sid">

            <?php include('include/2ndNav.php'); ?>

        </div>


        <!--actual area-->

        <div class="respectMArgin">


            <div class="myWhite">
                <div class="row">

                    <div class="col-md-6">


                        <div class=" text-center text-muted">


                            <h6 class=""><strong>Recover account</strong></h6>
                            <br/><br/>
                        </div>

                        <?php
                        $id = $_GET['recovery'];
                        $table = "recovery,users";
                        $data = " COUNT(recovery.recover_id) AS total, users.user_id,users.email ";
                        $condition = " recovery.email=users.email AND recovery.recovery_code='$id' ";
                        $read = $backend->conditionTableIN($data, $table, $condition);
                        $rec = $read->fetch(PDO::FETCH_ASSOC);
                        $total = $rec['total'];
                        $user_id = $rec['user_id'];
                        $email = $rec['email'];
                        if ($total < 1) {
                            echo "<div class='alert alert-danger'>Activation code expired</div>";
                        } else {

                            ?>
                            <div class="container">
                                <form id="paasw" method="post">

                                    <input type="hidden" name="acc_rec">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="em" value="<?php echo $email; ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-sm"
                                               id="exampleInputEmail1" name="password" placeholder="new password">
                                    </div>


                                    <div class="form-group">

                                        <input type="password" class="form-control form-control-sm" name="password1"
                                               aria-describedby="emailHelp" placeholder="confirm password">

                                    </div>


                                    <div class="form-group">
                                        <div class="info"></div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                                    </div>
                                    <br/>


                                </form>
                            </div>
                        <?php } ?>


                    </div>
                </div>
                <div class="col-md-5">


                </div>

            </div>
        </div>

    </div>
    <!--end actual area-->
    </div>
    <!--Content area----------->


<?php include('include/index_footer.php'); ?>