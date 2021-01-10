<?php include('../include/minister_header.php'); ?>

<!--actual area-->

<div class="respectMArgin">
    <div class="">

        <div class="container-fluid">

            <div class="row   bwhite">

                <div class=" area  col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="dym">
                        <a href="">
                            <div class="maske ">
                                <img src="../<?php echo $myImage; ?>" alt="Avatar" class="Overlayimage"
                                     style="width:100%">

                                <div class="middle text-center">
                                    <div class="MyCaption"><i class="fa fa-play"></i></div>
                                </div>
                            </div>
                        </a>
                        <div class="card-body par innerlink text-center">
                            <h5 class="card-title"><?php echo $initial . "  " . $myName; ?></h5>
                            <p><?php echo $myMinistry; ?></p>
                            <center>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> Contacts
                                    </label>
                                    <label class="btn btn-primary">
                                        |
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option3" autocomplete="off"> My uploads
                                    </label>
                                </div>
                            </center>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 pud">
                    <div class="profile-info-left">
                        <div class="section">


                            <p class="text-muted"><?php echo $about; ?> </p>


                        </div>

                    </div>
                </div>

            </div>
        </div>


        <br/>
        <div class="text-center"><h3> My videos</h3></div>
        <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12 pud">
                <div class="card area">
                    <a href="">
                        <div class="maske">
                            <img src="../media/images/3.jpg" alt="Avatar" class="Overlayimage" style="width:100%">
                            <span class="duration">4:03</span>
                            <div class="middle">
                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body par innerlink">
                        <h5 class="card-title" title="Bishop TD Jakes :Woman thou loose">Bishop TD Jakes :Woman thou
                            loose</h5>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 pud">
                <div class="card area">
                    <a href="">
                        <div class="maske">
                            <img src="../media/images/3.jpg" alt="Avatar" class="Overlayimage" style="width:100%">
                            <span class="duration">4:03</span>
                            <div class="middle">
                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body par innerlink">
                        <h5 class="card-title" title="Relationships">Bishop TD Jakes :Relationships</h5>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 pud">
                <div class="card area">
                    <a href="">
                        <div class="maske">
                            <img src="../media/images/3.jpg" alt="Avatar" class="Overlayimage" style="width:100%">
                            <span class="duration">4:03</span>
                            <div class="middle">
                                <div class="MyCaption"><i class="fa fa-play-circle"></i></div>
                            </div>
                        </div>
                    </a>
                    <div class="card-body par innerlink">
                        <h5 class="card-title" title="Love">Bishop TD Jakes :Love</h5>

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
<?php include('../include/user_footer.php'); ?>