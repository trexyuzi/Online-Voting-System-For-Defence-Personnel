<?php
	session_start();
	include("connect.php");
	$voterID=$_POST["voterID"];
	$email=$_POST["email"];
    $_SESSION["a2"]=$voterID;

	$t=mysqli_query($connect,"select voterID from user where voterID='$voterID' and email='$email'");
	$t2=mysqli_num_rows ($t);
	if($t2<1){
		echo '
			<script>
				alert("voterID not registered!");
				window.location="../index.html";
			</script>
		';
		exit();
	}

	include_once('config.php');
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	function smtp_mailer($to,$subject, $msg){
		


		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'apikey';                     //SMTP username
			$mail->Password   = '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';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		
			//Recipients
			$mail->setFrom('cmrtc587@gmail.com', 'OTP');
			$mail->addAddress($to, 'User OTP');     //Add a recipient
		
			
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $msg;
		
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}


		if(!$mail->Send()){
			return 0;
		}else{
			return 1;
		}
	}
	
	$otp= mt_rand(100000, 999999);	
	$_SESSION["a1"]=$otp;

	smtp_mailer($email,"OTP verification",$otp);

	echo '
			<script>
				window.location="../otp/verify2.html";
			</script>
			';
?>