<?php
    session_start();
    include("connect.php");
	$t=$_POST["otp"];
    $o=$_SESSION["a1"];
    if($t==$o){
        echo '
			<script>
				alert("OTP verified!");
				window.location="../routes/reset.html";
			</script>
		';
    }
    else{
        echo '
        <script>
            alert("Invalid OTP!");
            window.location="../";
        </script>
    ';
    }
?>