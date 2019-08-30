<?php

ob_start();

// if (isset($_COOKIE['user'])){
//   header("location: https://mr.1221s.com/badges");
// }

/* CONNECT TO THE SERVER */
include("config.php");
?>

<?php 

get_header();
/*
Template Name: Login

THIS IS THE MAIN LOGIN PAGE MAIN FILE
*/
?>

<!--Her begynder desktop section-->
<section class="desktopMainSection">
  <h1>Begynd din magiske rejse på din smartphone!</h1>
  <h3>Scan QR koden og oplev magien</h3>
  <!-- MAKE NEW QR CODE IMPORTANTEDIT -->
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/qr.png" alt="QR-kode">
</section>
<section class="desktopBottomLinks">
<span>   <a href="https://magiskedageodense.dk/" target="_blank"><u>Magiske Dage Odense</u></a> </span>
<span>   <a href="https://www.odensebib.dk/" target="_blank"><u>Odense Biblioteker</u></a> </span>
<span>   <a href="https://www.odense.dk/" target="_blank"><u>Odense Kommune</u></a> </span>
</section>

<div class="darkOverlay"></div>
<!--Her slutter desktop section-->

<!--Her begynder mainsection-->
<section class="mainsection">

<!--Her begynder Loginformularen-->
<div class="loginPaper" id="loginPaper">
  <!-- background image to login information -->
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="loginPaper" class="loginPaperBG">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/waxsealRED.png" alt="loginPaper" class="loginPaperBG waxseal">

  <!-- Log ind form -->
  <form id="loginForm" class="logInForm" method="post" action="">
    <!-- 'brugernavn' -->
    <input type="number" name="phoneNo" value="" placeholder="Telefonummer..."><br/>
    <!-- Password -->
    <input id="mPassword" type="password" name="mPassword" value="" placeholder="Magisk Kodeord ..."><br/>
    <!-- log ind knap -->
    <input type="submit" name="logIn" value="Log Ind" class="submitBtnLogin">
  </form> <!-- end log ind form -->
</div> <!--Her slutter Loginformularen-->

<?php
// Log ind funktionalitet
//if 'log ind' is pressed:
  if (isset($_POST['logIn'])) {
    $phoneNo = $_POST['phoneNo'];
    $mPassword = $_POST['mPassword'];
  
    //sql query to ask for the password where it matches the phone number given
    $sqlCheckLogin = "SELECT `mPassword` FROM `user` WHERE `phoneNo` = $phoneNo";
      $sqlLoginQuery = $con->query($sqlCheckLogin);
    
      //Hvis der er flere end 0 resultater
      if($sqlLoginQuery->num_rows > 0){
        while($sqlQueryResult = $sqlLoginQuery->fetch_assoc()) {
          $sqlPassword = $sqlQueryResult['mPassword'];
            if ($sqlQueryResult['mPassword'] === $mPassword) {
              //If the password is correct:
              setUserCookie($phoneNo);
              //echo "This is the cookie: " .$_COOKIE['user'];
              header("location: https://mr.1221s.com/badge/");
            
            }//Her slutter password check
        }//Her slutter while
      }//Her slutter if > 0
  }//Her slutter if(isset)
?>

<!-- Image of an enevelope in the background -->
<img class="konvolutLoginSkærmImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/konvolutbg.png" alt="konvolutbg">


<!--Her begynder Optagelsekonvolut-->
<div class="konvolutLoginSkærm" id="konvolutLoginSkærm">

<!-- Getting the data -->
<!--Starter while loop for pages-->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- getting the data for the letter -->
    <?php

      //Her hentes data fra Pod plugin i wordpress (Brev)
      $params = array(
          'orderby' => 'pagenumber.meta_value ASC',
      );
      $oprettelsesBrev = new Pod('brev', $params);
      $oprettelsesBrev->find($params);
      $total_pages = $oprettelsesBrev->getTotalRows();

  
      // empty arrays for the information:
        $pageImgArray = array();
        $pageIdArray = array();
        $pageTitleArray = array();
        $pageContentArray = array();
      

      while ($oprettelsesBrev->fetch()) {
        $pageImg = $oprettelsesBrev->field('image.guid');
        $pageId = $oprettelsesBrev->field('pagenumber.meta_value');
        $pageTitle = $oprettelsesBrev->field('titel');
        $pageContent = $oprettelsesBrev->field('pagecontent');


        // Add array pushes here
        array_push($pageImgArray, $pageImg);
        array_push($pageIdArray, $pageId);
        array_push($pageTitleArray, $pageTitle);
        array_push($pageContentArray, $pageContent);

    };  //end of fetchRecord while for oprettelsesbrev
    array_multisort($pageIdArray, $pageContentArray, $pageTitleArray, $pageImgArray);
    ?>

    <?php 
    // Variables for the page-slickbox:
      $slickPageI = 0;
      $slickImgI = 0;

    ?>

    <div class="slick-slider" id="paperImageScroller">
      <?php 
    foreach ($pageIdArray as $value) {
      $currentSlickimg = $pageImgArray[$slickImgI];
      echo "<div class='imageScrollerContainer'><img class='imageScrollerImg' src='$currentSlickimg'></div>";
      $slickImgI++;
    };
      ?>
    </div>

<!--Her begynder optagelseskonvolut-->
<div class="envelope" id="envelopeOprettelse"><!--Konvolut, start-->
  <div class="paper" id="envelopePaper"><!--Papir, start-->
      <div id="initialPaperContent">
        <p>
           Start din rejse her!
        </p></div>
    <div class="paper-slickBox" id="paperContent"><!--Papirtekst, start-->
      <?php 
      foreach ($pageIdArray as $value) {
          $currentSlickContent = $pageContentArray[$slickPageI];
          $currentSlickTitle = $pageTitleArray[$slickPageI];

        echo "<div class='slickbox-page'>";
        echo "<h3>$currentSlickTitle</h3>";
        echo "<p>$currentSlickContent</p>";
        echo "</div>";

        $slickPageI++;
      }
      // Add the content of the page here
      ?>
    </div><!--Papirtekst, slut-->
    <a class="jumper" href="CHANGE THIS LINK IMPORTANTEDIT">Spring introduktionen over</a>
  </div><!--Papir, slut-->
</div><!--Konvolut, slut-->

<a href="localhost/magikerensRejse/oprettelse"id="lastSlidePaper"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/loginPaper.png" alt="the last slide paper">
<p>Fortsæt til Oprettelse</p></a>

<?php endwhile; ?>
    <?php  endif;?>
</section><!--Her slutter main section-->

<script>
function slickBoxes(){
  $('.slick-slider').slick({
    arrows: false,
    infinite: false
  });

  $('.paper-slickBox').not('.slick-initialized').on('afterChange', function(event, slick, currentSlide){
    if(slick.$slides.length == currentSlide + slick.options.slidesToScroll) {
      console.log("last Slide");
      // IF CURRENT SLIDE IS LAST SLIDE:
      var lastSlidePaper = document.getElementById("lastSlidePaper");

      lastSlidePaper.style.right="-10vw";
    } else {
      var lastSlidePaper = document.getElementById("lastSlidePaper");

      lastSlidePaper.style.right="-55vw";
    };
  }).slick({
    asNavFor: '.slick-slider',
    dots: true,
    infinite:false,
    prevArrow:"<img class='slick-prev' src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowLeft.png'>",
    nextArrow:"<img class='slick-next' src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowRight.png'>"
      
  })
}

$(document).ready(slickBoxes);



</script>

<!-- baggrundsbillede -->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

</body>
</html>