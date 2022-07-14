<?php if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
} ?>
<header class="basic-padding">

    <div class="header-cotnainer">
        <div class="logo primary-textcol medium">
            <a href="/" style="text-decoration: none;">
                W<span class="special-logo blue-tetxcol regular">o</span>rl<span class="special-logo blue-tetxcol">d</span>e
            </a>
        </div>

        <div class="link-container">
            <div class="basic-links">
                <ul class="basic-links-container">

                    <?php
                   if (isset($_SESSION["urole"]) && $_SESSION["urole"] == 'A') {
                        echo '<li>';
                        echo '<a href="/adminpage" class="page-link red-tetxcol small-text letter-spacing-small">';

                        echo '<span class="mask">';
                        echo '<div class="single-link-container">';
                        echo '<span class="link-title1 title">Adminpage</span>';
                        echo '<span class="link-title2 title">Adminpage</span>';
                        echo '</div>';
                        echo '</span>';

                        echo '</a>';
                        echo '</li>';
                    }
                    ?>

                    <li>
                        <a href="/word-for-friends" class="page-link blue-tetxcol small-text letter-spacing-small">

                            <span class="mask">
                                <div class="single-link-container">
                                    <span class="link-title1 title">WordForFriends</span>
                                    <span class="link-title2 title">WordForFriends</span>
                                </div>
                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="/custom-word" class="page-link blue-tetxcol small-text letter-spacing-small">

                            <span class="mask">
                                <div class="single-link-container">
                                    <span class="link-title1 title">MyWords</span>
                                    <span class="link-title2 title">MyWords</span>
                                </div>
                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="/leaderboard" class="page-link blue-tetxcol small-text letter-spacing-small">

                            <span class="mask">
                                <div class="single-link-container">
                                    <span class="link-title1 title">Leaderboard</span>
                                    <span class="link-title2 title">Leaderboard</span>
                                </div>
                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="/faq" class="page-link blue-tetxcol small-text letter-spacing-small">

                            <span class="mask">
                                <div class="single-link-container">
                                    <span class="link-title1 title">FAQ</span>
                                    <span class="link-title2 title">FAQ</span>
                                </div>
                            </span>

                        </a>
                    </li>
                </ul>
            </div>

            <div class="login-container">
                <?php if (!isset($_SESSION["uid"])) { ?>
                    <div class="user-btn light-blue-bg">
                        <a href="/login" class="btn-login blue-tetxcol small-text">
                            <span class="mask">
                                <div class="single-link-container">
                                    <span class="link-title1 title">Login</span>
                                    <span class="link-title2 title">Login</span>
                                </div>
                            </span>
                        </a>
                    </div>
                    <div class="user-btn">
                        <a href="/register" class="btn-registry blue-tetxcol small-text bold letter-spacing-small">
                            <span class="mask">
                                <div class="single-link-container">
                                    <span class="link-title1 title">Register</span>
                                    <span class="link-title2 title">Register</span>
                                </div>
                            </span>
                        </a>
                    </div>
                <?php } ?>

                <!-- Hier folgt eine if Anweisung durch php, ob eine Session gestartet wurde.
                         Display Klasse je nachdem hinzufügen oder entfernen. -->
                <?php
                if (isset($_SESSION["uid"])) {
                    echo '<div class="user-btn light-blue-bg">';
                    echo '<a href="/profile" class="btn-login btn-my-profile blue-tetxcol small-text letter-spacing-small">My Profile</a>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
    </div>

</header>