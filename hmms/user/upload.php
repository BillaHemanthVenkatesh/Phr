<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$uid=$_SESSION['hmmsuid'];
 $fname=$_POST['fname'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $weight=$_POST['weight'];
 $relation=$_POST['relation'];

$sql="insert into tblmember(UserID,FullName,Gender,Age,Weight,Relation)values(:uid,:fname,:gender,:age,:weight,:relation)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':weight',$weight,PDO::PARAM_STR);
$query->bindParam(':relation',$relation,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your family member has been added successfully.")</script>';
echo "<script>window.location.href ='add-member.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Health Monitoring Management System - Add Member</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
    <div class="main-wrapper">
       
              <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Upload Files</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title">Upload Files</h4>
                            <form method="post" action="upload_files.php">
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">BP Report</label>
                                    <div class="col-md-10">
                                        <input type="file" value="" name="bp_doc" required="true" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-form-label col-md-2">Sugar Report</label>
                                    <div class="col-md-10">
                                        <input type="file" value="" name="sugar_doc" required="true" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Temperature Report</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control" value="" name="temp_doc" required="true">
                                    </div>
                                </div>
                                
                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                                </div>
                            </form>
                        </div>
                   
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- form-basic-inputs23:59-->
</html><?php }  ?>