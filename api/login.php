<?php
	session_start();
	include("connect.php");
	$voterID=$_POST["voterID"];
	$password=$_POST["password"];
	$role=1;
	$password=md5($password);
	$check=mysqli_query($connect,"select * from user where voterID='$voterID' and password='$password' and role='$role'");

	if(mysqli_num_rows($check)>0){
		$userdata=mysqli_fetch_array($check);
		$groups=mysqli_query($connect,"select * from user where role=2");
		$groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);

		$_SESSION['userdata']=$userdata;
		$_SESSION['groupsdata']=$groupsdata;

		echo '
			<script>
				window.location="../routes/dashboard.php";
			</script>
		';
	}
	else{
		echo '
			<script>
				alert("invalid credentials!");
				window.location="../";
			</script>
		';
	}

?>