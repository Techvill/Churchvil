<?php include('../include/minister_header.php'); ?>

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
                            <h5 class="card-title">Update Info</h5>
                            <p><?php echo $myMinistry; ?></p>


                            <form id="user" method="post">

                                <input type="hidden" name="update">
                                <input type="hidden" name="user_id" value="<?php echo $myIdentity; ?>">

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="password" placeholder="new password">
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

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="profile-info-left">
                        <div class="section">


                            <div class="row">

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