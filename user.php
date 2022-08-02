<?php
    session_start();
    define("conn", true);
    include("./conn.php");

    if (!isset($_SESSION['user'])) {
        header("Location: ./index.php");
        exit();
    }

    $user = $_SESSION["user"];
?>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <!-- fixing favicon icon not found err -->
        <link rel="shortcut icon" href="#">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <!-- google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">


        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- google icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!-- connect to css and js -->
        <link rel="stylesheet" href="./styles.css" />
        <script src="app.js" defer></script>

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    </head>

    <body>

        <div class="user_bg_s"></div>
        <div class="user_cont_s">
            <!-- header -->
            <div class="container-md bg-light p-2 position-relative d-flex justify-content-between align-items-center">
                <div class="d-flex gap-2">
                    <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                        <div>Hello</div>
                        <div class="home username link_s"> <b><?php echo $user ?></b> </div>
                    </div>
                    <img src="./Img/user_default_avatar.png" width="90" height="90" class="user_img rounded-circle">
                </div>
                <div class="settings settings_s cursor_pointer_s user-select-none"><i class="material-icons">settings</i></div>
                <div class="navbar_dropdown navbar_dropdown_s position-absolute end-0 bg-light p-5 drop_down">
                    <div class="d-flex flex-column gap-5 align-item-center justify-content-center mx-auto w_fit_s ">
                        <div class="home dp_item link_s mx-auto">Home</div>
                        <div class="profile_page_link dp_item link_s mx-auto">Profile</div>
                        <div class="dp_item logout_btn btn btn-primary mx-auto">Log Out</div>
                    </div>
                </div>
            </div>

            <!-- home page -->
            <div class="page main_cont container-md mt-5">
                <div class="home_grid_cont_s">
                    <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                        <div class="dark_bg_s"></div>
                        <div class="w_fit_s mx-auto mb-2 text-white h5">Raitings</div>
                        <div class="grid_img_s"></div>
                    </div>
                    <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                        <div class="dark_bg_s"></div>
                        <div class="w_fit_s mx-auto mb-2 text-white h5">My Results</div>
                        <div class="grid_img_s"></div>
                    </div>
                    <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                        <div class="dark_bg_s"></div>
                        <div class="w_fit_s mx-auto mb-2 text-white h5">Friends</div>
                        <div class="grid_img_s"></div>
                    </div>
                    <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                        <div class="dark_bg_s"></div>
                        <div class="w_fit_s mx-auto mb-2 text-white h5">Events</div>
                        <div class="grid_img_s"></div>
                    </div>
                    <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                        <div class="dark_bg_s"></div>
                        <div class="w_fit_s mx-auto mb-2 text-white h5">Contact us</div>
                        <div class="grid_img_s"></div>
                    </div>
                    <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                        <div class="dark_bg_s"></div>
                        <div class="w_fit_s mx-auto mb-2 text-white h5">Donate</div>
                        <div class="grid_img_s"></div>
                    </div>
                </div>
            </div>

            <!-- raitings page -->
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="h1 w_fit_s mx-auto m-5 text-warning">Raitings Page</div>
                <div class="update_tables_btn w_fit_s update_btn d-block btn btn-primary mx-auto">Update Raitings Page</div>
                <div class="d-flex flex-wrap justify-content-around mt-5">
                    <!-- top 10 eng to geo raitings no time -->
                    <div>
                        <div class="d-flex gap-1 justify-content-center align-items-center">
                            <div class="h3 text-center">Top 10 Eng-Geo No Time</div>
                            <div class="d-flex align-items-center" style="transform: translateY(-4px);"><i class="material-icons">timer_off</i></div>
                        </div>

                        <div class="container d-flex flex-wrap">
                            <table class="table table-hover table-dark mt-2 text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            for ($i=0; $i <10 ; $i++) { 
                                                echo "<tr>";
                                                    echo "<th scope='row'>" . ($i+1) . "</th>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_e_g_no_time_img rounded-circle'>" . "<span class='top10_e_g_no_time_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_e_g_no_time_point'>" . "999" . "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- top 10 geo to eng raitings no time -->
                    <div>
                        <div class="d-flex gap-1 justify-content-center align-items-center">
                            <div class="h3 text-center">Top 10 Geo-Eng No Time</div>
                            <div class="d-flex align-items-center" style="transform: translateY(-4px);"><i class="material-icons">timer_off</i></div>
                        </div>

                        <div class="container d-flex flex-wrap">
                            <table class="table table-hover table-dark mt-2 text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            for ($i=0; $i <10 ; $i++) { 
                                                echo "<tr>";
                                                    echo "<th scope='row'>" . ($i+1) . "</th>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_g_e_no_time_img rounded-circle'>" . "<span class='top10_g_e_no_time_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_g_e_no_time_point'>" . "999" . "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- top 10 eng to geo raitings with time -->
                    <div class="container mt-5">
                        <div class="d-flex gap-1 justify-content-center align-items-center">
                            <div class="h3 text-center">Top 10 Eng-Geo With Time</div>
                            <div class="d-flex align-items-center" style="transform: translateY(-4px);"><i class="material-icons">timer</i></div>
                        </div>

                        <div class="container d-flex flex-wrap overflow-auto">
                            <table class="table table-hover table-dark mt-2 text-center align-middle ">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">#</th>
                                        <th colspan="2">5 min</th>
                                        <th colspan="2">3 min</th>
                                        <th colspan="2">1 min</th>
                                    </tr>
                                    <tr>
                                        <th>user</th>
                                        <th>point</th>
                                        <th>user</th>
                                        <th>point</th>
                                        <th>user</th>
                                        <th>point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            for ($i=0; $i <10 ; $i++) { 
                                                echo "<tr>";
                                                    echo "<th>" . ($i+1) . "</th>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_e_g_with_time5min_img rounded-circle'>" . "<span class='top10_e_g_with_time5min_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_e_g_with_time5min_point'>" . "999" . "</td>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_e_g_with_time3min_img rounded-circle'>" . "<span class='top10_e_g_with_time3min_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_e_g_with_time3min_point'>" . "999" . "</td>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_e_g_with_time1min_img rounded-circle'>" . "<span class='top10_e_g_with_time1min_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_e_g_with_time1min_point'>" . "999" . "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- top 10 geo to eng raitings with time -->
                    <div class="container mt-5">
                        <div class="d-flex gap-1 justify-content-center align-items-center">
                            <div class="h3 text-center">Top 10 Geo-Eng With Time</div>
                            <div class="d-flex align-items-center" style="transform: translateY(-4px);"><i class="material-icons">timer</i></div>
                        </div>

                        <div class="container d-flex flex-wrap overflow-auto">
                            <table class="table table-hover table-dark mt-2 text-center align-middle">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="align-middle">#</th>
                                        <th colspan="2">5 min</th>
                                        <th colspan="2">3 min</th>
                                        <th colspan="2">1 min</th>
                                    </tr>
                                    <tr>
                                        <th>user</th>
                                        <th>point</th>
                                        <th>user</th>
                                        <th>point</th>
                                        <th>user</th>
                                        <th>point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            for ($i=0; $i <10 ; $i++) { 
                                                echo "<tr>";
                                                    echo "<th>" . ($i+1) . "</th>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_g_e_with_time5min_img rounded-circle'>" . "<span class='top10_g_e_with_time5min_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_g_e_with_time5min_point'>" . "999" . "</td>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_g_e_with_time3min_img rounded-circle'>" . "<span class='top10_g_e_with_time3min_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_g_e_with_time3min_point'>" . "999" . "</td>";
                                                    echo "<td class='d-flex gap-2 align-items-center'>" . "<img src='./Img/user_default_avatar.png' width='50' height='50' class='top10_g_e_with_time1min_img rounded-circle'>" . "<span class='top10_g_e_with_time1min_user ms-2'>" . "username" . "</span>" . "</td>";
                                                    echo "<td class='top10_g_e_with_time1min_point'>" . "999" . "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- my results page -->
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="w_fit_s mx-auto h1 text-warning m-5">My Results Page</div>
                <div class="update_btn update_my_results_btn d-block btn btn-primary w_fit_s mx-auto">Update My Results Page</div>
                <div class="container mt-5 d-flex gap-5 flex-wrap justify-content-center">
                    <div><img class="results_user_img" src="./Img/user_default_avatar.png" width="250" height="250"></div>
                    <table class="w-25 table table-hover table-dark text-center align-middle " style="height: fit-content;">
                        <thead>
                            <tr>
                                <th colspan="2"> <span>Your Results Without Time</span> <i class="material-icons align-middle">timer_off</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Eng to Geo points</th>
                                <th>Geo to Eng points</th>
                            </tr>
                            <tr>
                                <td class="my_results_e_g_no_time">999</td>
                                <td class="my_results_g_e_no_time">999</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="w-25 table table-hover table-dark text-center align-middle " style="height: fit-content;">
                        <thead>
                            <tr>
                                <th colspan="2"> <span>Your Quiz Results</span> <i class="material-icons align-middle">quiz</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Eng to Geo points</th>
                                <th>Geo to Eng points</th>
                            </tr>
                            <tr>
                                <td class="my_results_e_g_quiz">999</td>
                                <td class="my_results_g_e_quiz">999</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="w-25 table table-hover table-dark text-center align-middle" style="height: fit-content;">
                        <thead>
                            <tr>
                                <th colspan="6"> <span>Your Results With Time</span> <i class="material-icons align-middle">timer</i></th>
                            </tr>
                            <tr>
                                <th colspan="3">Eng to Geo points</th>
                                <th colspan="3">Geo to Eng points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5min</th>
                                <th>3min</th>
                                <th>1min</th>
                                <th>5min</th>
                                <th>3min</th>
                                <th>1min</th>
                            </tr>
                            <tr>
                                <th class="my_results_e_g_with_time5min">999</th>
                                <th class="my_results_e_g_with_time3min">999</th>
                                <th class="my_results_e_g_with_time1min">999</th>
                                <th class="my_results_g_e_with_time5min">999</th>
                                <th class="my_results_g_e_with_time3min">999</th>
                                <th class="my_results_g_e_with_time1min">999</th>
                            </tr>

                        </tbody>
                    </table>



                </div>

            </div>
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="w_fit_s mx-auto h1 text-warning m-5">Friends page</div>
                <div class="update_btn update_my_friends_btn d-block btn btn-primary w_fit_s mx-auto">Update Friends Page</div>
                <!-- contents are appended in js file -->
                <div class="friends_cont container mt-5 p-2 border">
                    <div class="text-warning h5 mx-auto w_fit_s mb-5">Friends</div>
                    <div class="friends_cont_inner container d-flex justify-content-center justify-content-md-start flex-wrap gap-2"></div>
                </div>
                <div class="container mt-5 p-2 border">
                    <div class="text-warning h5 mx-auto w_fit_s mb-5">Search Friend</div>
                    <div class="d-flex flex-column gap-2 align-items-center">
                        <div class="d-flex flex-column gap-2 align-items-center">
                            <div class="search_friend_iput"><input type="text" class="p-2" placeholder="type username here"></div>
                            <div class="search_user_btn btn btn-primary mt-3">Search User</div>
                        </div>
                        <div class="search_result p-2 d-flex flex-wrap"></div>
                    </div>
                </div>
                <div class="req_sent_cont container mt-5 p-2 border">
                    <div class="text-warning h5 mx-auto w_fit_s mb-5">Requests You Have Sent</div>
                    <div class="req_sent_inner container d-flex justify-content-center justify-content-md-start flex-wrap gap-2"></div>
                </div>
                <div class="req_rec_cont container mt-5 p-2 border">
                    <div class="text-warning h5 mx-auto w_fit_s mb-5">Requests You Have Received</div>
                    <div class="req_rec_inner container d-flex justify-content-center justify-content-md-start flex-wrap gap-2"></div>
                </div>
            </div>
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="w_fit_s mx-auto h1 text-warning m-5">Events Page</div>
                <div class="update_btn update_events_btn d-block btn btn-primary w_fit_s mx-auto">Update Events Page</div>
            </div>
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="w_fit_s mx-auto h1 text-warning m-5">Contacts Page</div>
            </div>
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="w_fit_s mx-auto h1 text-warning m-5">Donation Page</div>
            </div>
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="w_fit_s mx-auto h1 text-warning m-5">Profile Page</div>
                <div class="d-flex flex-column align-items-center p-2 gap-5">
                    <div class="p-3 border d-flex flex-column align-items-center">
                        <div class="h5 m-2">Change Username</div>
                        <div class="d-flex gap-2 align-items-center flex-wrap justify-content-center m-3">
                            <div class="change_username_input"><input class="p-2" type="text" placeholder="type new username"></div>
                            <div class="change_username_btn btn btn-primary">Change Username</div>
                        </div>
                    </div>
                    <div class="p-3 border d-flex flex-column align-items-center">
                        <div class="h5 m-2">Change Password</div>
                        <div class="d-flex gap-2 align-items-center flex-wrap justify-content-center m-3">
                            <div class="change_password_input"><input class="p-2" type="password" placeholder="type new username"></div>
                            <div class="change_password_btn btn btn-primary">Change Password</div>
                        </div>
                        <div class="change_pass_show_hide d-flex gap-2"><input class="p-2" type="checkbox"><span>Show Pass</span></div>
                    </div>
                    <div class="p-3 border d-flex flex-column align-items-center">
                        <div class="h5 m-2">Upload Image</div>
                        <form class="d-flex gap-2 align-items-center flex-wrap justify-content-center m-3" action="upload_img.php" method="post" enctype="multipart/form-data">
                            <div class="overflow-auto" style="width: 220px"><input class="p-2" type="file" name="profileImg" required></div>
                            <button class="btn btn-primary" type="submit" name="uploadImgBtn">Upload</button>
                        </form>
                    </div>
                    <div class="p-3 border d-flex flex-column align-items-center">
                        <div class="h5 m-2">Danger Zone</div>
                        <div class="d-flex gap-2 align-items-center flex-wrap justify-content-center m-3">
                            <div class="delete_account_btn btn btn-danger">Delece Account</div>
                        </div>
                    </div>
                </div>
            </div>







        </div>













    </body>

    </html>