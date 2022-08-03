<!DOCTYPE html>

<html lang="en">

<head>

    <!-- fixing favicon icon not found err -->
    <link rel="shortcut icon" href="#">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Learn English</title>

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

    <div class="website_bg_s"></div>

    <div class="login_page">
        <div class="login_cont_s mx-auto mt-5 text-white rounded p-4 d-flex flex-column gap-2 align-items-center">
            <h1>Log In Here</h1>
            <div class="login_username_input"><input class="p-2" type="text" placeholder="username"></div>
            <div class="login_password_input"><input class="p-2" type="password" placeholder="password"></div>
            <div class="login_show_hide_password"><input type="checkbox" class="form-check-input"><span class="ms-2">Show Password</span></div>
            <div class="login_btn btn btn-primary">Log In</div>
            <div class="mt-5">Not Register ?</div>
            <div class="register_btn btn btn-primary">Register Here</div>
        </div>
    </div>

    <div class="reg_page">
        <div class="login_cont_s mx-auto mt-5 text-white rounded p-4 d-flex flex-column gap-2 align-items-center">
            <h1>Registration</h1>
            <div class="reg_username_input"><input class="p-2" type="text" placeholder="username"></div>
            <div class="reg_password_input"><input class="p-2" type="password" placeholder="password"></div>
            <div class="reg_show_hide_password"><input type="checkbox" class="form-check-input"><span class="ms-2">Show Password</span></div>
            <div class="reg_btn btn btn-primary">Register</div>
            <div class="mt-5 h5 text-warning">Go Here To Log In</div>
            <div class="login_here_btn btn btn-primary ">Log In Here</div>
        </div>
    </div>








</html>