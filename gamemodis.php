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
    <link rel='stylesheet' type='text/css' media='screen' href='/css/gamemodis.css'>

</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.html'; ?>

    <!-- content section -->

    <!-- headline area -->
    <div class="headline-container primary-textcol master-head letter-spacing-small medium">
        <div class="headline">Select a Gamemode
            <object data="/rescources/svg/small-dot.svg" width="20px" height="20px"></object>
            <div class="quadrat-text-element light-blue-bg quadrat-pos"></div>
        </div>

    </div>

    <!-- headline area end -->

    <!-- modis btn -->
    <div class="grid-container">
        <div class="wrapper1">
            <div class="one">
                <div id="#red-btn" class="main-button red-bg  main-btn-pos red-btn-shadow">
                    <a class="secondary-textcol letter-spacing-big medium paragraph" href="daily-start">Daily Challenge</a>
                </div>
            </div>
        </div>

        <div class="wrapper2">
            <div class="two">
                <div class="main-button yellow-bg  main-btn-pos yellow-btn-shadow">
                    <a class="secondary-textcol letter-spacing-big medium paragraph" href="#">Normal Game</a>
                </div>
            </div>

            <div class="three">
                <div class="main-button yellow-bg  main-btn-pos yellow-btn-shadow">
                    <a class="secondary-textcol letter-spacing-big medium paragraph" href="#">Time Modus</a>
                </div>
            </div>
        </div>
        <div class="wrapper1">
            <div class="four">
                <div class="main-button green-bg  main-btn-pos green-btn-shadow" >
                    <a class="secondary-textcol letter-spacing-big medium paragraph" href="#">Customgame</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modis btn end -->

    <!-- content sectione end -->

</body>

</html>