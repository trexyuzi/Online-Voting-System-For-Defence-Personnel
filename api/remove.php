<?php
    session_start();
    include("connect.php");
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
				margin: 0 auto;
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
					<a href="../routes/admin.php"><button id="backButton">Back</button></a><br><br><br>
					<h1>ADMIN PANEL</h1>
				</div>
			</center>
			<hr>
			<center>
			<div id="mainPanel">
				<div id="group">
				<table border="2">
					<tr>
						<td>Symbol</td>	
						<td>Name</td>
						<td>Votes</td>
						<td></td>
					</tr>

					<?php

						$records = mysqli_query($connect,"select photo,name,votes from user where role=2"); 

						while($data = mysqli_fetch_array($records))
							{
								?>
									<tr>
										<td><img src="../uploads/<?php echo $data['photo']; ?>" width="120" height="100"></td>
										<td><?php echo $data['name']; ?></td>
										<td><?php echo $data['votes']; ?></td>
										<td><a href="delete.php?name=<?php echo $data['name']; ?>"><button id="backButton">Delete</button></a></td>
									</tr>	
								<?php
							}
					?>
					</table>
				</div>
			</div>
			</center>
		</div>
		
	</body>
</html>