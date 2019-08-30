<?php

// include("cookieRedirect.php");

ob_start(); 

/* CONNECT TO THE SERVER */
include("config.php");
get_header();
/*
Template Name: Oprettelse
*/
?>

<!-- CONNECTION TO SERVER -->

<?php
?>


<!--Her begynder mainsection-->
<section class="mainsection">

  <!--Her begynder oprettelsesformularen-->
  <div id="createUserFormWrapper" class="createUserFormWrapper"> 
    <!--Formular, start-->
    <form id="createUserForm" method="post" enctype="multipart/form-data">

    <!-- action="/magikerensrejse/badges/" -->

      <div class="slickWrapper">
      <!--Første form sektion, start-->
            <div id="firstFormSection" class="formSection">
              <h3>Hvem starter denne rejse?</h3>

              <input class="large-input" id="mName" type="text" name="mName" placeholder="Magisk Navn">
              <input class="large-input" id="password" type="text" name="mPassword" placeholder="Adgangskode"><br/>


              <input class="checkbox" id="age" type="checkbox" name="mAge" value="1"> Jeg er over 18 år<br/>

              <select class="area large-select" name="mArea">
                <option selected>Hvor er du fra?</option>
                <option value="1">Fyn</option>
                <option value="2">Sjælland</option>
                <option value="3">Nordjylland</option>
                <option value="4">Sønderjylland</option>
                <option value="5">Bornholm</option>
                <option value="6">Andetsteds</option>
              </select>

              <select id="gender" class="small-select" name="mGender">
                <option selected>Køn</option>
                <option value="1">Heks</option>
                <option value="0">Troldmand</option>
              </select><br/>
      </div><!-- Første form sektion, slut-->       
                        
      <!--Anden form sektion, start-->
      <div id="secondFormSection" class="formSection">
                      <h3>Vælg dit element</h3>

                      <div class="elementContainer">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php  
                      

                      // empty arrays for the data from pods:
                        
                        $elementIdArray = array();
                        $elementnavnArray = array();
                        $elementImgArray = array();

                          //Henter data fra pods plugin i wordpress (Badge Lightbox)
                        $params = array('orderby' => 'element_id ASC', 'limit' => -1);
                        $badges = new Pod('element', $params);
                        $badges->findRecords($params);
                        $total_badges = $badges->getTotalRows();
                        //For hver Pod
                        while ($badges->fetchRecord($params)) {
                            $navn = $badges->field('navn');
                            $iniElementId = $badges->field('element_id');
                            $elementImg = $badges->field('emblem.guid');
                            $elementId = (int)$iniElementId;
                            
                            array_push($elementIdArray, $elementId);
                            array_push($elementnavnArray, $navn);
                            array_push($elementImgArray, $elementImg);

                        };
                        
                        for ($i=0; $i < 4; $i++) { 

                          $currentelementImg = $elementImgArray[$i];
                          echo "<label class='elementChildLabel'>";
                          echo "<input type='radio' " ;
                          echo "name='mElement' ";
                          echo "value='$elementIdArray[$i]' ";
                          echo "id='$elementnavnArray[$i]' ";
                          echo "class='elementChild' >";

                          echo "<img src='$currentelementImg' class='elementImg' alt='The image for $elementnavnArray[$i]'>";

                          echo "</label>";
                        };
                        
                            ?>

                          <?php
                          endwhile; endif;
                          ?>
                              </div>


                            <p>Du kan blive sorteret på Odense Katedralskole, 
                            eller du kan vælge dit element helt frit lige her!</p>

                            <p>Odense Katedralskole ligger på:</p>
                            <p>Adresse 123, 5000 Odense C</p>

            
          </div><!--Anden form sektion, slut-->

      <!--Tredje form sektion, start -->
      <div id="thirdFormSection" class="formSection">
                          <h3>Magisk Portræt</h3>

                          <div class="formPortraitWrapper">
                            <img id="formPreviewImage"src="<?php echo get_stylesheet_directory_uri(); ?>/img/portraits/pm-icon.png" alt="the default Icon">
                          </div>

                          <!--Vælg billede-->
                          <label for="mImage" class="custom-file-upload">
                          <i class="fas fa-camera"></i><br/>
                          Vælg et billede fra telefonen
                          </label>
                          <input id="mImage" type="file" name="mImage" onchange="">

                          <script>
                            var mImage = document.getElementById("mImage");
                            mImage.addEventListener('change', function() {

                              alert("file has been uploaded!");
                          // $('#formPreviewImage').src= URL.createObjectURL(event.target.files[0]);
                          var previewImage = document.getElementById("formPreviewImage");
                          previewImage.src= URL.createObjectURL(event.target.files[0]);
                            });
                      </script>
      </div><!--Tredje form sektion, slut-->
  
      </div> <!-- END OF SLICK BOX -->

        <input id="submit" type="submit" name="submitUser" value="Gem oplysninger">
    </form> <!--Formular, slut-->
  </div><!--Her slutter oprettelsesformularen-->

</section> <!--Her slutter mainsection-->

<!--Baggrundsbillede-->
<img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">


<?php
//Oprettelsesfunktionalitet


//Her tjekkes om om submitUser er clicket
if (isset($_POST['submitUser'])) {

      //  if ($_FILES['createUserForm']['error']){
        
      //   if( !file_exists($_FILES['mImage']['tmp_name']) || !is_uploaded_file($FILES['mImage']['tmp_name'])) {
      //   echo "<script> alert('There was an error uploading your file. Please try again');</script>";
      // } 
      // } else {
      //   echo "<script>alert('File was uploaded succesfully');</script>";        
      // };

    // Variabler fra formularen
      // Første del af formular
      $mName = $_POST['mName'];
      $mGender = $_POST['mGender'];
      $mArea = $_POST['mArea'];
      $mAge = $_POST['mAge'];
      $mPassword = $_POST['mPassword'];
      
      if ($mAge == "1"){
        $mAge = "1";
      } else {
        $mAge = "0";
      };

      // Anden del af formular
      $mElement = $_POST['mElement'];

      // Tredje del af formular
      //Billedeupload
      $fileVer = 0;
      $target_dir = get_stylesheet_directory(). "/img/portraits/compressed/";
      $img_orig = basename($_FILES['mImage']['name']);
      $target_file = $target_dir . $img_orig;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      function file_exists_check(){
           if(file_exists($target_dir . $img_orig)) {
            $fileVer++;
            echo "file existed, trying" . $fileVer;
            file_exists_check();
      } else {
          // $versionedImgName = $_FILES['mImage']. "_" . $fileVer;
          echo "Unused version found, it is:" . " " . $fileVer;
                $upImage = "portrait_" . $fileVer . "." . $imageFileType;
                $final_target_file = $target_dir. $upImage;

      };}
      print_r(file_exists($target_dir . $img_orig));
      file_exists_check();
      echo "$fileVer";

      $uploadOk = 1;

      //Check om billedet er et rigtigt billede
      $check = getimagesize($_FILES['mImage']['tmp_name']);
        if($check !== false) {
          $uploadOk = 1;
          // print_r($check);
        } 
        else {
          $uploadOk = 0;
        }

      //  Godkendte filtyper
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        } else { $uploadOk = 1;}

        // // Final check if upload is okay:
        if ($uploadOk == 0) {
          echo "Dit billede blev ikke uploadet <br>";
          echo "$imageFileType <br>";
          echo "$upImage <br>";
          echo "$uploadOk <br>";
          echo "$target_dir<br>";
          echo "$target_file<br>";

        } else {
            if (move_uploaded_file($_FILES["mImage"]["tmp_name"], $final_target_file)) {
                echo "<script>alert('The file ". $upImage. " has been uploaded');</script>";
                // echo "$uploadOk";
            } 
            else {
                echo "<script>alert('Sorry, there was an error uploading your file');</script>";
                // echo "$uploadOk";
            }
        }

        // echo "after this starts the resizing:";
        
                        // resizing the image
        $maxHeight = 200;
        $maxWidth = 300;

        ini_set("memory_limit", "1024M");

        // finding the initial values:
        $width_orig = $check[0];
        $height_orig = $check[1];

        $ratio_orig = $width_orig/$height_orig;

        if($maxWidth/$maxHeight > $ratio_orgi) {
          $maxWidth = $maxHeight*$ratio_orig;
        } else {
          $maxHeight = $maxWidth/$ratio_orig;
        };

        // resample
        $image_p = imagecreatetruecolor($maxWidth, $maxHeight);
        $newImage = imagecreatefromjpeg($target_file);
        imagecopyresampled($image_p, $newImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $width_orig, $height_orig);

        $finalImage = imagejpeg($image_p, $target_file, 50);
        print_r($finalImage);
                


      // Send formulardata videre til databasen i user-entiteten
      $sqlCreateUser = "INSERT INTO user (mPassword, age, gender, magicalName, portrait, houseId, areaId)
      VALUES ('$mPassword','$mAge','$mGender','$mName','$upImage','$mElement','$mArea')";

      //Send query afsted med db-forbindelse IMPORTANTEDIT
      $con->query($sqlCreateUser);
      // echo "$mPassword <br>";
      // echo "$mAge<br>";
      // echo "$mGender<br>";
      // echo "$mName<br>";
      // echo "$mImage<br>";
      // echo "$mElement<br>";
      // echo "$mArea<br>";

      // header("location: https://localhost/magikerensrejse/badges");
}//Her slutter if (isset) 
?>

<script>

  var formWrapper = document.getElementById("createUserFormWrapper");
  // var formSection = document.getElementsByClass('formSection');
  var submit = document.getElementById("submit");

      $(document).ready(function(){
        // Functions for the document.ready function:
          slick();
      });


      function slick(){
        $('.slickWrapper').not('.slick-initialized').on('afterChange', function(event, slick, currentSlide){
    if(slick.$slides.length == currentSlide + slick.options.slidesToScroll) {
      console.log("last Slide");
      // IF CURRENT SLIDE IS LAST SLIDE:
      var lastSlidePaper = document.getElementById("submit");
      var nextArrow = document.getElementById("oprettelseNextArrow");

      nextArrow.style.opacity="0";
      lastSlidePaper.style.right="0px";
    } else {
      var nextArrow = document.getElementById("oprettelseNextArrow");
      var lastSlidePaper = document.getElementById("submit");
      lastSlidePaper.style.right="-250px";
      nextArrow.style.opacity="1";
    };
  }).slick({
              infinite:false,
             prevArrow:"<img class='slick-prev oprettelseArrow' src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowgoldLeft.png'>",
            nextArrow:"<img class='slick-next oprettelseArrow' id='oprettelseNextArrow' src='<?php echo get_stylesheet_directory_uri(); ?>/img/arrows/arrowgoldRight.png'>"

        })
      }



</script>
<!--Her slutter scriptet for dynamiske pile-->

</body>
</html>

<?php 
?>
