<?php 

/* CONNECT TO THE SERVER */
include("config.php");

get_header();
/*
Template name: Badge Received NEW

THIS IS THE CONFIRMATION PAGE FOR RECEIVING A BADGE MAIN FILE
*/



?>
<section class="mainsection badgeReceived">

<?php 

//$userCookie = $_COOKIE['user']; //Henter brugernavnet på den bruger, der er logget ind
// $userCookie  = $_COOKIE['user']; 

$userCookie = 87654327;


// The badge ID:
$badgeReceivedId = $_GET['bid'];

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
}; ?>

<?php

// Her checkes om brugeren allerede har opnået dette badge:
$checkBadgeSql = "SELECT `userId`, `badgeId` 
                    FROM `userbadge` 
                    WHERE `userId` = $userCookie 
                    AND `badgeId` = $badgeReceivedId";
//Query sendes med db-forbindelse
$checkBadgeQuery = $con->query($checkBadgeSql);

    if($checkBadgeQuery->num_rows > 0){
        // Hvis brugeren har dette badge:
        // echo '<script language="javascript">';
        // echo 'alert("Du har allerede opnået dette badge!");';
        // echo 'location.href="localhost/magikerensrejse/badges";';
        // echo 'console.log("Badge allerede opnået");';
        // echo '</script>';


    } else {
        
        // // Hvis brugeren ikke har dette badge:
        // //Her tilføjes det nye badge til brugeren
        //     $addBadgeSql = "INSERT INTO `userbadge`(`userId`, `badgeId`) VALUES ($userCookie, $badgeReceivedId)";
        // //Query sendes med db-forbindelse
        //     $addBadgeQuery = $con->query($addBadgeSql);
    }

            //Her hentes de badges, som brugeren har
        $selectBadgeSql = "SELECT badge.badgeId as badgeId
                        FROM badge, userbadge
                        WHERE userbadge.userId =  $userCookie
                        AND userbadge.badgeId = badge.badgeId
                        AND userbadge.badgeId IN (1,2,3,4,5,6,7,8,9,10,11,13,14,15,16,17,18,19,20,21)
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
                    $badge_1 = in_array(0, $badgeArray);
                    $badge_2 = in_array(1, $badgeArray);
                    $badge_3 = in_array(4, $badgeArray);
                    $badge_4 = in_array(5, $badgeArray);

                    //check for 'Alkymist' badges
                    $badge_5 = in_array(6, $badgeArray);
                    $badge_6 = in_array(7, $badgeArray);
                    $badge_7 = in_array(8, $badgeArray);
                    $badge_8 = in_array(9, $badgeArray);

                    //check for 'Quidditch stjerne' badges
                    //NOTE: nr. 12 springes over!
                    $badge_9 = in_array(10, $badgeArray);
                    $badge_10 = in_array(11, $badgeArray);
                    $badge_11= in_array(12, $badgeArray);
                    $badge_13 = in_array(13, $badgeArray);

                    //check for 'Dragetæmmer' badges
                    $badge_14 = in_array(14, $badgeArray);
                    $badge_15 = in_array(15, $badgeArray);
                    $badge_16 = in_array(16, $badgeArray);
                    $badge_17 = in_array(17, $badgeArray);

                    //check for 'Erfaren Magiker' badges
                    $badge_18 = in_array(18, $badgeArray);
                    $badge_19 = in_array(19, $badgeArray);
                    $badge_20 = in_array(20, $badgeArray);
                    $badge_21 = in_array(21, $badgeArray);
                    }
        ?>


<!--Her starter while loop for pages-->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php

    function fred($val){
        echo "<pre>";
        print_r( $val );
        echo "</pre>";
    }


    // Get the Id of the journey of the badge:
    $checkBadgeJourneyQuery = "SELECT `journeyId` FROM `badge` WHERE `badgeId` = $badgeReceivedId";
    $checkBadgeJourneyResult = $con->query($checkBadgeJourneyQuery);

        while ($row = $checkBadgeJourneyResult->fetch_assoc()){
            $journeyId = $row['journeyId'];
            // echo "$journeyId";
        };

    $checkJourneyBadgesQuery = "SELECT badgeId FROM badge WHERE journeyId = $journeyId";
    $checkJourneyBadgesResult = $con->query($checkJourneyBadgesQuery);

        $jBadgeArray = array();
        while($row = $checkJourneyBadgesResult->fetch_assoc()){
            foreach ($row as $key => $value) {
                array_push($jBadgeArray, $value);
            };
        };

    

    // The Journey information:
        $jParams = array('where' =>"rejse_id.meta_value = $journeyId", 'limit' => 1);
        $journeyInfo = new Pod('rejse', $jParams);
        $journeyInfo->findRecords($jParams);

            $journeyName = $journeyInfo->get_field('navn');
            $journeyImage = $journeyInfo->get_field('billede.guid');
      


      //Henter data fra pods plugin i wordpress (Badges)
      $params = array('where' => "badge_id.meta_value = $badgeReceivedId",
      'limit'   => 1 );

      $badges = new Pod('badges', $params);
      $badges->findRecords($params);
      $total_badges = $badges->getTotalRows();
      //For hver Pod
          $title = $badges->get_field('badge_title');
          $badgeImage = $badges->get_field('badge_image.guid');
          $eventLink = $badges->get_field('event_id');
          $bEvent = $badges->get_field('badge_event_description');

    ?>

<section class="mainsection badgeReceived">
<div class="badgeReceivedMsg">
<h2>Tillykke!</h2>
<h1>Du <?php echo $bEvent; ?></h1>
<img class="badgeReceivedImage" src="<?php echo $badgeImage; ?>" alt="">
<img id="progressJourneyBadge" src ="<?php echo $journeyImage;?>" class="badgeIcon badgeIcon5">
<div class="journeyProgress">
<div class="progressBar">
<div id="progressbar"class="progress "></div>
</div>

<script defer>

    
    // DOM variables:
    var progressBadge1 = document.getElementById("progressBadge1");
    var progressBadge2 = document.getElementById("progressBadge2");
    var progressBadge3 = document.getElementById("progressBadge3");
    var progressBadge4 = document.getElementById("progressBadge4");

    var journeyBadge = document.getElementById("progressJourneyBadge");
    var progress = document.getElementById("progressbar");
    
    progress.style.width="0%";

    switch(<?php echo $journeyId ?>){
        case 0:
        progress.classList.add("progressColorMagiker");
        break;
        case 1:
        progress.classList.add("progressColorAlkymist");
        break;
        case 2:
        progress.classList.add("progressColorQuidditch");
        break;
        case 3:
        progress.classList.add("progressColorVogter");
        break;
        case 4:
        progress.classList.add("progressColorErfaren");
        break;
    };

     <?php 
        // Get the remaining badges in the journey and style them as well as the progressbar:
        $jBadgeI = 1; //the iteration of the foreach Loop
        $badge = "badge"; //The name of the class
        $leftOffset = 20;
        $rightOffset = 95;
        $progress = 0;

                foreach ($jBadgeArray as $value) {
                    $jBadgeId = $badge.$value;

                    $badgesAcquiredQuery = "SELECT badgeId 
                                FROM userBadge 
                                WHERE userId = $userCookie 
                                AND badgeId = $value";
                        $badgesAcquiredResult = $con->query($badgesAcquiredQuery);

                    echo "</script><div id='progressBadge$jBadgeI'"; 
                    
                    if($badgesAcquiredResult->num_rows >0){
                        echo "style='left:$leftOffset%;'";
                        $leftOffset = $leftOffset + 25;
                        $progress++;
                    } else {
                        echo "style='left:$rightOffset%;'";
                        $rightOffset = $rightOffset - 25;
                    };
                    
                    echo "class='badgeIcon $jBadgeId'></div><script>";
                    // echo "$jBadgeI";
                     $jBadgeI++;
                };
                ?>

                 var progressAmount = <?php echo $progress?> * 25;
                console.log("pogressAmount is:" + progressAmount);
                setTimeout(function(){
                    progress.style.width=progressAmount+"%";
                }, 500);



    </script>
</div>

<p class="retningMsg">Du er nu et skridt tættere på at blive <?php echo $journeyName; ?>!</p>
</div>

<div class="badgeReceivedBackBtn">

<!-- CHANGE THIS WHEN UPLOADING TO LIVE -->
<a href="http://localhost/magikerensRejse/badges">Tilbage</a>

</div>

</section>

<?php 
       endwhile;
endif;
?>

<script>
console.log("<?php echo $fetchUserRow['magicalName']; ?>");
console.log("<?php echo $magicalName;?>");
console.log("<?php echo $userCookie;?>");
</script>


</section>



<!-- Her slutter script til lightboxes -->
<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/background.jpg" alt="background">
<?php get_footer(); ?>