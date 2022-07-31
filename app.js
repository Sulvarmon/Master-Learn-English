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
                }
            }
        })
    }

    function setImgsForRaitings() {
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
                        for (var j = 0; j < $(".top10_e_g_no_time_user").length; j++) {
                            if (data[i].user == $(`.top10_e_g_no_time_user:eq(${j})`).text()) {
                                $(`.top10_e_g_no_time_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }
                        for (var j = 0; j < $(".top10_g_e_no_time_user").length; j++) {
                            if (data[i].user == $(`.top10_g_e_no_time_user:eq(${j})`).text()) {
                                $(`.top10_g_e_no_time_img:eq(${j})`).attr("src", `./Img/profile_imgs/${data[i].img}`)
                            }
                        }

                    }
                }
            }
        })
    }

    /** */

    /**set raitings data and images */
    getRaitingsData();
    setImgsForRaitings();

    /** */

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

    /** */

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

    /** */


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

    /** */


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

    /** */

    /** click on dropdown item forces slide up*/
    $(".dp_item").click(function() {
        $(".settings").css("transform", "rotate(0deg)");
        $(".drop_down").slideUp(200);
        userSettingState = true;
    })

    /** */

    /**display home page first */
    $(".page").hide();
    $(".page:eq(0)").show();

    /** */

    /**click on username or drop down home displays home page */
    $(".home").click(function() {
        displayPage(0);
    })

    /** */

    /**define home grid clicks */
    for (var index = 0; index < $(".home_grid_item").length; index++) {
        gridClicks(index);
    }

    /**update raitings data and images by clicking the button */
    $(".update_tables_btn").click(function() {
        getRaitingsData();
        setImgsForRaitings();
    })


})