<?php
$connection=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($connection, 'parking');
if(isset($_POST['confirm']))
{
    $c_location=$_POST['c_location'];
    $c_street=$_POST['c_street'];
    $c_name=$_POST['c_name'];
    $c_price=$_POST['c_price'];
	$c_pending=$_POST['c_pending'];
	
    

    $query="INSERT INTO mybookings(`c_location`, `c_street`, `c_name`, `c_price`, `c_pending`) VALUES('$c_location', '$c_street', '$c_name', '$c_price', '$c_pending')";
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("booking sent for approval saved");</script>';
        header('Location: mybookings.php');
    }
    else{
        echo '<script> alert("Data Not Saved"); </script>';
    }

}
?>