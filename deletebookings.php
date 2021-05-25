<?php
$connection=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($connection, 'parking');
if(isset($_POST['deletedata']))
{
    $id=$_POST['delete_id'];
      
    $query="DELETE FROM mybookings WHERE id='$id'"; 
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Deleted successfully");</script>';
        header('Location: mybookings.php');
    }
    else{
        echo '<script> alert("Data Not Deleted"); </script>';
    }

}
?>