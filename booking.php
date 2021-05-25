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

  <title>Homepage</title>

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
				<div class="text">
				<h2>Welcome to Hyat parking</h2>
				</div>
				<div class="text">
				<h3>Book your space on the table below or search by entering either id, location or name of the street.</h3>
				</div>

				<div class="slideshow-container" "d-flex justify-content-center">

				<div class="mySlides fade">
				  <div class="numbertext">1 / 3</div>
				  <img src="img/car1.jpg" style="width:100%">
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">2 / 3</div>
				  <img src="img/car2.jpg" style="width:100%">
				</div>

				<div class="mySlides fade">
				  <div class="numbertext">3 / 3</div>
				  <img src="img/car3.jpg" style="width:100%">
				</div>

				</div>
				<br>

				<div style="text-align:center">
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				  <span class="dot"></span> 
				</div>

								<?php
				$condition	=	'';
				if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
					$condition	.=	' AND id LIKE "%'.$_REQUEST['id'].'%" ';
				}
				if(isset($_REQUEST['location']) and $_REQUEST['location']!=""){
					$condition	.=	' AND location LIKE "%'.$_REQUEST['location'].'%" ';
				}
				if(isset($_REQUEST['street']) and $_REQUEST['street']!=""){
					$condition	.=	' AND street LIKE "%'.$_REQUEST['street'].'%" ';
				}
								
				$userData	=	$db->getAllRecords('spots','*',$condition,'ORDER BY id DESC');
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
									<input type="number" name="id" id="id" class="form-control" value="<?php echo isset($_REQUEST['id'])?$_REQUEST['id']:''?>" placeholder="Enter id number">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Location</label>
									<input type="text" name="location" id="location" class="form-control" value="<?php echo isset($_REQUEST['location'])?$_REQUEST['location']:''?>" placeholder="Enter location">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Street</label>
									<input type="tel" name="street" id="street" class="form-control" value="<?php echo isset($_REQUEST['street'])?$_REQUEST['street']:''?>" placeholder="Enter street">
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
				  <th><i class="icon_profile"></i> ID</th>
                    <th><i class=""></i> Location</th>
                    <th><i class=""></i> Street</th>
                    <th><i class=""></i> Parking name</th>
                    <th><i class=""></i> Price</th>
                    <th><i class=""></i> Directions</th>
					<th><i class=""></i> status</th>
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
						<td><?php echo $val['location'];?></td>
						<td><?php echo $val['street'];?></td>
						<td><?php echo $val['p_name'];?></td>
						<td><?php echo $val['price'];?></td>
						<td><?php echo $val['directions'];?></td>
						<td>pending</td>
						<td align="center">
						<div class="btn-group">
                        <a class="btn btn-success editbtn" href="#" data-toggle="modal" data-target="#edit"><i class="icon_check_alt2"></i>Book</a>
                        </div>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
         <!--######################## Confirmation modal form  ***********************************-->
                      <div class="modal fade" id="edit">
                        <div class="modal-dialog modal-md">
                          <form action="confirm.php" method="POST">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirm</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
							  Once you confirm, the data will be sent to admin pending approval. payments will automatically be deducted.
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Location</label>
                                  <input type="text" name="c_location" class="form-control" id="locid" readonly>
                                </div>
                              </div>
                                <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Street</label>
                                  <input type="text" name="c_street" class="form-control" id="location" readonly>
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Parking name</label>
                                  <input type="text" name="c_name" class="form-control" id="street" readonly>
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Price</label>
                                  <input type="text" name="c_price" class="form-control" id="price" readonly>
                                </div>
                              </div>
							                                  <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">direction</label>
                                  <input type="text" name="c_direction" class="form-control" id="direction" readonly>
                                </div>
                              </div>
							   <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Status</label>
                                  <input type="text" name="c_pending" class="form-control" id="pending" readonly>
                                </div>
                              </div>

                          </div>
                            <div class="modal-footer justify-content-between">
							<button type="submit" name="confirm" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                          </div>
                          </form>
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
 <!-- Modal form script -->
 
 	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/601e2a13c31c9117cb765d39/1etqt8npb';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

   <!-- Modal script form -->
  <script>
 $(document).ready(function (){
    $('.editbtn').on('click', function(){

      $('#myModal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);

      $('#locid').val(data[1]);
      $('#location').val(data[2]);
      $('#street').val(data[3]);
      $('#price').val(data[4]);
	  $('#direction').val(data[5]);
      $('#pending').val(data[6]);

    });

  });
  </script>
</body>

</html>
