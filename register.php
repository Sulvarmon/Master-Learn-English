<?php

if(isset($_POST["registerBtn"])){
    define("conn", true);
	include("conn.php");

    $user = $_POST["username"];
    $salt = "askhdjfdgFSDFjsdfg3243F";
    $password = $_POST["password"].$salt;
    $password = sha1($password);
    $usersArray = array();
    $error = "";
    $registrationStatus = true;

    $sql = "SELECT * FROM user";
    $query = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            array_push($usersArray, $row);
        }
    }

    /**check if username already exists */
    for ($i=0; $i <sizeof($usersArray) ; $i++) { 
        if($user == $usersArray[$i]["username"]){
            $registrationStatus = false;
            $error = "This Username -- '$user' -- Already Exists";
            echo $error;
            mysqli_close($conn);
            exit();
        }
    }

    /** */

    /**password character restriction */
    if(preg_match( "/[^A-Za-z0-9]/", $user )){
        $registrationStatus = false;
        $error = "For username use only uppercase/lowercase letters or numbers";
        echo $error;
        mysqli_close($conn);
        exit();
    }

    /** */

    /**weak password */
    if(strlen($password)<4){
        $registrationStatus = false;
        $error = "Password is too weak. Should be 4 characters at least";
        echo $error;
        mysqli_close($conn);
        exit();
    }

    /** */

    /**if code reaches this part than regisret the user */
    if($registrationStatus){
        echo "111";
        $sql = "INSERT INTO `user` VALUES(NULL, '$user', '$password', 0, 0, 0, 0, 0, 0, 0, 0)";
        mysqli_query($conn, $sql);

        $sql2 = "INSERT INTO `quiz_points` VALUES(NULL, '$user', 0, 0)";
        mysqli_query($conn, $sql2);
    }

    /** */

    mysqli_close($conn);



}else{
    header("Location: user.php");
}