<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Globeles Stylesheet -->  
    <link rel='stylesheet' type='text/css' media='screen' href='/css/design.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/nav.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='/css/custom-word.css'>
</head>

<body>
    <!-- add header -->
    <?php include 'html_structures/nav.html'; ?>
    
    <section class="basic-padding">

        <!-- headline area -->
        <div class="headline-container primary-textcol master-head letter-spacing-small medium">
            <div class="headline">Send us a custom word to be</div>
            <div class="headline-subcontainer">
                 <div class="headline">part of the wordle community
                      <object data="/rescources/svg/small-dot.svg" width="15px" height="15px"></object>
                 </div> 
            </div>
            
            <div class="quadrat-text-element"></div>
         </div>
         <!-- headline area end -->

         <!-- content area -->
            <div class="content-container">

                <div class="input-container">
                    <div class="input-head sub-head letter-spacing-small bold secondary-textcol">Your own word in wordle</div>

                    <div class="form" action="">
                        <div class="input-field">
                            <input minlength="5" maxlength="5" autocomplete="off" class="third-head light-blue-bg" type="text" id="custom" placeholder=" ">
                            <label for="custom" class="form-lable paragraph medium light-blue-bg">input word</label>
                            <!-- info button -->

                            <!-- cta button -->
                        </div>
                        
                    </div>
                </div>

            </div>
         <!-- content area end -->

    </section>

</body>
</html>