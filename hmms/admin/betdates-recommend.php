<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsaid']==0)) {
  header('location:logout.php');
  } else{
	  
	  if(isset($_POST['submit']))
  {

 $fname=$_POST['fname'];
 $rge=$_POST['rge'];
 $age=$_POST['age'];
 $food=$_POST['food'];
 $hd=$_POST['hd'];
 
$sql="insert into tblrecomend(Diesease,Rang,Medicine,Food,Hospital)values(:fname,:rge,:age,:food,:hd)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':rge',$rge,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':food',$food,PDO::PARAM_STR);
$query->bindParam(':hd',$hd,PDO::PARAM_STR);
 $query->execute();
 echo '<script>alert("Your Recommendation has been added successfully")</script>';
echo "<script>window.location.href ='betdates-recommend.php'</script>";

  
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<title>Welcome Admin Panel Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
       <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">

             <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title">Add Recommendation</h4>
                        <form method="post">
                               
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Diesease</label>
                                <div class="col-md-10">
                                    <input type="text" value="" name="fname" required="true" class="form-control">
                                </div>
                                </div>
							<div class="form-group row">
                                    <label class="col-form-label col-md-2">Range</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" name="rge" required="true" class="form-control">
                                    </div>
                                </div>
							<div class="form-group row">
                                    <label class="col-form-label col-md-2">MEDICINE</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" name="age" required="true" class="form-control">
                                    </div>
                                </div>
							<div class="form-group row">
                                    <label class="col-form-label col-md-2">FOOD</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" name="food" required="true" class="form-control">
                                    </div>
                                </div>
							<div class="form-group row">
                                    <label class="col-form-label col-md-2">Hospital Doctor</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" name="hd" required="true" class="form-control">
                                    </div>
                                </div>
							<div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Add</button>
                            </div>
                        </form>
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
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>
</html><?php }  ?>