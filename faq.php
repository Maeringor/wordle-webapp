<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Worlde</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Globeles Stylesheet -->
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/elements.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='/css/faq.css'>
</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.php'; ?>

    <!-- content section -->
    <section class="basic-padding">

        <!-- headline area -->
        <div class="headline-container primary-textcol master-head letter-spacing-small medium">
            
            <div class="headline"><div class="quadrat-text-element light-blue-bg quadrat-pos"></div>What is Wordle</div>
            <div class="headline-subcontainer">
                <div class="headline">and how to play it
                    <object data="/rescources/svg/small-dot.svg" width="15px" height="15px"></object> 
                </div> 
            </div>
            
        </div>
        <!-- headline area end -->

        <!-- content area -->
        <div class="faq-cards-container">

            <!-- single card -->
            <div class="single-faq-card light-blue-bg">
                <div class="card-top sub-head medium letter-spacing-small">
                    <div class="plus-element-container">
                        <div class="cross-element"></div>
                        <div class="cross-element" style="transform: rotate(90deg);"></div>
                    </div>
                    <div class="card-headline primary-textcol">About the game</div>
                </div>

                <div class="text-content paragraph secondary-textcol">
                    Wordle is a game in which the goal is to guess five-digit words.<br> After each word you enter, you will be given feedback on each letter.
                    The game principle comes from the New York Times, which always print the game in their newspaper. We take Worlde to a new level for puzzlers. 
                        With our different game modes you have the possibility to get better and better and to try different modified game principles depending on your mood and to increase your performance.
                    <br><br>
                    So go ahead, play a round
                </div>
            </div>
            <!-- single card end -->

            <!-- single card -->
            <div class="single-faq-card light-blue-bg">
                <div class="card-top sub-head medium letter-spacing-small">
                    <div class="plus-element-container">
                        <div class="cross-element"></div>
                        <div class="cross-element" style="transform: rotate(90deg);"></div>
                    </div>
                    <div class="card-headline primary-textcol">How to play Wordle</div>
                </div>

                <div class="text-content paragraph secondary-textcol">
                    Choose one of the game modes you would like to play. In each mode you have to guess a word that has five letters. After each attempt you will get feedback about your entered word.<br>
                    There are three states of a letters.
                    <br>
                    <ol>
                        <li>the letter glows green, which means that the letter exists and is positioned in the right place.</li>
                        <li>the letter is orange, which means that the letter is in the word, but in the wrong position.</li>
                        <li>the letter is red, which means that the letter is not in the word at all.</li>
                    </ol>
                    Just try it and have fun.
                </div>
            </div>
            <!-- single card end -->

            <!-- single card -->
            <div class="single-faq-card light-blue-bg">
                <div class="card-top sub-head medium letter-spacing-small">
                    <div class="plus-element-container">
                        <div class="cross-element"></div>
                        <div class="cross-element" style="transform: rotate(90deg);"></div>
                    </div>
                    <div class="card-headline primary-textcol">About the Daily Challenge</div>
                </div>

                <div class="text-content paragraph secondary-textcol">
                Our Daily Challenge allows you to guess a new word every day. <br>You have unlimited time and an infinite number of attempts.
                <br>The faster you are, the higher you will be on the daily leaderboard and you can compete with others every day.
                </div>
            </div>
            <!-- single card end -->

            <!-- single card -->
            <div class="single-faq-card light-blue-bg">
                <div class="card-top sub-head medium letter-spacing-small">
                    <div class="plus-element-container">
                        <div class="cross-element"></div>
                        <div class="cross-element" style="transform: rotate(90deg);"></div>
                    </div>
                    <div class="card-headline primary-textcol">Whats about the Leaderboard</div>
                </div>

                <div class="text-content paragraph secondary-textcol">
                The leaderboard gives you that extra kick and shows you how well you are doing compared to all the other players by adding up the total points earned by each player.
                <br>For each game you get points, they depend on how well you complete the game mode. So start and collect as many points as possible.
                </div>
            </div>
            <!-- single card end -->

            <!-- single card -->
            <div class="single-faq-card light-blue-bg">
                <div class="card-top sub-head medium letter-spacing-small">
                    <div class="plus-element-container">
                        <div class="cross-element"></div>
                        <div class="cross-element" style="transform: rotate(90deg);"></div>
                    </div>
                    <div class="card-headline primary-textcol">How to add new Words</div>
                </div>

                <div class="text-content paragraph secondary-textcol">
                You are missing a word and want it in the game? Then use our feature that allows every player to submit new words.
                <br>Every submitted word will be checked before we will be add it to the wordle word collection, thus the user experience is guaranteed.
                </div>
            </div>
            <!-- single card end -->
        </div>
        <!-- content area end -->

        <!-- Space between the end of the Page and last opend card -->
        <div class="space-bottom"></div>

    </section>
    <!-- content sectione end -->

    <script src="/js/faqcardscript.js"></script>

</body>

</html>