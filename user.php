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
                    <div class="d-flex flex-column gap-5 align-item-center justify-content-center mx-auto width_fit_s ">
                        <div class="home dp_item link_s mx-auto">Home</div>
                        <div class="dp_item link_s mx-auto">Profile</div>
                        <div class="dp_item logout_btn btn btn-primary mx-auto">Log Out</div>
                    </div>
                </div>
            </div>

            <!-- home page -->
            <div class="page main_cont container-md mt-5">
                <div class="home_grid_cont_s">
                        <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                            <div class="dark_bg_s"></div>
                            <div class="width_fit_s mx-auto mb-2 text-white">Raitings</div>
                            <div class="grid_img_s"></div>
                        </div>
                        <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                            <div class="dark_bg_s"></div>
                            <div class="width_fit_s mx-auto mb-2 text-white">My Results</div>
                            <div class="grid_img_s"></div>
                        </div>
                        <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                            <div class="dark_bg_s"></div>
                            <div class="width_fit_s mx-auto mb-2 text-white">Friends</div>
                            <div class="grid_img_s"></div>
                        </div>
                        <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                            <div class="dark_bg_s"></div> 
                            <div class="width_fit_s mx-auto mb-2 text-white">Events</div>
                            <div class="grid_img_s"></div>
                        </div>
                        <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                            <div class="dark_bg_s"></div>
                            <div class="width_fit_s mx-auto mb-2 text-white">Contact us</div>
                            <div class="grid_img_s"></div>
                        </div>
                        <div class="home_grid_item p-2 border border-secondary cursor_pointer_s position-relative">
                            <div class="dark_bg_s"></div>
                            <div class="width_fit_s mx-auto mb-2 text-white">Donate</div>
                            <div class="grid_img_s"></div>
                        </div>
                </div>
            </div>

            <!-- raitings page -->
            <div class="page container-md bg-secondary text-white mt-5 p-3">
                <div class="container d-flex justify-content-center"><div class="update_tables_btn btn btn-primary">Update Tables</div></div>
                    <div class="d-flex flex-wrap justify-content-around mt-2">
                        <!-- top 10 eng to geo raitings -->
                        <div>
                            <div class="d-flex gap-1 justify-content-center align-items-center">
                                <div class="h3 text-center">Top 10 Eng-Geo No Time</div>
                                <div class="d-flex align-items-center" style="transform: translateY(-4px);"><i class="material-icons">timer_off</i></div>
                            </div>
                            
                            <div class="container w-25 d-flex justify-content-center flex-wrap">
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
                        <!-- top 10 geo to eng raitings -->
                        <div>
                            <div class="d-flex gap-1 justify-content-center align-items-center">
                                <div class="h3 text-center">Top 10 Geo-Eng No Time</div>
                                <div class="d-flex align-items-center" style="transform: translateY(-4px);"><i class="material-icons">timer_off</i></div>
                            </div>
                            
                            <div class="container w-25 d-flex justify-content-center flex-wrap">
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
                                            $userHasImg = false;
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
                    </div>
                    
                    
                    

                
            </div>
            <div class="page container-md bg-dark text-white">My Results</div>
            <div class="page container-md bg-dark text-white">Friends</div>
            <div class="page container-md bg-dark text-white">Events</div>
            <div class="page container-md bg-dark text-white">Contact us</div>
            <div class="page container-md bg-dark text-white">Donate</div>







        </div>












    
    </body>

    </html>