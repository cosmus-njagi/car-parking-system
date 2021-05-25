<?php
$connection=mysqli_connect("localhost", "root", "");
$db=mysqli_select_db($connection, 'parking');
if(isset($_POST['deletedata']))
{
    $id=$_POST['delete_id'];
      
    $query="DELETE FROM spots WHERE id='$id'"; 
    $query_run=mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Deleted successfully");</script>';
        header('Location: parkings.php');
    }
    else{
        echo '<script> alert("Data Not Deleted"); </script>';
    }

}
?>