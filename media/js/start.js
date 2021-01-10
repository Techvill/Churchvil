$(document).ready(function (e) {
    $("#start").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "controller/start.php",
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


    $("#register").on('submit', (function (e) {
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


    $("#login").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "controller/login.php",
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


    $("#user").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "../controller/new_data.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $(".info").html('<img class="proc" src="../media/images/loader.gif" alt="Loading...." align="absmiddle" title="Loading...."/>');
            },
            success: function (data) {

                $(".info").fadeIn(5000).html(data);

            },
            error: function () {
            }
        });
    }));


});




   