<?php
    require 'config.php';
    // check if session is active, otherwise relink to login page
    
        // change profile pic
        $default_user_pic = "/rescources/svg/basic-profile-pic.svg";
    
            if(isset($_FILES['profilePic']) && isset($_POST['saveImg'])) {
                
                // unique file name
                $target_file = "rescources/uploads/". time(). "_" . basename($_FILES["profilePic"]["name"]);
                echo "<script>console.log('File received:". $target_file ."' );</script>";
    
                // temp save of the img for better database handling
                if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $target_file)) {
                    $user_pic = $target_file;
    
                    // insert image into database
    
    
                    // delete temp safed image
                    deleteLocalImage($target_file);
                }
    
                // load user pic from database
                //$user_pic = $database_user_pic
    
                // redirect to this page for the form to be closed
                redirect($_SERVER['PHP_SELF']);
    
            }else{
    
                // check if profile pic is set in database
    
    
                // if no profile pic in database use default pic
                $user_pic = $default_user_pic;
            }
        
    
            
    function deleteLocalImage($filename) {
        if(file_exists($filename)) {
            unlink($filename);
        }
    }
?>