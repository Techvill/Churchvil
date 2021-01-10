<?php include('include/step2header.php'); ?>

    <!--Content area----------->
    <div class="col-md-9">


        <?php include('include/2ndNav.php'); ?>


        <!--actual area-->

        <div class="respectMArgin">


            <br/>

            <div class="myWhite">
                <div class="Myheader">

                    <h3 class=" formH">Minister Signup</h3>


                </div>
                <div class="container blueLink">
                    <form id="register" method="post">

                        <br/>
                        <p> Not a minister? <a href="signupU.php">Sign-up as a follower</a></p>
                        <div class="row">

                            <div class="col-md-5">

                                <div class=" text-center text-muted">


                                </div>

                                <input type="hidden" name="minister">
                                <input type="hidden" name="role" value="minister">

                                <div class="form-group">
                                    <select class="form-control form-control-sm" name="title">
                                        <option>Select title</option>
                                        <option>Bishop</option>
                                        <option>Pastor</option>
                                        <option>Apostle</option>
                                        <option>Prophetes</option>
                                        <option>Prophet</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <?php include('include/country.php'); ?>
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="exampleInputEmail1"
                                           name="fullname" aria-describedby="fullname" placeholder="Full name">

                                </div>

                                <div class="form-group">
                                    <label> Profile picture</label>
                                    <input type="file" class="form-control form-control-sm" name="image"
                                           aria-describedby="emailHelp">

                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-sm"
                                           id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">

                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="" name="password"
                                           aria-describedby="password" placeholder="password">

                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="" name="password2"
                                           aria-describedby="password" placeholder="Repeat password">

                                </div>


                            </div>


                            <div class="col-md-5">


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="ministry"
                                           aria-describedby="emailHelp" placeholder="ministry">

                                </div>

                                <div class="form-group">
                                    <textarea class="form-control form-control-sm" name="about"
                                              placeholder="about"></textarea>

                                </div>

                                <div class="form-group">

                                    <div class="info"></div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Signup</button>
                                </div>
                                <br/>
                                <p>Have an account? <a href="login.php"> Login now</a></p>


                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>

    </div>
    <!--end actual area-->
    </div>
    <!--Content area----------->


<?php include('include/index_footer.php'); ?>