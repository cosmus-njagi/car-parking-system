<?php
// Initialize the session
session_start();
			 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: login.php");
exit;
}
 include_once('config1.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <title>Bookings</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <!--Car slider -->
  <link href="css/car_slider.css" rel="stylesheet" />
</head>

<body>

<!-- Car slider -->


<!-- End of car slider -->


  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

     <!--logo start-->
      <a href="index.html" class="logo">Welcome <span class="lite">Back</span></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
			
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
		    
          <li class="">
            <a class="" href="booking.php">
                          <i class="icon_house_alt"></i>
                          <span>Home</span>
                      </a>
          </li>
          <li>
            <a class="" href="contact.php">
                          <i class="icon_genius"></i>
                          <span>Contact us</span>
                      </a>
          </li>
		  <li>
		  <a class="" href="mybookings.php">
                          <i class="icon_genius"></i>
                          <span>My bookings</span>
                      </a>
          </li>
		  <li>
		   <a class="" href="termsview.php">
                          <i class="icon_genius"></i>
                          <span>Policy</span>
                      </a>
          </li>
		           
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
				

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        <!-- page start-->
         <?php
				$condition	=	'';
				if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
					$condition	.=	' AND id LIKE "%'.$_REQUEST['id'].'%" ';
				}
				if(isset($_REQUEST['c_location']) and $_REQUEST['c_location']!=""){
					$condition	.=	' AND c_location LIKE "%'.$_REQUEST['c_location'].'%" ';
				}
				if(isset($_REQUEST['c_street']) and $_REQUEST['c_street']!=""){
					$condition	.=	' AND c_street LIKE "%'.$_REQUEST['c_street'].'%" ';
				}
				$userData	=	$db->getAllRecords('mybookings','*',$condition,'ORDER BY id DESC');
		?>
   	<div class="container">
		<div class="card">
			
			<div class="card-body">
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find Parking</h5>
					<form method="get">
						<div class="row">
                        <div class="col-sm-2">
								<div class="form-group">
									<label>Parking Id</label>
									<input type="number" name="id" id="id" class="form-control" value="<?php echo isset($_REQUEST['id'])?$_REQUEST['id']:''?>" placeholder="Enter location id">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Location</label>
									<input type="text" name="c_location" id="c_location" class="form-control" value="<?php echo isset($_REQUEST['c_location'])?$_REQUEST['c_location']:''?>" placeholder="Enter location">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Street</label>
									<input type="tel" name="c_street" id="c_street" class="form-control" value="<?php echo isset($_REQUEST['c_street'])?$_REQUEST['c_street']:''?>" placeholder="Enter street">
								</div>
							</div>
						    <div>
							 <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
							 <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
							</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
				  <th><i class=""></i> ID</th>
                    <th><i class=""></i> Location</th>
                    <th><i class=""></i> Street</th>
                    <th><i class="t"></i> Parking name</th>
                    <th><i class=""></i> Price</th>
                    <th><i class=""></i> Time</th>
                    <th><i class=""></i> Status</th>
					<th><i class=""></i> Action</th>
                  </tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<td><?php echo $val['id'];?></td>
						<td><?php echo $val['c_location'];?></td>
						<td><?php echo $val['c_street'];?></td>
						<td><?php echo $val['c_name'];?></td>
						<td><?php echo $val['c_price'];?></td>
						<td><?php echo $val['created_at'];?></td>
						<td><?php echo $val['c_pending'];?></td>
						<td>
						<div class="btn-group">
                        <a class="btn btn-danger deletebtn" href="" data-toggle="modal" data-target="#deletemodal"><i class="icon_close_alt2"></i>Delete</a>
                        </div></td>
					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
			<!--######################## Delete modal form  ***********************************-->
                      <div class="modal fade" id="deletemodal">
                        <div class="modal-dialog modal-md">
                          <form action="deletebookings.php" method="POST">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirm</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
							   
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
							  <input type="hidden" name="delete_id" id="delete_id">
                              <h4>Do you really want to delete this booking?</h4>
                          </div>
                            <div class="modal-footer justify-content-between">
							<button type="submit" name="deletedata" class="btn btn-primary"><i class="fa fa-check"></i> YES</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                            </div>
                          </div>
                          </form>
                        </div>
   					</div>
        
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <!-- Car slider scrip -->
 <script src="js/car_slider.js"></script>
 <script>
  $(document).ready(function (){
    $('.deletebtn').on('click', function(){

      $('#deletemodal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);
     

    });

  });
  </script>
</body>

</html>
