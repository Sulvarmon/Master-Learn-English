$(document).ready(function() {

    /**variables */
    var userSettingState = true;
    var user = $(".username").text().trim();

    /** */


    /**functions */
    function displayPage(i) {
        $(".page").hide();
        $(`.page:eq(${i})`).show();
    }

    function gridClicks(i) {
        $(`.home_grid_item:eq(${i})`).click(function() {
            displayPage(i + 1);
        })
    }

    function setUserImgs() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "user_imgs_array"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < data.length; i++) {
                        /**no times */
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_e_g_no_time_user:eq(${j})`).text()) {
                                $(`.top10_e_g_no_time_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_g_e_no_time_user:eq(${j})`).text()) {
                                $(`.top10_g_e_no_time_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }

                        /** */

                        /**eng to geo with time*/
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_e_g_with_time5min_user:eq(${j})`).text()) {
                                $(`.top10_e_g_with_time5min_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_e_g_with_time3min_user:eq(${j})`).text()) {
                                $(`.top10_e_g_with_time3min_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_e_g_with_time1min_user:eq(${j})`).text()) {
                                $(`.top10_e_g_with_time1min_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }

                        /** */

                        /**geo to eng with time*/
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_g_e_with_time5min_user:eq(${j})`).text()) {
                                $(`.top10_g_e_with_time5min_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_g_e_with_time3min_user:eq(${j})`).text()) {
                                $(`.top10_g_e_with_time3min_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }
                        for (var j = 0; j < 10; j++) {
                            if (data[i].user == $(`.top10_g_e_with_time1min_user:eq(${j})`).text()) {
                                $(`.top10_g_e_with_time1min_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }

                        /** */

                        /**results page */
                        if (user == data[i]["user"]) {
                            $(".results_user_img").attr("src", `./Img/profile_imgs/${data[i].img}`)
                        }

                        /** */

                        /**friends page */

                        for (var j = 0; j < $(".friend_name").length; j++) {
                            if (data[i].user == $(`.friend_name:eq(${j})`).text()) {
                                $(`.friend_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }



                        for (var j = 0; j < $(".req_sent_name").length; j++) {
                            if (data[i].user == $(`.req_sent_name:eq(${j})`).text()) {
                                $(`.req_sent_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }



                        for (var j = 0; j < $(".req_rec_name").length; j++) {
                            if (data[i].user == $(`.req_rec_name:eq(${j})`).text()) {
                                $(`.req_rec_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }


                        /** */
                    }
                }
            }
        })
    }

    function getRaitingsData() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "EGTop10NoTime"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_e_g_no_time_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_e_g_no_time_point:eq(${i})`).text(`${data[i].e_g_points}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_e_g_no_time").text(`${data[i].e_g_points}`)
                        }
                    }
                }
            }
        })
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "GETop10NoTime"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_g_e_no_time_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_g_e_no_time_point:eq(${i})`).text(`${data[i].g_e_points}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_g_e_no_time").text(`${data[i].g_e_points}`)
                        }
                    }
                }
            }
        })

        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "EGTop10WithTime5min"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_e_g_with_time5min_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_e_g_with_time5min_point:eq(${i})`).text(`${data[i].e_g_points_5min}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_e_g_with_time5min").text(`${data[i].e_g_points_5min}`)
                        }
                    }
                }
            }
        })

        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "EGTop10WithTime3min"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_e_g_with_time3min_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_e_g_with_time3min_point:eq(${i})`).text(`${data[i].e_g_points_3min}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_e_g_with_time3min").text(`${data[i].e_g_points_3min}`)
                        }
                    }
                }
            }
        })

        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "EGTop10WithTime1min"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_e_g_with_time1min_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_e_g_with_time1min_point:eq(${i})`).text(`${data[i].e_g_points_1min}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_e_g_with_time1min").text(`${data[i].e_g_points_1min}`)
                        }
                    }
                }
            }
        })

        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "GETop10WithTime5min"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_g_e_with_time5min_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_g_e_with_time5min_point:eq(${i})`).text(`${data[i].g_e_points_5min}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_g_e_with_time5min").text(`${data[i].g_e_points_5min}`)
                        }
                    }
                }
            }
        })

        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "GETop10WithTime3min"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_g_e_with_time3min_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_g_e_with_time3min_point:eq(${i})`).text(`${data[i].g_e_points_3min}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_g_e_with_time3min").text(`${data[i].g_e_points_3min}`)
                        }
                    }
                }
            }
        })

        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "GETop10WithTime1min"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < 10; i++) {
                        $(`.top10_g_e_with_time1min_user:eq(${i})`).text(`${data[i].username}`);
                        $(`.top10_g_e_with_time1min_point:eq(${i})`).text(`${data[i].g_e_points_1min}`);
                    }
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].username) {
                            $(".my_results_g_e_with_time1min").text(`${data[i].g_e_points_1min}`)
                        }
                    }
                }
            }
        })
    }

    function getQuizData() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "quizEG"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].user) {
                            $(".my_results_e_g_quiz").text(`${data[i].e_g_points}`)
                        }
                    }
                }
            }
        })
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "quizGE"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    for (var i = 0; i < data.length; i++) {
                        if (user == data[i].user) {
                            $(".my_results_g_e_quiz").text(`${data[i].g_e_points}`)
                        }
                    }
                }
            }
        })
    }

    function getFriendsArray() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "friends"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    filteredData = data.filter(function(value, index) {
                        return value.user_name == user;
                    })
                    for (var i = 0; i < filteredData.length; i++) {
                        $(".friends_cont_inner").append("<div class='firends_cont_item p-2 border border d-flex flex-column gap-2 align-items-center'></div>")
                    }
                    for (var i = 0; i < $(".firends_cont_item").length; i++) {
                        $(`.firends_cont_item:eq(${i})`).append("<div class='firends_cont_item_img_and_username d-flex gap-2 align-items-center'></div>");
                        $(`.firends_cont_item:eq(${i})`).append("<div class='btn btn-danger'>Unfriend</div>");
                    }
                    for (var i = 0; i < $(".firends_cont_item_img_and_username").length; i++) {
                        $(`.firends_cont_item_img_and_username:eq(${i})`).append("<div><img src='./Img/user_default_avatar.png' class='friend_img rounded-circle' width='60' height='60'></div>")
                        $(`.firends_cont_item_img_and_username:eq(${i})`).append(`<div class='friend_name'>${filteredData[i].friend_name}</div>`);
                    }
                    setUserImgs();
                }
            }
        })
    }

    function getReqsSentArray() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "reqs_sent"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    filteredData = data.filter(function(value, index) {
                        return value.friend_name == user;
                    })
                    for (var i = 0; i < filteredData.length; i++) {
                        $(".req_sent_inner").append("<div class='req_sent_item p-2 border border d-flex flex-column gap-2 align-items-center'></div>")
                    }
                    for (var i = 0; i < $(".req_sent_item").length; i++) {
                        $(`.req_sent_item:eq(${i})`).append("<div class='req_sent_item_img_and_username d-flex gap-2 align-items-center'></div>");
                        $(`.req_sent_item:eq(${i})`).append("<div class='btn btn-danger'>Unsend</div>");
                    }
                    for (var i = 0; i < $(".req_sent_item_img_and_username").length; i++) {
                        $(`.req_sent_item_img_and_username:eq(${i})`).append("<div><img src='./Img/user_default_avatar.png' class='req_sent_img rounded-circle' width='60' height='60'></div>")
                        $(`.req_sent_item_img_and_username:eq(${i})`).append(`<div class='req_sent_name'>${filteredData[i].user_name}</div>`);
                    }
                    setUserImgs();
                }
            }
        })
    }

    function getReqsRecArray() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "reqs_rec"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    filteredData = data.filter(function(value, index) {
                        return value.user_name == user;
                    })
                    for (var i = 0; i < filteredData.length; i++) {
                        $(".req_rec_inner").append("<div class='req_rec_item p-2 border border d-flex flex-column gap-2 align-items-center'></div>")
                    }
                    for (var i = 0; i < $(".req_rec_item").length; i++) {
                        $(`.req_rec_item:eq(${i})`).append("<div class='req_rec_item_img_and_username d-flex gap-2 align-items-center'></div>");
                        $(`.req_rec_item:eq(${i})`).append("<div class='req_rec_btns_cont d-flex gap-2'></div>");
                    }
                    for (var i = 0; i < $(".req_rec_btns_cont").length; i++) {
                        $(`.req_rec_btns_cont:eq(${i})`).append("<div class='btn btn-success'>Add As Friend</div>");
                        $(`.req_rec_btns_cont:eq(${i})`).append("<div class='btn btn-danger'>Reject</div>");
                    }
                    for (var i = 0; i < $(".req_rec_item_img_and_username").length; i++) {
                        $(`.req_rec_item_img_and_username:eq(${i})`).append("<div><img src='./Img/user_default_avatar.png' class='req_rec_img rounded-circle' width='60' height='60'></div>")
                        $(`.req_rec_item_img_and_username:eq(${i})`).append(`<div class='req_rec_name'>${filteredData[i].friend_name}</div>`);
                    }
                    setUserImgs();
                }
            }
        })
    }

    /** */

    /**set raitings and my results pages data and images */
    getRaitingsData();
    getQuizData();
    /** */

    /**friends page setup */
    getFriendsArray();
    getReqsSentArray();
    getReqsRecArray();
    /** */
    setUserImgs();
    $(".login_show_hide_password>input").click(function() {
        if ($(".login_password_input>input").attr("type") == "password") {
            $(".login_password_input>input").attr("type", "text");
        } else {
            $(".login_password_input>input").attr("type", "password");
        }
    })

    $(".reg_show_hide_password>input").click(function() {
        if ($(".reg_password_input>input").attr("type") == "password") {
            $(".reg_password_input>input").attr("type", "text");
        } else {
            $(".reg_password_input>input").attr("type", "password");
        }
    })

    $(".login_username_input>input, .login_password_input>input").keydown(function(e) {
        if (e.which == 13) {
            $(".login_btn").click();
        }
    })

    $(".reg_page").hide();

    $(".register_btn").click(function() {
        $(".login_page").hide();
        $(".reg_page").show();
    })

    $(".login_here_btn").click(function() {
        $(".login_page").show();
        $(".reg_page").hide();
    })

    /**register the user */
    $(".reg_btn").click(function() {
        var user = $(".reg_username_input>input").val();
        var password = $(".reg_password_input>input").val();
        $.ajax({
            url: "./register.php",
            type: "post",
            data: {
                registerBtn: true,
                username: user,
                password: password
            },
            success: function(data) {
                if (data == "111") {
                    alert("Registration Was Successful \n Go To Login Page To Log In");
                } else {
                    if (data != 0) {
                        alert(data);
                    }
                }
            }
        })
    })

    /**login */
    $(".login_btn").click(function() {
        var user = $(".login_username_input>input").val();
        var password = $(".login_password_input>input").val();
        $.ajax({
            url: "./login.php",
            type: "post",
            data: {
                loginInitials: true,
                username: user,
                password: password
            },
            success: function(data) {
                if (data == "111") {
                    window.location.href = "user.php";
                }
                if (data == "999") {
                    alert("Login Initials Are Wrong");
                }
            }
        })
    })


    /**logout */
    $(".logout_btn").click(function() {
        $.ajax({
            url: "logout.php",
            type: "post",
            data: {
                logout: true
            },
            success: function(data) {
                if (data = "111") {
                    window.location.href = "index.php";
                }
            }
        })
    })


    /**set user profile img */
    $.ajax({
        url: "arrays.php",
        type: "post",
        data: {
            arraysBtn: "user_imgs_array"
        },
        dataType: "json",
        success: function(data) {
            if (data != 0) {
                for (var index = 0; index < data.length; index++) {
                    if (user == data[index].user) {
                        $(".user_img").attr("src", `./Img/profile_imgs/${data[index].img}`)
                    }
                }
            }
        }
    })

    /** */

    /** click on settings icon*/
    $(".settings").click(function() {
        if (userSettingState) {
            $(".settings").css("transform", "rotate(360deg)");
            $(".drop_down").slideDown(200);
            userSettingState = false;
        } else {
            $(".settings").css("transform", "rotate(0deg)");
            $(".drop_down").slideUp(200);
            userSettingState = true;
        }
    })

    /** click on dropdown item forces slide up*/
    $(".dp_item").click(function() {
        $(".settings").css("transform", "rotate(0deg)");
        $(".drop_down").slideUp(200);
        userSettingState = true;
    })

    /**display home page first */
    $(".page").hide();
    $(".page:eq(0)").show();

    /** */

    /**click on username or drop down home displays home page */
    $(".home").click(function() {
        displayPage(0);
    })

    /**define home grid clicks */
    for (var index = 0; index < $(".home_grid_item").length; index++) {
        gridClicks(index);
    }

    /**update raitings data and images by clicking the button */
    $(".update_tables_btn").click(function() {
        getRaitingsData();
        setUserImgs();
    })

    /**update my results data */
    $(".update_my_results_btn").click(function() {
        getRaitingsData();
        setUserImgs();
    })

    /**update button animation */
    $(".update_btn").mousedown(function() {
        $(".update_btn").css("transform", "scale(0.8)");
    })

    $(".update_btn").mouseup(function(e) {
        e.stopPropagation(); // not quit neccessery but anyway
        $(".update_btn").css("transform", "scale(1)");
    })

    /** */

    /**mouse up on document anywhere will reset update btn's transform prop */
    $(document).on("mouseup", function() {
        $(".update_btn").css("transform", "scale(1)");
    })



})