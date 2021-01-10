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


<script src="../media/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

<script src="../media/js/bootstrap.min.js"></script>
<script src="../media/js/start.js"></script>

<script>
    $("#dropdownAcc").on("click", function (e) {
        e.preventDefault();

        if ($(this).hasClass("open")) {
            $(this).removeClass("open");
            $(this).children("ul").slideUp("fast");
        } else {
            $(this).addClass("open");
            $(this).children("ul").slideDown("fast");
        }
    });

</script>
<script src="../media/js/scripts.js"></script>
<script src="../media/vid/mediaelement-and-player.js"></script>
<script src="../media/vid/dailymotion.js"></script>
<script src="../media/vid/facebook.js"></script>
<script src="../media/vid/soundcloud.js"></script>
<script src="../media/vid/twitch.js"></script>
<script src="../media/vid/vimeo.js"></script>
<script src="../media/vid/demo.js"></script>
<script>

    $(".deleteCat").click(function () {

        var element = $(this);
//Find the id of the link that was clicked
        var category_id = element.attr("id");
//Built a url to send
        var info = 'category_id=' + category_id;
        if (confirm("Deleting this record will delete all messages associated with it, Continue?")) {
            $.ajax({
                type: "POST",
                url: "../controller/delete_category.php",
                data: info,
                beforeSend: function () {
                    $(".info1").html('<center><i class="fas fa-spinner fa-pulse"></i></center>');
                },
                success: function (data) {
                    $(".info1").fadeIn(2000).html(data);

                },
                error: function () {
                }
            });
            $(this).parents(".delete").animate({backgroundColor: "#fbc7c7"}, "slow")
                .animate({opacity: "hide"}, "slow");
        }
        return false;
    });

</script>


<script>

    $(".deleteUpload").click(function () {

        var element = $(this);
//Find the id of the link that was clicked
        var message_id = element.attr("id");
//Built a url to send
        var info = 'message_id=' + message_id;
        if (confirm("message will be removed, Continue?")) {
            $.ajax({
                type: "POST",
                url: "../controller/delete_message.php",
                data: info,
                beforeSend: function () {
                    $(".info1").html('<center><i class="fas fa-spinner fa-pulse"></i></center>');
                },
                success: function (data) {
                    $(".info1").fadeIn(2000).html(data);

                },
                error: function () {
                }
            });
            $(this).parents(".delete").animate({backgroundColor: "#fbc7c7"}, "slow")
                .animate({opacity: "hide"}, "slow");
        }
        return false;
    });

</script>
</body>

</html>