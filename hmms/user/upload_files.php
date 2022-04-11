<?php
$target_dir = "docs/";
$target_file = $target_dir . basename($_FILES["bp_doc"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["bp_doc"]["tmp_name"]);

 echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
}
?>