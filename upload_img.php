<?php

if(isset($_POST['uploadImgBtn'])){
        define("conn",true);
        include("conn.php");
        session_start();

        $userImagesArray = array();
        $user = $_SESSION['user'];
        $profileImgName = time() . "_" . $_FILES['profileImg']['name'];
        $target = './img/profile_imgs/' . $profileImgName;

        move_uploaded_file($_FILES['profileImg']['tmp_name'], $target);

        echo "here";

        $sql = "SELECT * FROM user_images";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                array_push($userImagesArray,$row);
            }
        }

        for($i=0;$i<sizeof($userImagesArray);$i++){
            if($user == $userImagesArray[$i]['user']){
                unlink('./img/profile_imgs/' . $userImagesArray[$i]['img']);
                $sql = "UPDATE user_images SET img = '$profileImgName' WHERE user = '$user' ";
                mysqli_query($conn,$sql);
                header("Location: user.php");
                mysqli_close($conn);                
                exit();
            }
        }

        $sql = "INSERT INTO user_images VALUES(NULL, '$user', '$profileImgName')";  
        mysqli_query($conn, $sql);
  
        header("Location: user.php");
        mysqli_close($conn);
}
else{
    header("Location: user.php");
}




