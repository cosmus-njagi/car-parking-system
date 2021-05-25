<?php
$connection=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($connection, 'parking');
if(isset($_POST['save_data']))
{
    $terms=$_POST['terms'];
    $query="INSERT INTO terms_conditions(`terms`) VALUES('$terms')";
    $query_run=mysqli_query($connection, $query);
    if($query_run)
    {
        header('Location: index.php');
    }
    else{
        echo '<script> alert("Data Not Saved"); </script>';
		header('Location: index.php');
    }
}
?>
