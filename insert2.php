<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "parking");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$location = mysqli_real_escape_string($link, $_REQUEST['location']);
$street = mysqli_real_escape_string($link, $_REQUEST['street']);
$p_name = mysqli_real_escape_string($link, $_REQUEST['p_name']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$directions = mysqli_real_escape_string($link, $_REQUEST['directions']);

// Attempt insert query execution
$sql = "INSERT INTO spots (location, street, p_name, price, directions) VALUES ('$location', '$street', '$p_name', '$price', '$directions')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>