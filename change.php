
<?php

if(isset($_POST['changeBtn'])){
    session_start();
    define("conn", true);
    include ("conn.php");

    $changeType = $_POST['changeBtn'];

    switch ($changeType) {
        case 'change_username':
            $newUsername = $_POST['newUsername'];
            $oldUsername = $_SESSION['user'];
            $sql = "UPDATE user SET username = '$newUsername' WHERE username = '$oldUsername' ";
            mysqli_query($conn, $sql);
            session_unset();
            session_destroy();
            mysqli_close($conn);
            break;
            exit();
        case 'change_password':
            $salt = "askhdjfdgFSDFjsdfg3243F";
            $newPassword = $_POST["newPassword"].$salt;
            $newPassword = sha1($newPassword);
            $oldPassword = $_SESSION['password'];
            $sql = "UPDATE user SET password = '$newPassword' WHERE password = '$oldPassword' ";
            mysqli_query($conn, $sql);
            session_unset();
            session_destroy();
            mysqli_close($conn);
            break;
            exit();
        default:
            # code...
            break;
    }

   
}else{
	header("Location: user.php");
}