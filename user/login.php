<?php
session_start();
error_reporting(0);
unset($_SESSION['loginu']);
if(isset($_POST['submit']))
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
$ret=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
	$_SESSION['loginu']=$_POST['username'];
	$_SESSION['created']=time();
header("location:http://localhost/cmp/user/user_index.php");
exit();
}
else
{
echo'<script> alert("Invalid username or password or create new account ")</script>';
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

    <title>cmp</title>
    
  </head>
  
  <body>
  <script type="text/javascript">
function valid()
{
 if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
return true;
}
</script>
  <div id="login-page">
	  	<div class="container "  align ="center">
	  	
		      <form class="form-login" name="login" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap cont-1">
		            <input type="text" class="form-control" name="username" placeholder="Email"  required autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" required placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a href="http://localhost/cmp/user/verification.php"> Forgot Password?</a>
		                </span>
		            </label>
		            <button class="btn btn-secondary btn-lg btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		           </form>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="registration.php">
		                    Create an account
		                </a>
		        </div>
				<hr>
		            
		                <a href="http://localhost/cmp/index.html" >back to index</a>
		            
		
		          

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>