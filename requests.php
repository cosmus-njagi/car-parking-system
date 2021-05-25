<?php
// Initialize the session
session_start();
			 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: adminlogin.php");
exit;
}
 include_once('config1.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Responsive parking system">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <title>requests</title>

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
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Nice <span class="lite">Admin</span></a>
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
                <a href="adminprofile.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="adminlogout.php"><i class="icon_key_alt"></i> Log Out</a>
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
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
             <li>
            <a class="" href="form_validation.html">
                          <i class="icon_genius"></i>
                          <span>Add new parking</span>
                      </a>
          </li>
		  <li>
            <a class="" href="parkings.php">
                          <i class="icon_genius"></i>
                          <span>Parkings</span>
                      </a>
          </li>
          <li>
            <a class="" href="requests.php">
                          <i class="icon_genius"></i>
                          <span>Requests</span>
                      </a>
          </li>
		  <li>
            <a class="" href="registeredusers.php">
                          <i class="icon_genius"></i>
                          <span>Users</span>
                      </a>
          </li>
         </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        <!-- page start-->		
		<?php
				$condition	=	'';
				if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
					$condition	.=	' AND id LIKE "%'.$_REQUEST['id'].'%" ';
				}
											
				$userData	=	$db->getAllRecords('mybookings','*',$condition,'ORDER BY id DESC');
				?>
   	<div class="container">
		<div class="card">
			
			<div class="card-body">
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find booking</h5>
					<form method="get">
						<div class="row">
                        <div class="col-sm-2">
								<div class="form-group">
									<label>Parking Id</label>
									<input type="number" name="id" id="id" class="form-control" value="<?php echo isset($_REQUEST['id'])?$_REQUEST['id']:''?>" placeholder="Enter id number">
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
                    <th><i class=""></i> Time & date</th>
					<th><i class=""></i> Status</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
				</thead>
				<tbody>
					<?php 
					$userData	=	$db->getAllRecords('mybookings','*',$condition,'ORDER BY id DESC');
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
						<td align="center">
						<div class="btn-group">
                        <a class="btn btn-success editbtn" href="#" data-toggle="modal" data-target="#edit"><i class="icon_check_alt2"></i>View</a>
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
                          <form action="updatebooking.php" method="POST">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirm</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                               <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">ID</label>
                                  <input type="text" name="c_id" class="form-control" id="locid" readonly>
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Location</label>
                                  <input type="text" name="c_location" class="form-control" id="location" readonly>
                                </div>
                              </div>
                                <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Street</label>
                                  <input type="text" name="c_street" class="form-control" id="street" readonly>
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Parking name</label>
                                  <input type="text" name="c_name" class="form-control" id="p_name" readonly>
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
                                  <label for="exampleInputEmail1">Time</label>
                                  <input type="text" name="created_at" class="form-control" id="time" readonly>
                                </div>
                              </div>
							  <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Status</label>
                                  <input type="text" name="c_pending" class="form-control" id="pending">
                                </div>
                              </div>

                          </div>
                            <div class="modal-footer justify-content-between">
							 <button type="submit" name="update_data" class="btn btn-primary"><i class="fa fa-check"></i> Approve</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Dismiss</button>
                             
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

      $('#locid').val(data[0]);
      $('#location').val(data[1]);
      $('#street').val(data[2]);
	  $('#p_name').val(data[3]);
      $('#price').val(data[4]);
      $('#time').val(data[5]);
	  $('#pending').val(data[6]);

    });

  });
  </script>
</body>

</html>
