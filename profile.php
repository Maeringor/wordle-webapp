<?php
include "php/processUploadImageForm.php";
require_once "php/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Wordle</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Globeles Stylesheet -->  
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='/css/profile.css'>
</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.php'; ?>
    <?php
        if (!isset($_SESSION["uid"])) {
            header("location: ../login.php");
            exit();
        } ?>

    <section class="basic-padding">

        <!-- content area -->
        <div class="content-container">

            <div class="content-container-head">
                <form name="profilePicForm" id="profilePicForm" action="/profile.php" method="POST" enctype="multipart/form-data">
                    <!-- dynamic data -->
                    <div class="left-container">
                    
                        <div class="profile-image-container">
                            <img name="profilePicDisplay" id="profilePicDisplay" src=<?php echo '"'.$user_pic.'"'; ?> onclick="changeImageClick()" alt="" width="180px" height="180px" style="overflow: hidden;border-radius: 999px; cursor: pointer;"/>
                        </div>
                        <!-- choosable img from user -->   
                        <input id="profilePic" name="profilePic" type="file" accept=".jpeg,.png,.svg,.jpg" onchange="displayImage(this)" class="profile-img-container" style="display:none;" >
                        <button id="saveImg" name="saveImg" type="submit" style="display:none;">submit</button>
                        <div class="welcome-text third-head medium primary-textcol letter-spacing-small">Hello <span class="bold"><?php echo $_SESSION["uname"]; ?></span></div>
                        
                    </div>
                </form>

                <div class="right-container">
                    <div class="third-head medium primary-textcol letter-spacing-small">Daily Challange History</div>
                </div>

            </div>

            <!-- user information area -->
            <div class="content-container-user-infos">
                <div class="user-infos-left">
                    <form action="/php/changeusername.php" method="post">
                        <div class="input-field">
                            <label class="paragraph bold" for="username">Username</label>
                            <input minlength="5" id="username" name="username" value=<?php echo "'".$_SESSION["uname"]."'"; ?> class="paragraph gray-bg" type="text" autocomplete="off" placeholder=" ">
                            <!-- broder for input -->
                            <div class="bottom-border"></div>
                        </div>
                
                        <div class="change-btn-container">
                            <button type="submit" id="changeButton" name="changeButton" class="change-btn small-text medium blue-bg secondary-textcol">Change name</button>
                        </div>
                        
                    </form>

                    <div class="delete-btn-container">
                        <form action="/php/deleteprofile.php" method="post">
                            <button id="deleteButton" class="delete-btn small-text medium secondary-textcol red-bg">Delete profile</button>
                        </form>
                    </div>

                    <!-- dynamic data -->
                    <div class="score-container secondary-textcol">
                        <div class="score">
                            <div class="headline third-head">Score</div>
                            <div class="value sub-head bold"><?php echo getScore($_SESSION["uname"]); ?></div>
                        </div>
                        <div class="place">
                            <div class="headline third-head">Place</div>
                            <div class="value sub-head bold"><?php echo getPlace($_SESSION["uname"]); ?></div>
                        </div>
                    </div>
                    
                </div>

                <!-- daily history -->
                <!-- dynamic data -->
                <div class="user-infos-right">

                    <!-- card setup for dynamic data from db -->
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 2</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 13</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>
                    <div class="history-card sub-head primary-textcol medium light-blue-bg">
                        <div class="date">Date: 10.05.2022</div>
                        <div class="position">Position: 40</div>
                    </div>

                </div>
                <!-- daily history end -->
            </div>
            <!-- user information area end -->
        </div>
        <!-- content area end -->

    </section>

    <script src="/js/changeimage.js"></script>

</body>
</html>