<?php 
// include("cookieRedirect.php");

ob_start();
get_header();

/* CONNECT TO THE SERVER */
include("config.php");

/*
Template name: Badges

THIS IS THE MAIN PAGE/HOME PAGE MAIN FILE
*/
?>
<?php

//$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
// $userCookie = $_COOKIE['user']; IMPORTANTEDIT

$userCookie = 87654327;

//Query til at hente magiske navn via telefonnummer
$fetchUser = "SELECT user.magicalName FROM user WHERE phoneNo = $userCookie";

//Sender query med db-forbindelse
$fetchUserQuery = $con->query($fetchUser);

//Tjekker om resultat er mere end 0
if($fetchUserQuery->num_rows > 0){
  //For hver række i resultatet
  while($fetchUserRow= $fetchUserQuery->fetch_assoc()){
    //Variabler
    $magicalName = $fetchUserRow['magicalName'];
  } 
}else if($fetchUserQuery->num_rows <= 0){
    $magicalName = 'Magiker Navn';
  };

//Her hentes de badges, som brugeren har
$selectBadgeSql = "SELECT badge.badgeId as badgeId
                FROM badge, userbadge
                WHERE userbadge.userId =  $userCookie
                AND userbadge.badgeId = badge.badgeId
                AND userbadge.badgeId IN (0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)
                GROUP BY badge.badgeId;";

//Query sendes med db-forbindelse
$selectBadgeQuery = $con->query($selectBadgeSql);

//Tjekker om resultatet er mere end 0
if($selectBadgeQuery->num_rows > 0){
  //Tomt array oprettes
  $badgeArray = array();
  //For hver række i resultatet
  while ($selectBadgeRow = $selectBadgeQuery->fetch_assoc()) {
    //Hvert resultat føjes til det tomme array
    foreach ($selectBadgeRow as $key => $value) {
      array_push($badgeArray, $value);
    };
  };


  //check for 'Magiker' badges
  $badge_0 = in_array('0', $badgeArray);
  $badge_1 = in_array('1', $badgeArray);
  $badge_2 = in_array('2', $badgeArray);
  $badge_3 = in_array('3', $badgeArray);

  //check for 'Alkymist' badges
  $badge_4 = in_array('4', $badgeArray);
  $badge_5 = in_array('5', $badgeArray);
  $badge_6 = in_array('6', $badgeArray);
  $badge_7 = in_array('7', $badgeArray);

  //check for 'Quidditch stjerne' badges
  $badge_8 = in_array('8', $badgeArray);
  $badge_9 = in_array('9', $badgeArray);
  $badge_10 = in_array('10', $badgeArray);
  $badge_11= in_array('11', $badgeArray);

  //check for 'Dragetæmmer' badges
  $badge_12 = in_array('12', $badgeArray);
  $badge_13 = in_array('13', $badgeArray);
  $badge_14 = in_array('14', $badgeArray);
  $badge_15 = in_array('15', $badgeArray);

  //check for 'Erfaren Magiker' badges
  $badge_16 = in_array('16', $badgeArray);
  $badge_17 = in_array('17', $badgeArray);
  $badge_18 = in_array('18', $badgeArray);
  $badge_19 = in_array('19', $badgeArray);
}


?>

<!--Her starter while loop for pages-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php

    // empty arrays for the various information:
      $podBadgeImageArr = array();
      $podBadgeTitleArr = array();
      $podBadgeIdArr = array();
      $podBadgeEventIdArr = array();

      $podJourneyId = array();
      $podJourneyName = array();
      $podJourneyImage = array();


      //Henter data fra pods plugin i wordpress (Badge Lightbox)
      $params = array('orderby' => 'badge_id ASC', 'limit' => -1);
      $badges = new Pod('badges', $params);
      $badges->findRecords($params);
      $total_badges = $badges->getTotalRows();
      //For hver Pod
      while ($badges->fetchRecord($params)) {
          $title = $badges->field('badge_title');
          $badgeImage = $badges->field('badge_image.guid');
          $eventId = $badges->field('event_id');
          $badgeRetning = $badges->field('badge_retning');
          $Id = $badges->field('badge_id');
          $badgeId = (int)$Id;

          array_push($podBadgeImageArr, $badgeImage);
          array_push($podBadgeTitleArr, $title);
          array_push($podBadgeEventIdArr, $eventId);
          array_push($podBadgeIdArr, $badgeId);
          
          ?>



     <?php }; //Her slutter while, der tjekker badges 
     ?>

     <?php  // The Journey information:
        $jParams = array('orderby' =>'rejse_id ASC','limit' => -1);
        $journeyInfo = new Pod('rejse', $jParams);
        $journeyInfo->findRecords($jParams);


        while($journeyInfo->fetchRecord($jParams)){
              $journeyId = $journeyInfo->get_field('rejse_id');
              $journeyName = $journeyInfo->get_field('navn');
              $journeyImage = $journeyInfo->get_field('billede.guid');

          array_push($podJourneyId, $journeyId);
          array_push($podJourneyName, $journeyName);
          array_push($podJourneyImage, $journeyImage);
        };

          // echo "<script>console.log('$podJourneyName')</script>";

            ?>
              <!--Her begynder Badge sektionen-->
              <section class="badgeIndex">
                <h2 id="welcome">Velkommen</h2>
                <!--Ribbon, start-->
                <div class="ribbonContainer">
                    <h3 class="magicalName"><?php echo $magicalName; ?></h3>
                    <img class="ribbon" src="<?php echo get_stylesheet_directory_uri();?>/img/ribbon.png" alt="Ribbon">
                </div><!--Ribbon, slut-->


          

          
          
          
          <!--Her begynder slickcontainer med slickitems-->
          <div class="slickContainer badgeContainer">

              <?php 

              // iteration counters:
              $slickJourneyI = 0;
              $slickBadgeI = 0;

              // arrays:
              $journeyNames = array('magiker', 'alkymist', 'vogter', 'quidditch', 'erfaren');
              $badgePositions = array('top-left', 'top-right', 'bottom-left', 'bottom-right');

              // loops:
              foreach ($podJourneyId as $iteration) {
                // slickItem starts:
                  $slickJourneyName = $journeyNames[$slickJourneyI];
                  $slickJourneyImage = $podJourneyImage[$slickJourneyI];

                echo "<div class='badge slickItem' id='$slickJourneyName'>";
                echo " <img class='journeyBadge' src='$slickJourneyImage'>";
                for ($i=0; $i < 4; $i++) { 

                  $slickBadgeImage = $podBadgeImageArr[$slickBadgeI];
                  $slickBadgePosition = $badgePositions[$i];
                  $currentBadgeId = 'badge'.'_'.$slickBadgeI;

                  // badge starts:
                    echo "<div id='badge$slickBadgeI' class='badgeImg $slickBadgePosition mainBadgeTitle'>";
                    echo "<img src='$slickBadgeImage' class='badgeActualImg"; 
                    // echo "<script> console.log($slickBadgeI) </script>";
                    if($currentBadgeId == true){
                      echo " badgeAcquired";
                    }
                    echo " '></div>";
                    $slickBadgeI++;
                    // echo "<script> console.log($slickBadgeI) </script>";
                }//end of for loop
                
                echo "</div>"; //end of the slick box item
                $slickJourneyI++;
              }; //end of foreach loop
              
              ?>
                </div><!--Her slutter slickcontaineren med slickitems-->
        </section><!--Her slutter badge sektionen-->
    <?php endwhile;?>
<?php endif;?>

<!--Her starter scriptet til slickcontaineren (Basically pile frem og tilbage)-->
<script type="text/javascript">
  $(document).ready(function () {
      $(".slickContainer").slick({
        prevArrow:"<img class='slick-prev' src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowLeft.png'>",
        nextArrow:"<img class='slick-next' src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png'>"
      }).slick('slickFilter', '.slickItem');
     
  });
</script>
<!--Her slutter script til slickcontainer-->


<!-- Her startet script til lightboxes -->
<script>
    var badgeTitle = document.getElementsByClassName('mainBadgeTitle');
    var modals = document.getElementsByClassName('modal');
    var badges = document.getElementsByClassName('badgeImg');
    var darkOverlay = document.getElementById('darkoverlay');

    //Her tilføjes click funktion til hvert badge
    for(let i = 0; i < badges.length; i++){
        badges[i].onclick = function(){
            darkOverlay.style.display="block";
            modals[i].style.display = "block";
            console.log("This works");
        }
    };

    var span = document.getElementsByClassName("close");
    //Her tilføjes click funktion til hvert close-ikon
    for(let i = 0; i <span.length; i++){
        // When the user clicks on <span> (x), close the modal
        span[i].onclick = function() {
            darkOverlay.style.display="none";
            modals[i].style.display = "none";
        }
    };
    
    //Her tilføjes click funktion til hvert baggrunden for modalboksen
    for(let i = 0; i <span.length; i++){
      darkOverlay.onclick = function() {
          darkOverlay.style.display="none";
          modals[i].style.display = "none";
      }
    };
</script>
<!-- Her slutter script til lightboxes -->
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<?php get_footer(); ?>