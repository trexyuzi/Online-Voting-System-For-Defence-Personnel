<?php
	include("connect.php");
	$name=$_POST["name"];
	$image=$_FILES['photo']['name'];
	$tmp_name=$_FILES['photo']['tmp_name'];
	$role=2;

	
		move_uploaded_file($tmp_name,"../uploads/$image");
		$insert=mysqli_query($connect,"insert into user(name,photo,role,votes) values('$name','$image','$role',0)");
		if($insert){
			echo '
			<script>
				alert("registration successful!");
				window.location="../routes/admin.php";
			</script>
		';
		}
		else{
			echo '
			<script>
				alert("some error occured!");
				window.location="../routes/register2.html";
			</script>
		';
		}
	
?>