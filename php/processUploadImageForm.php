<?php
    require 'config.php';
    require_once "db.conn.php";
    require_once "functions.php";
    // check if session is active, otherwise relink to login page
    if (!isset($_SESSION["uid"])) {
        header("location: ../login.php");
        exit();
    }
        // change profile pic
        $default_user_pic = "/rescources/svg/basic-profile-pic.svg";
    
            if(isset($_FILES['profilePic']) && isset($_POST['saveImg'])) {
                
                // unique file name
                $target_file = "rescources/uploads/". time(). "_" . basename($_FILES["profilePic"]["name"]);
                echo "<script>console.log('File received:". $target_file ."' );</script>";
    
                // temp save of the img for better database handling
                if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $target_file)) {
                    $user_pic = $target_file;
                    $local_uname = $_SESSION['uname'];
    
                    // insert image link ($target_file) into database
                    $sqlUpdate = "UPDATE ".TAB_USER." SET UPicLink='$target_file'WHERE UName='$local_uname';";
                    mysqli_query($conn, $sqlUpdate);
                }
    
                // redirect to this page for the form to be closed
                redirect($_SERVER['PHP_SELF']);
    
            }else{
                // check if profile pic is set in database
                $userExists = userExists($conn, $_SESSION["uname"]);

                if (empty($userExists["UPicLink"])) {
                    // if no profile pic in database use default pic
                    $user_pic = $default_user_pic; 
                } else {
                    $user_pic = $userExists["UPicLink"];
                }
    
            }
        
    
            
    function deleteLocalImage($filename) {
        if(file_exists($filename)) {
            unlink($filename);
        }
    }
?>