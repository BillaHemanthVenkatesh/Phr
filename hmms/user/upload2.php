<?php
$target_dir = "uploads/";
$target_file = $_FILES["fileToUpload"]["id"];
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

 echo $target_file;
    $uploadOk = 1;
}
?>