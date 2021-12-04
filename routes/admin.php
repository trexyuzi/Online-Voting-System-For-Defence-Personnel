<?php
    session_start();
    include("../api/connect.php");

	$user=mysqli_query($connect,"select * from user where role=1");
    $userdata=mysqli_fetch_all($user,MYSQLI_ASSOC);
	$groups=mysqli_query($connect,"select * from user where role=2");
	$groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
	
?>

<html>
	<head>
		<title>Online Voting Portal - Admin</title>
		<link rel='stylesheet' href="../css/stylesheet.css">
	</head>
	<body>
		<style>
			#backButton{
				padding: 5px;
				border-radius: 5px;
				background-color: #ffeaa7;
				font-size: 150%;
				font-family: 'Bookman Old Style';
				float: right;
				margin: 10px;
			}
			#logoutButton{
				padding: 5px;
				border-radius: 5px;
				background-color: #ffeaa7;
				font-size: 150%;
				font-family: 'Bookman Old Style';
				float: left;
				margin: 10px;
			}
			#profile{
				background-color:white;
				width: 30%;
				padding: 20px;
				float: left;
			}
			#group{
				background-color:white;
				width: 60%;
				padding: 20px;
				float: right;
			}
			#voteButton{
				padding: 5px;
				border-radius: 5px;
				background-color: #ffeaa7;
				font-size: 150%;
				font-family: 'Bookman Old Style';
				float: left;
			}
			#mainPanel{
				padding: 10px;
			}
			#voted{
				padding: 5px;
				background-color: green;
				font-size: 15px;
				font-family: 'Bookman Old Style';
				color: white;
				float: left;
			}
		</style>
		<div id="mainSection">
			<center>	
				<div id="headerSection">
					<a href="../api/remove.php"><button id="backButton">Remove Candidate</button></a>
					<a href="../routes/register2.html"><button id="backButton">Add Candidate</button></a>
					<a href="../admin.html"><button id="logoutButton">Logout</button></a>
					<h1>ADMIN PANEL</h1>
				</div>
			</center>
			<hr>
			<div id="mainPanel">
				<div id="profile">
                <?php
						
					for($i=0; $i<count($userdata); $i++){
						$_SESSION['status']=$userdata[$i]['status'];
						?>
							<div>
								<img style="float: right" src="../uploads/<?php echo $userdata[$i]['photo'] ?>" height="100" width="100">
								<b>User name:</b> <?php echo $userdata[$i]['name'] ?></br></br>
                                <b>VoterID:</b> <?php echo $userdata[$i]['voterID'] ?></br></br>
								<b>Status:</b> <?php if($_SESSION['status']==1){echo"<p>Voted</p>";}else{echo"<p>Not voted</p>";} ?></br></br>
							</div>
							</br></br><hr>
						<?php
					}
						
				?>
				</div>
			
				<div id="group">
					<?php
						
						for($i=0; $i<count($groupsdata); $i++){
							?>
								<div>
									<img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
									<b>Group name:</b> <?php echo $groupsdata[$i]['name'] ?></br></br>
									<b>Votes:</b> <?php echo $groupsdata[$i]['votes'] ?></br></br>
								</div>
								</br></br><hr>
							<?php
						}
						
					?>
				</div>
			</div>
		</div>
		
	</body>
</html>