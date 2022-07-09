<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Wordle</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Globeles Stylesheet -->
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/login.css'>

</head>

<body>
    <!-- content section -->
    <section class="basic-padding">
        <!-- headline area -->
        <div class="headline-container primary-textcol ">
            <div class="headline third-head letter-spacing-small medium">Lets Wordle
                <object data="/rescources/svg/small-dot.svg" width="8px" height="8px"></object>
            </div>

        </div>

        <!-- headline area end -->

        <!-- login field -->
        <div class="quadrat-bg light-gray-bg">
            <div class="input-container">
                <div class="inner-container">

                    <div class="input-head sub-head letter-spacing-small regular blue-tetxcol">Login</div>

                    <form class="form" action="/php/signin.php" method="POST">
                        <div class="input-field">
                            <input autocomplete="off" class="small-text light-gray-bg" type="text" id="user" name="user" placeholder=" ">
                            <label for="user" class="form-lable small-text regular light-gray-bg">Username</label>
                        </div>

                        <div class="input-field">
                            <input autocomplete="off" class="small-text light-gray-bg" type="text" id="pass" name="pass" placeholder=" ">
                            <label for="pass" class="form-lable small-text regular light-gray-bg">Password</label>
                        </div>
                        <!-- submit btn -->
                        <div class="cta-btn">
                            <button name="submit" type="submit" class="main-button blue-bg secondary-textcol letter-spacing-big medium paragraph">Submit</button>
                        </div>
                        <!-- submit btn end -->

                    </form>

                </div>



            </div>


        </div>


        <!-- login field end -->

        <!-- content sectione end -->
    </section>

</body>

</html>