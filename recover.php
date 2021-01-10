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

                            <h6 class=""><strong>Recover password</strong></h6>
                            <br/><br/>
                        </div>

                        <form id="paasw" method="post">

                            <div class="container blueLink">

                                <input type="hidden" name="rec">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-sm" name="email"
                                           aria-describedby="emailHelp" placeholder=" Enter your Email">

                                </div>

                                <div class="form-group">
                                    <div class="info"></div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Recover</button>
                                </div>


                        </form>


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