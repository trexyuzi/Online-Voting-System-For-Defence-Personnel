<?php

include("connect.php"); // Using database connection file here

$name = $_GET['name']; // get id through query string

$del = mysqli_query($connect,"delete from user where name = '$name'"); // delete query

if($del)
{
    mysqli_close($connect); // Close connection
    header("location:../routes/admin.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
