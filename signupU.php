<?php include('include/step2header.php'); ?>

    <!--Content area----------->
    <div class="col-md-9">


        <?php include('include/2ndNav.php'); ?>


        <!--actual area-->

        <div class="respectMArgin">


            <br/>


            <div class="myWhite">
                <div class="Myheader">

                    <h3 class=" formH">Follower Signup</h3>


                </div>
                <div class="container blueLink">


                    <div class="row">

                        <div class="col-md-5">


                            <form id="paasw" method="post">

                                <input type="hidden" name="follower">


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="fullname" aria-describedby="fullname" placeholder="Full name">

                                </div>
                                <div class="form-group">
                                    <?php include('include/country.php'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-sm" name="email"
                                           aria-describedby="emailHelp" placeholder="Email">

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="password" aria-describedby="password" placeholder="password">

                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="password2" aria-describedby="password" placeholder="Repeat password">

                                </div>
                                <div class="form-group">
                                    <div class="info"></div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Signup</button>
                                </div>
                                <br/>
                                <p>Have an account? <a href="login.php"> Login now</a></p>


                            </form>

                        </div>


                    </div>


                </div>
            </div>

        </div>
        <!--end actual area-->
    </div>
    <!--Content area----------->


<?php include('include/index_footer.php'); ?>