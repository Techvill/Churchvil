</div> <!-- End Row -->


<hr>

<footer>

    <ul>
        <li><a href="#">About</a></li>
        <li><a href="#">Press & Blog</a></li>
        <li><a href="#">Copyrights</a></li>
        <li><a href="#">Creators & Partners</a></li>
        <li><a href="#">Advertising</a></li>
        <li><a href="#">Developers</a></li>
    </ul>

    <ul>
        <li><a href="#">Terms</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Policy & Safety</a></li>
        <li><a href="#">Send Feedback</a></li>

    </ul>

    <h4>Copyright © 2019 ChurchVill Inc.</h4>

</footer> <!-- End Footer -->


<script src="media/js/jquery.min.js"></script>

<script src="media/js/bootstrap.min.js"></script>
<script src="media/js/start.js"></script>
<script src="media/js/scripts.js"></script>
<script>

    $("#paasw").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "controller/new_data.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $(".info").html('<img class="proc" src="media/images/loader.gif" alt="Loading...." align="absmiddle" title="Loading...."/>');
            },
            success: function (data) {

                $(".info").fadeIn(5000).html(data);

            },
            error: function () {
            }
        });
    }));
</script>


<script src="media/vid/mediaelement-and-player.js"></script>
<script src="media/vid/dailymotion.js"></script>
<script src="media/vid/facebook.js"></script>
<script src="media/vid/soundcloud.js"></script>
<script src="media/vid/twitch.js"></script>
<script src="media/vid/vimeo.js"></script>
<script src="media/vid/demo.js"></script>

</body>

</html>