<?php
	session_start();
	if(!isset($_SESSION['userdata'])){
		header("location:../");
	}
	$userdata=$_SESSION['userdata'];
	$groupsdata=$_SESSION['groupsdata'];
	if($_SESSION['userdata']['status']==0){
		$status='<b style="color: red">Not voted</b>';
	}
	else{
		$status='<b style="color: green">Voted</b>';
	}
?>



<html>
	<head>
		<title>Online Voting Portal - Dashboard</title>
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
				float: left;
				margin: 10px;
			}
			#logoutButton{
				padding: 5px;
				border-radius: 5px;
				background-color: #ffeaa7;
				font-size: 150%;
				font-family: 'Bookman Old Style';
				float: right;
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
					<a href="../"><button id="backButton">Back</button></a>
					<a href="logout.php"><button id="logoutButton">Logout</button></a>
					<h1>ONLINE VOTING PORTAL FOR DEFENCE PERSONNEL</h1>
				</div>
			</center>
			<hr>
			<div id="mainPanel">
				<div id="profile">
					<center>
						<img src="../uploads/<?php echo $userdata['photo'] ?>" height="130" width="100"></br></br>
					</center>
					<b>Name: </b><?php echo $userdata['name'] ?></br></br>
					<b>voterID: </b><?php echo $userdata['voterID'] ?></br></br>
					<b>Address: </b><?php echo $userdata['address'] ?></br></br>
					<b>Status: </b><?php echo $status ?></br></br>
				</div>
			
				<div id="group">
					<?php
						if($_SESSION['groupsdata']){
							for($i=0; $i<count($groupsdata); $i++){
								?>
									<div>
										<img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="120">
										<b>Group name:</b> <?php echo $groupsdata[$i]['name'] ?></br></br>
										<form action="../api/vote.php" method="post">
											<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
											<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
											<?php
												if($_SESSION['userdata']['status']==0){
													?>
														<input type="submit" name="voteButton" value="Vote" id="voteButton">
													<?php
												}
												else{
													?>
														<button disabled type="button" name="voteButton" value="Vote" id="voted">Voted</button>
													<?php
												}
											?>
										</form>
									</div>
									</br></br><hr>
								<?php
							}
						}
						else{

						}
					?>
				</div>
			</div>
		</div>
		
	</body>
</html>