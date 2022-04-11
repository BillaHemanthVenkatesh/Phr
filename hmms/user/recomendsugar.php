<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblbp where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'history-bp.php'</script>";     


}
  
?>
<!DOCTYPE html>
<html lang="en">


<!-- patients23:17-->
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>PERSONAL HEALTH RECORD MANAGEMENT - History of Blood Pressure</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>
    <div class="main-wrapper">
      
   <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Recomendation</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-bp.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add BP</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
                                        <th>Diesease</th>
										<th>Range</th>
										<th>Medicine</th>
										<th>Food</th>
										<th>Hospital and Doctor</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
                            
$uid = $_SESSION['hmmsuid'];           
$sql="SELECT * from tblrecomend where Diesease='SUGAR'";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									<tr>
                                       <td><?php  echo htmlentities($row->Diesease);?></td>
										<td><?php  echo htmlentities($row->Rang);?></td>
										<td><?php  echo htmlentities($row->Medicine);?></td>
										<td><?php  echo htmlentities($row->Food);?></td>
										<td><?php  echo htmlentities($row->Hospital);?></td>
										
									</tr>
						<?php $cnt=$cnt+1;}} ?>
								</tbody>
							</table>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html><?php }  ?>