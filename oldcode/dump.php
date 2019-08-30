
    <?php 
            // Checking which badges have been obtained and positioning them:
            $progressLeftOffset = 20;
            $progressRightOffset = 95;

            // Badge 1 check:
            if ( $badge_1 == true){
                echo "console.log('Badge 1 found, offset now: $progressLeftOffset');"; 
                echo  "progressBadge1.style.left='$progressLeftOffset%'; ";
                $progressLeftOffset= $progressLeftOffset + 25;
            } else {
                // Set the style.right to $progressRightOffset;
                echo  "progressBadge1.style.left='$progressRightOffset%'; ";
                $progressRightOffset = $progressRightOffset - 25;
                echo "console.log('Badge 1 not found, right offset now: $progressRightOffset');";
                echo "console.log(progressBadge1.style.left);";
            };

            // Badge 2 check:
            if( $badge_2 == true){
                echo "console.log('Badge 2 found, offset now: $progressLeftOffset');";   
                echo  "progressBadge2.style.left='$progressLeftOffset%'; ";           
                $progressLeftOffset= $progressLeftOffset + 25;
            } else {  
                // Set the style.right to $progressRightOffset;
                echo  "progressBadge2.style.left='$progressRightOffset%'; ";
                $progressRightOffset = $progressRightOffset - 25;
                echo "console.log('Badge 2 not found, right offset now: $progressRightOffset');";
                echo "console.log(progressBadge2.style.left);";
                $badgeAmount++;
            };

            // Badge 3 check:
            if( $badge_3 == true){
                echo "console.log('Badge 3 found, offset now: $progressLeftOffset');";  
                echo  "progressBadge3.style.left='$progressLeftOffset%';";            
                $progressLeftOffset= $progressLeftOffset + 25;
            } else {  
                // Set the style.right to $progressRightOffset;
                echo  "progressBadge3.style.left='$progressRightOffset%';";
                $progressRightOffset = $progressRightOffset - 25;
                echo "console.log('Badge 3 not found, right offset now: $progressRightOffset');";
                echo "console.log(progressBadge3.style.left);";
            };

            // Badge 4 check:
            if( $badge_4 == true){
                echo "console.log('Badge 4 found, offset now: $progressLeftOffset');";  
                echo  "progressBadge4.style.left='$progressLeftOffset%';";              
                $progressLeftOffset= $progressLeftOffset + 25;
            } else {  
                // Set the style.right to $progressRightOffset;
                echo  "progressBadge4.style.left='$progressRightOffset%';";
                $progressRightOffset = $progressRightOffset - 25;
                echo "console.log('Badge 4 not found, right offset now: $progressRightOffset');";
                echo "console.log(progressBadge4.style.left);";
                    $badgeAmount++;

            };
            ?>



            // Checking hvilken retning badget tilhører:
                // switch (<?php echo $badgeReceivedId ?>) {
                //     case 0: case 1: case 2: case 3:
                //         var badgeRetning = "Magiker";
                //         break;
                //     case 4: case 5: case 6: case 7:
                //         var badgeRetning = "Alkymist";
                //         break;
                //     case 8: case 9: case 10: case 11:
                //         var badgeRetning = "Vogter";
                //         break;
                //     case 13: case 14: case 15: case 18:
                //         var badgeRetning = "Quidditch";
                //         break;
                //     case 19: case 18: case 19: case 20:
                //         var badgeRetning = "Erfaren";
                //         break;
                //     default:
                //         var badgeRetning = "badgeRetning";
                //         console.log("switchstatement failed");
                //         break;
                // };

                // Outputting the right picture depending on the journey:
                // if(badgeRetning == "Magiker") {
                //     journeyBadge.classList.add("retningMagiker");
                //     progress.classList.add("progressColorMagiker");
                //     progressBadge1.classList.add("badge1");
                //     progressBadge2.classList.add("badge2");
                //     progressBadge3.classList.add("badge3");
                //     progressBadge4.classList.add("badge4");
                    
                //      <?php 
                //         $badgeAmount = 0;
                //             if ($badge_1 == true){
                //                 $badgeAmount++;
                                
                //             } ;
                //             if ($badge_2 == true){
                //                 $badgeAmount++;
                //             };
                //             if ($badge_3 == true){
                //                 $badgeAmount++;

                //             };
                //             if ($badge_4 == true){
                //                 $badgeAmount++;
                //             }; 
                //             ?>
                //         progress.style.width= 0 + 25 * <?php echo $badgeAmount;?> + "%";
                        


                // } else if (badgeRetning == "Alkymist") {
                //     journeyBadge.classList.add("retningAlkymist");
                //     progress.classList.add("progressColorAlkymist");
                //     progressBadge1.classList.add("badge5");
                //     progressBadge2.classList.add("badge6");
                //     progressBadge3.classList.add("badge7");
                //     progressBadge4.classList.add("badge8");
                    
                //      <?php 
                //         $badgeAmount = 0;
                //             if ($badge_4 == true){
                //                 $badgeAmount++;
                //             } ;
                //             if ($badge_5 == true){
                //                 $badgeAmount++;
                //             };
                //             if ($badge_6 == true){
                //                 $badgeAmount++;

                //             };
                //             if ($badge_7 == true){
                //                 $badgeAmount++;
                //             }; 
                //             ?>
                //         progress.style.width= 0 + 25 * <?php echo $badgeAmount;?> + "%";
                        

                // } else if (badgeRetning == "Vogter") {
                //     journeyBadge.classList.add("retningVogter");
                //     progress.classList.add("progressColorVogter");
                //      progressBadge1.classList.add("badge14");
                //     progressBadge2.classList.add("badge15");
                //     progressBadge3.classList.add("badge16");
                //     progressBadge4.classList.add("badge17");

                    
                //      <?php 
                //         $badgeAmount = 0;
                //             if ($badge_8 == true){
                //                 $badgeAmount++;
                //             } ;
                //             if ($badge_9 == true){
                //                 $badgeAmount++;
                //             };
                //             if ($badge_10 == true){
                //                 $badgeAmount++;

                //             };
                //             if ($badge_11 == true){
                //                 $badgeAmount++;
                //             }; 
                //             ?>
                //         progress.style.width= 0 + 25 * <?php echo $badgeAmount;?> + "%";
                        

                // } else if (badgeRetning == "Quidditch") {
                //     journeyBadge.classList.add("retningQuidditch");
                //     progress.classList.add("progressColorQuidditch");

                //             progressBadge1.classList.add("badge9");
                //     progressBadge2.classList.add("badge10");
                //     progressBadge3.classList.add("badge11");
                //     progressBadge4.classList.add("badge13");
                    
                //      <?php 
                //         $badgeAmount = 0;
                //             if ($badge_13 == true){
                //                 $badgeAmount++;
                //             } ;
                //             if ($badge_14 == true){
                //                 $badgeAmount++;
                //             };
                //             if ($badge_15 == true){
                //                 $badgeAmount++;

                //             };
                //             if ($badge_16 == true){
                //                 $badgeAmount++;
                //             }; 
                //             ?>
                //         progress.style.width= 0 + 25 * <?php echo $badgeAmount;?> + "%";
                        

                // } else if (badgeRetning == "Erfaren") {
                //     journeyBadge.classList.add("retningErfaren");
                //     progress.classList.add("progressColorErfaren");

                //     progressBadge1.classList.add("badge18");
                //     progressBadge2.classList.add("badge19");
                //     progressBadge3.classList.add("badge20");
                //     progressBadge4.classList.add("badge21");
                    
                //      <?php 
                //         $badgeAmount = 0;
                //             if ($badge_17 == true){
                //                 $badgeAmount++;
                //             } ;
                //             if ($badge_18 == true){
                //                 $badgeAmount++;
                //             };
                //             if ($badge_19 == true){
                //                 $badgeAmount++;

                //             };
                //             if ($badge_20 == true){
                //                 $badgeAmount++;
                //             }; 
                //             ?>
                //         progress.style.width= 0 + 25 * <?php echo $badgeAmount;?> + "%";
                        

                // } else {
                //     console.log("could not find badgeRetning :c")
                // };


    <?php 
            // Checking which badges have been obtained and positioning them:
            $progressLeftOffset = 20;
            $progressRightOffset = 95;

            // Badge 1 check:
            if ( $badge_1 == true){
                echo "console.log('Badge 1 found, offset now: $progressLeftOffset');"; 
                echo  "progressBadge1.style.left='$progressLeftOffset%'; ";
                $progressLeftOffset= $progressLeftOffset + 25;
            } else {
                // Set the style.right to $progressRightOffset;
                echo  "progressBadge1.style.left='$progressRightOffset%'; ";
                $progressRightOffset = $progressRightOffset - 25;
                echo "console.log('Badge 1 not found, right offset now: $progressRightOffset');";
                echo "console.log(progressBadge1.style.left);";
            };

            // Badge 2 check:
                    if( $badge_2 == true){
                        echo "console.log('Badge 2 found, offset now: $progressLeftOffset');";   
                        echo  "progressBadge2.style.left='$progressLeftOffset%'; ";           
                        $progressLeftOffset= $progressLeftOffset + 25;
                    } else {  
                        // Set the style.right to $progressRightOffset;
                        echo  "progressBadge2.style.left='$progressRightOffset%'; ";
                        $progressRightOffset = $progressRightOffset - 25;
                        echo "console.log('Badge 2 not found, right offset now: $progressRightOffset');";
                        echo "console.log(progressBadge2.style.left);";
                    };

                    // Badge 3 check:
                    if( $badge_3 == true){
                        echo "console.log('Badge 3 found, offset now: $progressLeftOffset');";  
                        echo  "progressBadge3.style.left='$progressLeftOffset%';";            
                        $progressLeftOffset= $progressLeftOffset + 25;
                    } else {  
                        // Set the style.right to $progressRightOffset;
                        echo  "progressBadge3.style.left='$progressRightOffset%';";
                        $progressRightOffset = $progressRightOffset - 25;
                        echo "console.log('Badge 3 not found, right offset now: $progressRightOffset');";
                        echo "console.log(progressBadge3.style.left);";
                    };

                    // Badge 4 check:
                    if( $badge_4 == true){
                        echo "console.log('Badge 4 found, offset now: $progressLeftOffset');";  
                        echo  "progressBadge4.style.left='$progressLeftOffset%';";              
                        $progressLeftOffset= $progressLeftOffset + 25;
                    } else {  
                        // Set the style.right to $progressRightOffset;
                        echo  "progressBadge4.style.left='$progressRightOffset%';";
                        $progressRightOffset = $progressRightOffset - 25;
                        echo "console.log('Badge 4 not found, right offset now: $progressRightOffset');";
                        echo "console.log(progressBadge4.style.left);";
                    };
            ?>



            
              <!-- Alkymist Box, start -->
              <div class="badge slickItem" id="alkymist">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/alkymist/alkymistBadge.png">

                  <!--Eliksir badge, start-->
                  <div id="5" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_5 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/eliksirBadge.png">
                  </div>
                  <!--Eliksir badge, slut-->

                  <!--Spiselig wand badge, start-->
                  <div id="6" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_6 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/spiswandBadge.png">
                  </div>
                  <!--Spiselig wand badge, slut-->
                  
                  <!--Botanik badge, start-->
                  <div id="7" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_7 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/botanikBadge.png">
                  </div>
                  <!--Botanik badge, slut-->

                  <!--Creature badge, start-->
                  <div id="8" class="badgeImg top-right">
                    <img  class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_8 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/alkymist/creatureBadge.png">
                  </div>
                  <!--Creature badge, slut-->

              </div><!--Alkymist Box, slut-->

              <!-- Quidditch Stjerne Box, start -->
              <div class="badge slickItem" id="quidditch">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/quidditch/qBadge.png">
                  
                  <!--Qudditch kamo badge, start-->
                  <div id="9" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_9 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/quidditchBadge.png">
                  </div>
                  <!--Quudditch kamp badge, slut-->
                  <!--Quidditch Tournament badge, start-->
                  <div id="10" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_10 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/qtournamentBadge.png">
                  </div>
                  <!--Quidditch Tournament, slut-->

                  <!--Gyldne snitch badge, start-->
                  <div id="11" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_11 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/snitchBadge.png">
                  </div>
                  <!--Gyldne snitch badge, slut-->
                  
                  <!--Broom badge, start-->
                  <div id="13" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_13 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/quidditch/broomBadge.png">
                  </div>
                  <!--Broom badge, slut-->

              </div><!--Quidditch Stjerne Box, slut-->

              <!-- Dragetæmmer box, start -->
              <div class="badge slickItem" id="dragetaemmer">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/drage/drageBadge.png">
                  
                  <!--Drageæg badge, start-->
                  <div id="14" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_14 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/eggBadge.png">
                  </div>
                  <!--Drageæg badge, slut-->
               
                  <!--Pasning af dyr, start-->
                  <div id="15" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_15 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/animalBadge.png">
                  </div>
                  <!--Pasning af dyr, slut-->

                  <!--Fold en drage badge, start-->
                  <div id="16" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_16 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/dragonBadge.png">
                  </div>
                  <!--Fold en drage, slut-->

                  <!--Zoologmagisk tur, start-->
                  <div id="17" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_17 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/drage/zooBadge.png">
                  </div>
                  <!--Zoologmagisk tur, slut-->

              </div><!--Dragetæmmer box, slut-->

              <!-- Erfaren magiker box, start -->
              <div class="badge slickItem" id="erfaren">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/erfaren/erfarenBadge.png">
                  
                  <!--Tipsy Toad, start-->
                  <div id="18" class="badgeImg bottom-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_18 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/toadBadge.png">
                  </div>
                  <!--Tipsy Toad, slut-->

                  <!--Storms pakhus, start-->
                  <div id="19" class="badgeImg bottom-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_19 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/stormsBadge.png">
                  </div>
                  <!--Storms pakhus, slut-->

                  <!--Filmkoncert, start-->
                  <div id="20" class="badgeImg top-left">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_20 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/concertBadge.png">
                  </div>
                  <!--Filmkoncert, slut-->

                  <!--Efteråsbal, start-->
                  <div id="21" class="badgeImg top-right">
                    <img class="badgeActualImg

                    <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                      if ($badge_21 ) {
                      echo "badgeAcquired";
                    }; ?>"

                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/erfaren/promBadge.png">
                  </div>
                  <!--Efteråsbal, slut-->

              </div><!--Erfaren magiker box, slut-->


               <div class="badge slickItem" id="magiker">
                  <img class="journeyBadge" src="<?php echo get_stylesheet_directory_uri();?>/img/badges/magiker/magikerBadge.png">

                  <!--Cape badge, start-->
                  <div id="1" class="badgeImg top-left mainBadgeTitle">
                    <img class="badgeActualImg
                      <?php
                      // Tilføj class'en badgeAcquired, hvis brugeren har det badge:
                      // NOTE: VIGTIGT A TJEKKE BADGE NUMMER!!!
                        if ($badge_1) {
                        echo " badgeAcquired";
                      }; ?>"
                    src="<?php echo get_stylesheet_directory_uri(); ?>/img/badges/magiker/capeBadge.png">
                  </div>
                  <!--Cape badge, slut-->

              </div>Magiker Box, slut





           <!-- Her starter Badge Lightbox
          <div id="darkoverlay"></div>
              <!--Modal, start-->
              <div id="myModal" class="modal">
                  <!--Modal indhold, start-->
                  <div class="modalContent">
                    <h3 class="eTitle"><?php echo $title; ?></h3>
                    <!-- Luk knap -->
                    <span class="close">&times;</span>

                    <!--Badge, start -->
                    <div class="eventDescription">
                      <p>Ved at opnå dette badge er du et skridt tættere på at opnå titlen:</p>
                      <h3 class="badgeRetning"><?php echo $badgeRetning ?></h3>
                      <div class="badgeKortLink">
                        <a href="localhost/magikerensRejse/kort?bid=<?php echo $Id ?>">Dette Badge opnås ved <?php echo $eventLink ?>, Se på kort</a>
                      </div>
                    </div><!--Badge, slut-->
                    
                    <!--Badge ikon, start-->
                    <div class="badgeDescription">
                        <p><?php echo $badgeText?></p>
                        <div class="eventBadgeImgContainer badgeLightboxImg">
                          <img class="eventBadgeImg" src="<?php echo $badgeImage ?>">
                        </div>
                    </div><!--Badge ikon, slut-->
                  </div><!--Modal indhold, slut-->
              </div><!--Modal, slut-->
        


        <!-- FROM THE BADGE RECEIVED JSCRIPT -->

        
  // after 1 second, start the paper animation
  setTimeout(function() {
    document.getElementById("loginPaper").style.opacity = "0";
    document.getElementById("konvolutLoginSkærm").style.opacity = "0";

    //after 1 second show the page content of page 1
    setTimeout(function() {
      var pageContent = document.getElementById("paperContent");
      var pages = document.getElementsByClassName("paperPage");

      var imageScroller = document.getElementById("imageScroller");
      var imageScrollerImages = document.getElementsByClassName(
        "imageScrollerWrapper"
      );

      var nextPage = document.getElementById("paperNextArrow");
      var prevPage = document.getElementById("paperBackArrow");

      imageScroller.style.left = "0";
      imageScroller.style.width = pages.length * 100 + "vw";
      //The images were showing underneath each other, so I set a timeoutfor them showing.
      for (var i = 0; i < imageScrollerImages.length; i++) {
        imageScrollerImages[i].style.display = "block";
      }
      setTimeout(function() {
        for (var i = 0; i < imageScrollerImages.length; i++) {
          imageScrollerImages[i].style.opacity = "1";
        }
      }, 1000);

      // set the display style to block before changing opacity within 200ms
      pageContent.style.display = "block";
      pages[0].style.display = "block";
      nextPage.style.display = "block";

      //After 1500ms, change the opacity, so it animates nicely
      setTimeout(function() {
        pageContent.style.opacity = "1";
        pages[0].style.opacity = "1";
        nextPage.style.opacity = "1";
        prevPage.style.opacity = "1";
      }, 1500);
    }, 200);
  }, 1000);
  console.log("you clicked on the envelope");


  
// Go to the next page of the oprettelses brev
var nextPage = document.getElementById("paperNextArrow");
var prevPage = document.getElementById("paperBackArrow");
var lastPagePaper = document.getElementById("paperOverlayOprettelse");
var imageScroller = document.getElementById("imageScroller");
var click = 0;
var imageScrollerOffsetAmount = -100;
var pageArray = document.getElementsByClassName("paperPage");

if (nextPage != null) {
  // Next page EVENTLISTNER | ARROW ->
  nextPage.addEventListener("click", function() {
    if (click < pageArray.length - 2) {
      //What to do before going to the next page
      pageArray[click].style.opacity = "0";
      setTimeout(function() {
        pageArray[click].style.display = "none";

        click++;

        //what to do after going to the next page
        pageArray[click].style.display = "block";
        setTimeout(function() {
          pageArray[click].style.opacity = "1";
        }, 500);
        //make the back-btn visible
        prevPage.style.display = "block";

        imageScroller.style.left = imageScrollerOffsetAmount + "vw";
        console.log("the images are offset by:" + imageScrollerOffsetAmount);
        console.log("click:" + click);
      }, 100);

      // the imagescroller animations
      if (click != 0) {
        imageScrollerOffsetAmount = -100 * click - 100;
      } else {
        imageScrollerOffsetAmount = click - 100;
      }
    } else if ((click = pageArray.length - 2)) {
      //what to do on the last page
      //What to do before going to the next page
      pageArray[click].style.opacity = "0";
      setTimeout(function() {
        pageArray[click].style.display = "none";

        click++;

        //what to do after going to the next page
        pageArray[click].style.display = "block";
        setTimeout(function() {
          pageArray[click].style.opacity = "1";
        }, 500);
        //make the back-btn visible
        prevPage.style.display = "block";
        lastPagePaper.style.right = "-10px";

        imageScroller.style.left = imageScrollerOffsetAmount + "vw";
        console.log("the images are offset by:" + imageScrollerOffsetAmount);
        console.log("click:" + click);
      }, 100);

      // the imagescroller animations
      if (click != 0) {
        imageScrollerOffsetAmount = -100 * click - 100;
      } else {
        imageScrollerOffsetAmount = click - 100;
      }
      //removing the next arrow and replacing it with the little paper overlay
      // var paperOverlay = document.getElementById('paperOverlayOprettelse');

      nextPage.style.display = "none";
    }
  }); //end of arrow forward eventlistener
  console.log(pageArray.length);
}

if (prevPage != null) {
  // Next page EVENTLISTNER | ARROW ->
  prevPage.addEventListener("click", function() {
    if (click < pageArray.length) {
      //what to do before going to the previous page
      pageArray[click].style.opacity = "0";
      setTimeout(function() {
        pageArray[click].style.display = "none";
        click--;

        //what to do when on the previous page
        pageArray[click].style.display = "block";
        setTimeout(function() {
          pageArray[click].style.opacity = "1";
        }, 500);

        imageScroller.style.left = imageScrollerOffsetAmount + "vw";
        console.log("the images are offset by:" + imageScrollerOffsetAmount);
        console.log("click:" + click);
      }, 100);

      // the imagescroller animations
      if (click != 0) {
        imageScrollerOffsetAmount = -100 * click + 100;
      } else {
        imageScrollerOffsetAmount = click + 100;
      }

      if (click <= 1) {
        prevPage.style.display = "none";
      }

      //enable the forward arrow again
      nextPage.style.display = "block";
      lastPagePaper.style.right = "-40vw";

      //If the scroller is on the last page:
    } else if (click >= pageArray.length) {
      click--;
      pageArray[click].style.display = "block";
      setTimeout(function() {
        pageArray[click].style.opacity = "1";
      }, 500);

      imageScrollerOffsetAmount = -100 * click + 100;
      imageScroller.style.left = imageScrollerOffsetAmount + "vw";
      lastPagePaper.style.right = "-40vw";

      console.log("the images are offset by:" + imageScrollerOffsetAmount);
      console.log("click:" + click);
    }
  }); //end of arrow backward eventlistener
}


//  EVENTLIST IN THE PEEKABOO ON THE MAP PAGE

// var eventTitles = document.getElementsByClassName("mainEventTitles");
// var events = document.getElementsByClassName("eventTitle");
// var eventList = document.getElementById("eventList");
// var event = "";
// var modals = document.getElementsByClassName('modal');

// //For hver eventTitle skal der laves et list item
// for(let i = 0; i < eventTitles.length; i++){
//     event += "<li class='eventTitle'>";
//     event += eventTitles[i].innerHTML;
//     event += "</li>";
//     eventTitles[i].onclick = function(){
//     console.log("This works");
//     }
// };
//     eventList.innerHTML += event;

// //For hvert event tilføjes click funktion som åbner modal box
// for (let i = 0; i < events.length;i++) {
//   events[i].onclick = function(){
//     modals[i].style.display = "block";
//     // peekaboo.style.width = "10%";
//     // peekabooLabel.style.width = "100%";
//     peekaboo.style.transition = "1s";
//     peekaboo.style.left="-65%";
//   }
// };

// var span = document.getElementsByClassName("close");
// //For hver kryds-ikon tilføjes click funktion der lukker modal
// for(let i = 0; i <span.length; i++){
//     // When the user clicks on <span> (x), close the modal
//     span[i].onclick = function() {
//         modals[i].style.display = "none";
//     };
// };


// THE BADGES HOMESCREEN

// // MAP AND EVENTS

// var eventTitle = document.getElementsByClassName("mainEventTitle");
// var modals = document.getElementsByClassName("modal");

// for (let i = 0; i < eventTitle.length; i++) {
//   eventTitle[i].onclick = function() {
//     modals[i].style.display = "block";
//     console.log("This works");
//   };
// }

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close");
// for (let i = 0; i < span.length; i++) {
//   // When the user clicks on <span> (x), close the modal
//   span[i].onclick = function() {
//     modals[i].style.display = "none";
//   };
// }


// For showcasing:

// function openQRCamera(node) {
//   var reader = new FileReader();
//   reader.onload = function() {
//     node.value = "";
//     qrcode.callback = function(res) {
//       if (res instanceof Error) {
//         location.href = "localhost/magikerensrejse/badge-received/";
//       } else {
//         location.href = "localhost/magikerensrejse/badge-received/";
//       }
//     };
//     qrcode.decode(reader.result);
//   };
//   reader.readAsDataURL(node.files[0]);
// }