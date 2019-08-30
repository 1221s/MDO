<?php
  //Nanna Connect to server
  //COMMENT THIS OUT WHEN UPLOADING TO LIVE
  $host ="localhost";
  $user ="root";
  $pw ="";
  $db = "1221s_com_magikerensrejse";


//Darlene connect to server
// COMMENT THIS OUT WHEN UPLOADING TO LIVE
// $host = "localhost";
// $user = "Darlene"; 
// $pw = "Dgs55qhk:).."; 
// $db = "1221s_com_magikerensrejse"; 

// Nanna connect to live:
// $host = "1221s.com.mysql.service.one.com"; /* Host name */
// $user = "1221s_com_magikerensrejse"; /* User */
// $pw = "magikerensRejse:)"; /* Password */
// $db = "1221s_com_magikerensrejse"; /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $pw, $db);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<script>console.log("connected succesfully")</script>';
}
//echo "Connected successfully";


