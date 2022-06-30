<?php
$success = "";
$error_message = "";
if(isset($_POST['submit_email'])) {
$servername="localhost";
$username="root";
$password="";
$dbname="cmp";
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
die("Connection Failed: " .mysqli_error());
}
	$email=$_POST['email'];
	$query=mysqli_query($conn,"select * from admin where adminEmail='$email'");
    $num=mysqli_fetch_array($query);
if($query->num_rows>0){
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST['email'],$otp);
		

		if($mail_status == 1) {
			$result = mysqli_query($conn,"insert into otp_expiry values ('$otp', 0, '" . date("Y-m-d H:i:s"). "','$email')");
			$query1=mysqli_query($conn,"select * from otp_expiry where otp='$otp'");
			$num=mysqli_fetch_array($query1);
			if($num>0) {
				$success=1;
			}
		}
	} else {
		$error_message = "Email not exists!";
	}
}
if(isset($_POST['submit_otp'])) {
$servername="localhost";
$username="root";
$password="";
$dbname="cmp";
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
die("Connection Failed: " .mysqli_error());
}
$_SESSION['otp']=$_POST['otp'];
	$result = mysqli_query($conn,"select * from otp_expiry where otp='" . $_POST['otp'] . "' && is_expired!=1 && NOW() <= DATE_ADD(created_at, INTERVAL 24 HOUR)");
	$num=mysqli_fetch_array($result);
	if($result->num_rows>0) {
		$result = mysqli_query($conn,"update otp_expiry set is_expired = 1 where otp = '" . $_POST['otp'] . "'");
		$success = 2;	
		header("location:http://localhost/cmp/admin/forgot_password.php");
	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
?>
<html>
<head>
<title>admin</title>
<style>
		.cont-1 {
			max-width: 350px !important;
      padding: 50px;
      border-radius: 10px;
      background-color: grey;
		}
	</style>
</head>
<body>
	<?php
		if(!empty($error_message)) {
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>

<form name="frmUser" method="post" action="">
	<div class="conatiner cont-1">
		<?php 
			if($success==1) { 
		?>
		<div class="tableheader">Enter OTP</div>
		<p style="color:#31ab00;">Check your email for the OTP</p>
			
		<div class="tablerow">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
		</div>
		<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
		<?php 
			} else if ($success == 2) {
        ?>
		<p style="color:#31ab00;">Welcome, You have successfully loggedin!</p>
		<?php
			}
			else {	
		?>
		
		<div class="tableheader">Enter Your Login Email</div>
		<div class="tablerow"><input type="text" name="email" placeholder="Email" class="login-input" required></div>
		<div class="tableheader"><input type="submit" name="submit_email" value="Submit" class="btnSubmit"></div>
		<?php 
			}
		?>
	</div>
</form>
</body></html>