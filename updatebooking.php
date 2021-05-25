<?php
$connection=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($connection, 'parking');
if(isset($_POST['update_data']))
{
	$id=$_POST['c_id'];
    $c_location=$_POST['c_location'];
    $c_street=$_POST['c_street'];
    $c_name=$_POST['c_name'];
    $c_price=$_POST['c_price'];
	$c_pending=$_POST['c_pending'];
	    
    $query="UPDATE mybookings SET c_location='$c_location', c_street='$c_street', c_name='$c_name', c_price='$c_price', c_pending='$c_pending' WHERE id='$id' ";
	
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data updated");</script>';
        header('Location: requests.php');
    }
    else{
        echo '<script> alert("Data Not updated"); </script>';
    }

}
?>