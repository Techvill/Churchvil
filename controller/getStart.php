<?php

session_start();
$pass = $_SESSION['mypass'];
$userRole = $_SESSION['userRole'];
$email = $_SESSION['userEmail'];
$password = sha1($pass);

if ($pass != null && $userRole != null && $email != null && $userRole == "minister") {

    ?>
    <div class=" text-center text-muted">
        <h6 class="text-center Heading"><strong>Minister Signup</strong></h6>
        <br/><br/>

    </div>
    <form id="register" method="post">

        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="role" value="<?php echo $userRole; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <input type="hidden" name="password2" value="<?php echo $password; ?>">
        <input type="hidden" name="minister">

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
            <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" name="fullname"
                   aria-describedby="fullname" placeholder="Full name">

        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-sm" name="ministry" aria-describedby="emailHelp"
                   placeholder="ministry">

        </div>


        <div class="form-group">
            <title> Profile picture</title>
            <input type="file" class="form-control form-control-sm" name="image" aria-describedby="emailHelp">

        </div>

        <div class="form-group">
            <textarea class="form-control form-control-sm" name="about" placeholder="about"></textarea>

        </div>

        <div class="form-group">
            <div class="info"></div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Finish</button>
        </div>
        <br/>
        <p>Have an account? <a href="login.php"> Login now!</a></p>


    </form>


    <?php
} elseif ($pass != null && $userRole != null && $email != null && $userRole == "follower") {
    ?>

    <div class=" text-center text-muted">
        <h6 class="text-center Heading"><strong>Follower Signup</strong></h6>
        <br/><br/>

    </div>

    <form id="register" method="post">

        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="role" value="<?php echo $userRole; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <input type="hidden" name="password2" value="<?php echo $password; ?>">
        <input type="hidden" name="follower">


        <div class="form-group">
            <?php include('include/country.php'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-sm" id="exampleInputEmail1" name="fullname"
                   aria-describedby="fullname" placeholder="Full name">

        </div>

        <div class="form-group">
            <div class="info"></div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Finish</button>
        </div>
        <br/>
        <p>Have an account? <a href="login.php"> Login now!</a></p>


    </form>


    <?php

} else {

    echo "<script type='text/javascript'>
window.location = 'login.php'	
</script> ";

}

?>