<?php
session_start();
$ootp=$_SESSION['otp'];
if(isset($_POST['change']))
{
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
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
$query=mysqli_query($conn,"SELECT * FROM shopowner WHERE ownerEmail='$email' and contactNo='$contact'");
$query1=mysqli_query($conn,"SELECT * FROM otp_expiry WHERE userEmail='$email' and otp='$ootp'");
$num=mysqli_fetch_array($query);
$num1=mysqli_fetch_array($query1);
if($num>0 && $num1>0)
{
mysqli_query($conn,"update shopowner set password='$password' WHERE ownerEmail='$email' and contactNo='$contact'");
echo'<script> alert("Password Changed Successfully")</script>';
}
else
{
    echo'<script> alert("Invalid email id or Contact")</script>';
}
    
   
$conn->close();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		.cont-1 {
			max-width: 350px !important;
      padding: 50px;
      border-radius: 10px;
      background-color: grey;
		}
	</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>shop</title>
    
  </head>
  
  <body>
  <script type="text/javascript">
function valid()
{
  if(document.forgot.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.forgot.password.value.focus();
return false;
}
else if(document.forgot.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.forgot.confirmpassword.focus();
return false;
}
else if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/;
if(document.forgot.password.value.match(decimal)) 
{ 
return true;
}
else
{ 
alert("use strong password of 6 to 15 length havin 1 lowercase,uppercase,number,special")
return false;
}
}
</script>
  <div class="container cont-1">
		           <form class="form-login" name="forgot" method="post">
		                          <h4 >Forgot Password ?</h4>
		                      <div>
		                          <p>Enter your details below to reset your password.</p>
<input type="email" name="email" placeholder="Email"  class="form-control" required><br >
<input type="text" name="contact" placeholder="contact No"  class="form-control" required><br>
 <input type="password" class="form-control" placeholder="New Password" name="password"  required ><br />
<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" name="confirmpassword" required >
		                      </div>
		                      <div class=>
		                          <button class="btn btn-secondary btn-lg btn-block" type="submit" name="change" onclick="return valid();">Submit</button>
		                      </div>
		          </form>
              <div class="registration">
		                <a href="http://localhost/cmp/shop/login.php">Sign in</a>
		            </div>
	  	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>