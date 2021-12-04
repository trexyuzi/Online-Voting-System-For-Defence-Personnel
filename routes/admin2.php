<?php
    include("../api/connect.php");

    $id=$_POST['id'];
    $password=$_POST['password'];
    $y=mysqli_query($connect,"select * from admin where id='$id'");
    $x=mysqli_fetch_array($y);
    if($password==$x['password']){
        echo'
            <script>
                window.location="admin.php";
            </script>
        ';
    }
    else{
        echo $password;
        echo $x;
        echo'
            <script>
                alert("Incorrect password");
                window.location="../admin.html";
            </script>
        ';
    }
?>