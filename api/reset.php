<?php
    include("connect.php");
    session_start();
    $voterID=$_SESSION["a2"];
    $password=$_POST['password'];
    $password=md5($password);
    session_unset();
    session_destroy();

    mysqli_query($connect,"update user set password='$password' where voterID='$voterID'");
    echo'
        <script>
            alert("password reset successful!");
            window.location="../";
        </script>
    ';
?>