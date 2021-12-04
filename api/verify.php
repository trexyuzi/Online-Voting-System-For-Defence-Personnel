<?php
    session_start();
    include("connect.php");
	$t=$_POST["otp"];
    $o=$_SESSION["a1"];
    session_unset();
    session_destroy();
    if($t==$o){
        echo '
			<script>
				alert("OTP verified! Registration Successful.");
				window.location="../";
			</script>
		';
    }
    else{
        mysqli_query($connect,"DELETE FROM user WHERE otp='$o'");
        echo '
        <script>
            alert("Invalid OTP!");
            window.location="../routes/register.html";
        </script>
    ';
    }
?>