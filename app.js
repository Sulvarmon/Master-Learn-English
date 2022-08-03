$(document).ready(function() {

    /**variables */
    var userSettingState = true;
    var user = $(".username").text().trim();
    var dictionary = [];
    var checkBtnEGNoTimeState = true;

    /** */

    $.ajax({
        url: "arrays.php",
        type: "post",
        data: {
            arraysBtn: "dictionary"
        },
        dataType: "json",
        async: false,
        success: function(data) {
            dictionary = data;
        }
    })

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

    function updateTables() {
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
                filteredData = data.filter(function(value, index) {
                    return value.user_name == user;
                })
                if (filteredData.length != 0) {
                    for (var i = 0; i < filteredData.length; i++) {
                        $(".friends_cont_inner").append("<div class='firends_cont_item p-2 border d-flex flex-column gap-2 align-items-center'></div>")
                    }
                    for (var i = 0; i < $(".firends_cont_item").length; i++) {
                        $(`.firends_cont_item:eq(${i})`).append("<div class='firends_cont_item_img_and_username d-flex gap-2 align-items-center'></div>");
                        $(`.firends_cont_item:eq(${i})`).append("<div class='unfriend_btn btn btn-danger'>Unfriend</div>");
                    }
                    for (var i = 0; i < $(".firends_cont_item_img_and_username").length; i++) {
                        $(`.firends_cont_item_img_and_username:eq(${i})`).append("<div><img src='./Img/user_default_avatar.png' class='friend_img rounded-circle' width='60' height='60'></div>")
                        $(`.firends_cont_item_img_and_username:eq(${i})`).append(`<div class='friend_name'>${filteredData[i].friend_name}</div>`);
                    }
                    setUserImgs();
                } else {
                    $(".friends_cont_inner").append("<div class='nothing_message mx-auto'>Nothing Here</div>")
                }
            }
        })
    }

    function getReqsSentArray() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "requests"
            },
            dataType: "json",
            success: function(data) {
                filteredData = data.filter(function(value, index) {
                    return value.friend_name == user;
                })
                if (filteredData.length != 0) {
                    for (var i = 0; i < filteredData.length; i++) {
                        $(".req_sent_inner").append("<div class='req_sent_item p-2 border d-flex flex-column gap-2 align-items-center'></div>")
                    }
                    for (var i = 0; i < $(".req_sent_item").length; i++) {
                        $(`.req_sent_item:eq(${i})`).append("<div class='req_sent_item_img_and_username d-flex gap-2 align-items-center'></div>");
                        $(`.req_sent_item:eq(${i})`).append("<div class='unsend_btn btn btn-danger'>Unsend</div>");
                    }
                    for (var i = 0; i < $(".req_sent_item_img_and_username").length; i++) {
                        $(`.req_sent_item_img_and_username:eq(${i})`).append("<div><img src='./Img/user_default_avatar.png' class='req_sent_img rounded-circle' width='60' height='60'></div>")
                        $(`.req_sent_item_img_and_username:eq(${i})`).append(`<div class='req_sent_name'>${filteredData[i].user_name}</div>`);
                    }
                    setUserImgs();
                } else {
                    $(".req_sent_inner").append("<div class='nothing_message mx-auto'>Nothing Here</div>")
                }
            }
        })
    }

    function getReqsRecArray() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "requests"
            },
            dataType: "json",
            success: function(data) {
                filteredData = data.filter(function(value, index) {
                    return value.user_name == user;
                })
                if (filteredData.length != 0) {
                    for (var i = 0; i < filteredData.length; i++) {
                        $(".req_rec_inner").append("<div class='req_rec_item p-2 border d-flex flex-column gap-2 align-items-center'></div>")
                    }
                    for (var i = 0; i < $(".req_rec_item").length; i++) {
                        $(`.req_rec_item:eq(${i})`).append("<div class='req_rec_item_img_and_username d-flex gap-2 align-items-center'></div>");
                        $(`.req_rec_item:eq(${i})`).append("<div class='req_rec_btns_cont d-flex gap-2'></div>");
                    }
                    for (var i = 0; i < $(".req_rec_btns_cont").length; i++) {
                        $(`.req_rec_btns_cont:eq(${i})`).append("<div class='add_friend_btn btn btn-success'>Add As Friend</div>");
                        $(`.req_rec_btns_cont:eq(${i})`).append("<div class='rej_friend_btn btn btn-danger'>Reject</div>");
                    }
                    for (var i = 0; i < $(".req_rec_item_img_and_username").length; i++) {
                        $(`.req_rec_item_img_and_username:eq(${i})`).append("<div><img src='./Img/user_default_avatar.png' class='req_rec_img rounded-circle' width='60' height='60'></div>")
                        $(`.req_rec_item_img_and_username:eq(${i})`).append(`<div class='req_rec_name'>${filteredData[i].friend_name}</div>`);
                    }
                    setUserImgs();
                } else {
                    $(".req_rec_inner ").append("<div class='nothing_message mx-auto'>Nothing Here</div>")
                }
            }
        })
    }

    function showHidePassword(clickedEl, input) {
        $(`.${clickedEl}`).click(function() {
            if ($(`.${input}`).attr("type") == "password") {
                $(`.${input}`).attr("type", "text");
            } else {
                $(`.${input}`).attr("type", "password");
            }
        })
    }

    function displayPlayPage(index) {
        $(".play_page").hide();
        $(`.play_page:eq(${index})`).show();
    }

    function getPlayPagesPoints(index) {
        switch (index) {
            case 1:
                $.ajax({
                    url: "arrays.php",
                    type: "post",
                    data: {
                        arraysBtn: "users_array"
                    },
                    dataType: "json",
                    success: function(data) {
                        for (var i = 0; i < data.length; i++) {
                            if (user == data[i].username) {
                                $(".points_e_g_no_time").text(`${data[i].e_g_points}`);
                            }

                        }

                    }
                })
                break;

            default:
                break;
        }
    }

    function setPlayPages(index) {
        switch (index) {
            case 1:
                var randomNumfromDic = Math.floor(Math.random() * dictionary.length);
                var randomWord = dictionary[randomNumfromDic].eng_word;
                var answer = dictionary[randomNumfromDic].geo_word
                $(".random_word_e_g_no_time").text(`${randomWord}`);
                var filteredDicArray = dictionary.filter(function(value, index) {
                    return value.eng_word != $(".random_word_e_g_no_time").text();
                })
                var randomIndexs = [];
                while (randomIndexs.length < 5) {
                    var r = Math.floor(Math.random() * filteredDicArray.length);
                    if (randomIndexs.indexOf(r) == -1) {
                        randomIndexs.push(r);
                    }
                }
                for (var i = 0; i < 5; i++) {
                    $(`.prob_answer_e_g_no_time:eq(${i})`).text(`${filteredDicArray[randomIndexs[i]].geo_word}`);
                }
                var randomNumFrom5 = Math.floor(Math.random() * 5);
                $(`.prob_answer_e_g_no_time:eq(${randomNumFrom5})`).text(`${answer}`);


                checkBtnEGNoTimeState = true;
                $(".asnwer_input_e_g_no_time").val("");
                $(".check_btn_e_g_no_time").removeClass("disabled");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").removeClass("text-success");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").removeClass("text-danger");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").addClass("text-warning");
                $(".check_visual_e_g_no_time").text("question_mark");
                break;

            default:
                break;
        }

    }

    function playPageBtnClicks(index) {
        $(`.play_type_btn:eq(${index})`).click(function() {
            switch (index) {
                case 0:
                    displayPlayPage(1);
                    setPlayPages(1);
                    getPlayPagesPoints(1);
                    break;
                case 1:
                    displayPlayPage(2);
                    var randomNumfromDic = Math.floor(Math.random() * dictionary.length);
                    var randomWord = dictionary[randomNumfromDic].geo_word;
                    var answer = dictionary[randomNumfromDic].eng_word;
                    $(".random_word_g_e_no_time").text(`${randomWord}`);
                    var filteredDicArray = dictionary.filter(function(value, index) {
                        return value.geo_word != $(".random_word_g_e_no_time").text();
                    })
                    var randomIndexs = [];
                    while (randomIndexs.length < 5) {
                        var r = Math.floor(Math.random() * filteredDicArray.length);
                        if (randomIndexs.indexOf(r) == -1) {
                            randomIndexs.push(r);
                        }
                    }
                    for (var i = 0; i < 5; i++) {
                        $(`.prob_answer_g_e_no_time:eq(${i})`).text(`${filteredDicArray[randomIndexs[i]].eng_word}`);
                    }
                    var randomNumFrom5 = Math.floor(Math.random() * 5);
                    $(`.prob_answer_g_e_no_time:eq(${randomNumFrom5})`).text(`${answer}`);
                    break;
                case 2:
                    displayPlayPage(3);
                    break;
                case 3:
                    displayPlayPage(4);
                    break;
                case 4:
                    displayPlayPage(5);
                    break;
                case 5:
                    displayPlayPage(6);
                    break;
                default:
                    break;
            }
        })



    }

    /** */

    /**set raitings and my results pages data and images */
    updateTables();
    getQuizData();
    /** */

    /**friends page setup */
    getFriendsArray();
    getReqsSentArray();
    getReqsRecArray();
    /** */

    /**set user imgs */
    setUserImgs();

    showHidePassword("login_show_hide_password>input", "login_password_input>input");
    showHidePassword("reg_show_hide_password>input", "reg_password_input>input");
    showHidePassword("change_pass_show_hide>input", "change_password_input>input");

    $(".login_username_input>input, .login_password_input>input").keydown(function(e) {
        if (e.which == 13) {
            $(".login_btn").click();
        }
    })

    $(".reg_username_input>input, .reg_password_input>input").keydown(function(e) {
        if (e.which == 13) {
            $(".reg_btn").click();
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
                    alert("Registration Was Successful");
                    $(".reg_username_input>input").val("");
                    $(".reg_password_input>input").val("");
                    $(".login_here_btn").click();
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
                window.location.href = "index.php";
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
        $(".play_btn_wrapper").show();
    })

    /**display home page first */
    $(".page").hide();
    $(".page:eq(0)").show();

    /** */

    /**click on username or drop down home displays home page */
    $(".home").click(function() {
        displayPage(0);
        $(".play_btn_wrapper").show();
    })

    /**define home grid clicks */
    for (var index = 0; index < $(".home_grid_item").length; index++) {
        gridClicks(index);
    }

    $(".profile_page_link").click(function() {
        displayPage(7);
    })

    $(".play_btn").click(function() {
        displayPage(8);
        $(".play_btn_wrapper").hide();
    })

    /**update all data and images by clicking the button */
    $(".update_tables_btn").click(function() {
        updateTables();
        getQuizData();
        setUserImgs();
    })

    $(".update_my_friends_btn").click(function() {
        $(".friends_cont_inner").empty();
        $(".req_sent_inner").empty();
        $(".req_rec_inner").empty();
        getFriendsArray();
        getReqsSentArray();
        getReqsRecArray();
    })

    /**unfriend */
    $(document).on("click", ".unfriend_btn", function() {
        var index = $(".unfriend_btn").index(this);
        var friend = $(`.friend_name:eq(${index})`).text().trim();
        if (confirm(`Are You Sure You Want To Remove Friend ${friend} ?`)) {
            $(`.firends_cont_item:eq(${index})`).remove();
            $.ajax({
                url: "friends_page.php",
                type: "post",
                data: {
                    friendsPageBtn: "unfriend",
                    user: user,
                    friend: friend,
                },
                success: function() {
                    $(".update_my_friends_btn").click();
                }
            })

        }
    })

    /**unsend friend request */
    $(document).on("click", ".unsend_btn", function() {
        var index = $(".unsend_btn").index(this);
        var friend = $(`.req_sent_name:eq(${index})`).text().trim();
        if (confirm(`Do You Want To Unsend Request ?`)) {
            $(`.req_sent_item:eq(${index})`).remove();
            $.ajax({
                url: "friends_page.php",
                type: "post",
                data: {
                    friendsPageBtn: "unsend",
                    user: user,
                    friend: friend,
                },
                success: function() {
                    $(".update_my_friends_btn").click();
                }
            })
        }
    })

    /**add friend */
    $(document).on("click", ".add_friend_btn", function() {
        var index = $(".add_friend_btn").index(this);
        var friend = $(`.req_rec_name:eq(${index})`).text().trim();
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "requests",
            },
            dataType: 'json',
            success: function(data) {
                var reqHasBeenUnsent = true;
                for (var i = 0; i < data.length; i++) {
                    if (friend == data[i].friend_name && user == data[i].user_name) {
                        reqHasBeenUnsent = false;
                        if (confirm(`Do You Want To Add ${friend} As Friend ?`)) {
                            $(`.req_rec_item:eq(${index})`).remove();
                            $.ajax({
                                url: "friends_page.php",
                                type: "post",
                                data: {
                                    friendsPageBtn: "addFriend",
                                    user: user,
                                    friend: friend,
                                },
                                success: function() {
                                    $(".update_my_friends_btn").click();
                                }
                            })
                        }
                        break;
                    }
                }
                if (reqHasBeenUnsent) {
                    $(`.req_rec_item:eq(${index})`).remove();
                    alert("This User Unsent Request");
                }
            }
        })
    })

    /**reject friend request*/
    $(document).on("click", ".rej_friend_btn", function() {
        var index = $(".rej_friend_btn").index(this);
        var friend = $(`.req_rec_name:eq(${index})`).text().trim();
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "requests",
            },
            dataType: 'json',
            success: function(data) {
                var reqHasBeenUnsent = true;
                for (var i = 0; i < data.length; i++) {
                    if (friend == data[i].friend_name && user == data[i].user_name) {
                        reqHasBeenUnsent = false;
                        if (confirm(`Do You Want Reject Request From ${friend} ?`)) {
                            $(`.req_rec_item:eq(${index})`).remove();
                            $.ajax({
                                url: "friends_page.php",
                                type: "post",
                                data: {
                                    friendsPageBtn: "rejFriend",
                                    user: user,
                                    friend: friend,
                                },
                                success: function() {
                                    $(".update_my_friends_btn").click();
                                }
                            })
                        }
                        break;
                    }
                }
                if (reqHasBeenUnsent) {
                    $(`.req_rec_item:eq(${index})`).remove();
                    alert("This User Unsent Request");
                }
            }
        })
    })

    $(".search_friend_iput>input").keydown(function(e) {
        if (e.which === 13) { //click on enter
            $(".search_user_btn").click();
        }
    })

    $(".search_user_btn").click(function() {
        $.ajax({
            url: "arrays.php",
            type: "post",
            data: {
                arraysBtn: "users_array"
            },
            dataType: "json",
            success: function(data) {
                if (data != 0) {
                    var searchedUser = $(".search_friend_iput>input").val().trim();
                    var noSearchResult = true;
                    for (var i = 0; i < data.length; i++) {
                        if (searchedUser == data[i].username && searchedUser != "") {
                            noSearchResult = false;
                            $(".search_result").empty();
                            $(".search_result").append("<div class='search_result_item p-2 d-flex flex-column gap-2 align-items-center'></div>")
                            $(`.search_result_item`).append("<div class='search_result_item_img_and_username d-flex gap-2 align-items-center'></div>");
                            $(`.search_result_item`).append("<div class='search_result_btns_cont d-flex gap-2'></div>");
                            $(`.search_result_btns_cont`).append("<div class='send_friend_req_btn btn btn-success'>Send Friend Request</div>");
                            $(`.search_result_btns_cont`).append("<div class='clean_search_user_btn btn btn-danger'>Clean</div>");
                            $(`.search_result_item_img_and_username`).append("<div><img src='./Img/user_default_avatar.png' class='search_user_img rounded-circle' width='60' height='60'></div>")
                            $(`.search_result_item_img_and_username`).append(`<div class='search_user_name'>${data[i].username}</div>`);
                            break;
                        }
                    }
                    $(".send_friend_req_btn").click(function() {
                        var friend = $(".search_user_name").text().trim();

                        $.ajax({
                            url: "arrays.php",
                            type: "post",
                            data: {
                                arraysBtn: "friends"
                            },
                            dataType: "json",
                            success: function(data) {
                                var isInFriends = false;
                                for (var i = 0; i < data.length; i++) {
                                    if (user == data[i].user_name && friend == data[i].friend_name) {
                                        isInFriends = true;
                                        alert("The User Is Already Your Friend");
                                        break;
                                    }
                                }
                                if (!isInFriends) {
                                    var isInReqSents = false;
                                    $.ajax({
                                        url: "arrays.php",
                                        type: "post",
                                        data: {
                                            arraysBtn: "requests"
                                        },
                                        dataType: "json",
                                        success: function(data) {
                                            for (var i = 0; i < data.length; i++) {
                                                if (user == data[i].friend_name && friend == data[i].user_name) {
                                                    isInReqSents = true;
                                                    alert("You Already Have Sent Request To This User");
                                                    break;
                                                }
                                            }
                                            if (!isInReqSents) {
                                                if (user == friend) {
                                                    alert("You And Yourself Are Already Friends. \n Unless You Are Suicidal")
                                                } else {
                                                    $.ajax({
                                                        url: "friends_page.php",
                                                        type: "post",
                                                        data: {
                                                            friendsPageBtn: "send_req",
                                                            user: user,
                                                            friend: friend
                                                        },
                                                        success: function() {
                                                            $(".update_my_friends_btn").click();
                                                        }
                                                    })
                                                }
                                            }
                                        }
                                    })
                                }
                            }
                        })
                    })
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
                                    if (searchedUser == data[i].user) {
                                        $(".search_user_img").attr("src", `./Img/profile_imgs/${data[i].img}`);
                                        break;
                                    }

                                }
                            }
                        }
                    })
                    if (noSearchResult && searchedUser != "") {
                        $(".search_result").empty();
                        $(".search_result").append("<div class='search_result_item p-2 d-flex flex-column gap-2 align-items-center'></div>")
                        $(`.search_result_item`).append("<div>There Is Not Such User</div>");
                        $(`.search_result_item`).append("<div class='clean_search_user_btn btn btn-danger'>Clean</div>");
                    }
                    $(".clean_search_user_btn").click(function() {
                        $(".search_result").empty();
                        $(".search_friend_iput>input").val("");
                    })
                }
            }
        })
    })


    /**delete account */
    $(".delete_account_btn").click(function() {
        if (confirm("Are You Sure You Want To Permanently Delete Your Account ?")) {
            $.ajax({
                url: "delete_user.php",
                type: "post",
                data: {
                    deleteUserBtn: true
                },
                success: function() {
                    window.location.href = "./index.php";
                }
            })
        }
    })

    /**change username */
    $(".change_username_btn").click(function() {
        if (confirm("You Sure You Want To Change Username ?")) {
            var newUsername = $(".change_username_input>input").val().trim();
            $.ajax({
                url: "change.php",
                type: "post",
                data: {
                    changeBtn: "change_username",
                    newUsername: newUsername
                },
                success: function() {
                    alert("Username Has Changed \n Log In Again");
                    window.location.href = "./index.php";
                }
            })
        }
    })

    /**change password */
    $(".change_password_btn").click(function() {
        if (confirm("You Sure You Want To Change Password ?")) {
            var newPassword = $(".change_password_input>input").val().trim();
            $.ajax({
                url: "change.php",
                type: "post",
                data: {
                    changeBtn: "change_password",
                    newPassword: newPassword
                },
                success: function() {
                    alert("Password Has Changed \n Log In Again");
                    window.location.href = "./index.php";
                }
            })
        }
    })

    displayPlayPage(0);

    for (var i = 0; i < $(".play_type_btn").length; i++) {
        playPageBtnClicks(i);
    }

    $(".change_play_type_btn").click(function() {
        displayPlayPage(0);
    })

    function probAnswerClicks(clickedEl, input) {
        $(`.${clickedEl}`).click(function() {
            $(`.${input}`).val(`${$(this).text()}`)
        })
    }

    probAnswerClicks("prob_answer_e_g_no_time", "asnwer_input_e_g_no_time");
    probAnswerClicks("prob_answer_g_e_no_time", "asnwer_input_g_e_no_time");

    $(".next_btn_e_g_no_time").click(function() {
        setPlayPages(1);
    })

    $(".check_btn_e_g_no_time").click(function() {
        if (checkBtnEGNoTimeState) {
            var randomWord = $(".random_word_e_g_no_time").text();
            var userAnswered = $(".asnwer_input_e_g_no_time").val();
            var points = $(".points_e_g_no_time").text();
            var answer;
            /**i have this var because if answer is wrong i want to do something only once by being out of the each loop.
             * i think this will enhance performance
             */
            var passedTest = false;
            $.each(dictionary, function(i, e) {
                if (randomWord == e.eng_word) {
                    answer = e.geo_word;
                }
                if ($(".asnwer_input_e_g_no_time").val() == answer) {
                    passedTest = true;
                    return false;
                }
            })

            if (passedTest && userAnswered != "") { //if answer is correct  
                checkBtnEGNoTimeState = false;
                points++;
                $(".points_e_g_no_time").text(`${points}`);
                $(".check_btn_e_g_no_time").addClass("disabled");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").removeClass("text-warning");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").removeClass("text-danger");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").addClass("text-success");
                $(".check_visual_e_g_no_time").text("check");
                $.ajax({
                    url: "points.php",
                    type: "post",
                    data: {
                        pointsBtn: "e_g_no_time",
                        point: points,
                        user: user
                    }
                })
            }
            if (!passedTest && userAnswered != "") { //if answer is wrong 
                points--;
                if (points != -1) {
                    $(".points_e_g_no_time").text(`${points}`);
                    $.ajax({
                        url: "points.php",
                        type: "post",
                        data: {
                            pointsBtn: "e_g_no_time",
                            point: points
                        }
                    })
                }
                $(".check_visual_e_g_no_time, .points_e_g_no_time").removeClass("text-warning");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").removeClass("text-success");
                $(".check_visual_e_g_no_time, .points_e_g_no_time").addClass("text-danger");
                $(".check_visual_e_g_no_time").text("close");
            }
        }
    })



    $(".play_btn").click();

})