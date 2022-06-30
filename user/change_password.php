<?php
session_start();
error_reporting(0);
if(isset($_SESSION['loginu']))
{if(time()-$_SESSION['created'] > 600)
  {
    unset($_SESSION['loginu']);
    unset($_SESSION['created']);
  }
}
else {
  header("location:http://localhost/cmp/user/login.php");
}
?>
<?php
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
    $email=$_POST['email'];
	$crpass=md5($_POST['current_password']);
	$newpass=md5($_POST['new_password']);
	$conpass=md5($_POST['confirm_password']);
	$sql=mysqli_query($conn, "SELECT password FROM  users where password='$crpass' && userEmail='$email'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($conn, "update users set password='$conpass' where userEmail='$email'");
echo'<script> alert("Password Changed Successfully !!")</script>';
}
else
{
echo'<script> alert("Old Password not match !!")</script>';
}
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
			max-width: 370px !important;
      padding: 50px;
      border-radius: 10px;
      background-color: grey;
		}
	</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
    
  </head>
  
  <body>
  <script type="text/javascript">
  function valid()
{
  if(document.forgot.current_password.value=="")
{
alert("Current Password Filed is Empty !!");
document.forgot.current_password.value.focus();
return false;
}
else if(document.forgot.new_password.value=="")
{
alert("New Password Filed is Empty !!");
document.forgot.new_password.focus();
return false;
}
else if(document.forgot.confirm_password.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.forgot.confirm_password.focus();
return false;
}
else if(document.forgot.new_password.value!= document.forgot.confirm_password.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirm_password.focus();
return false;
}
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/;
if(document.forgot.new_password.value.match(decimal)) 
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
		      <form class="form-login" method="post" align="center" name ="forgot">
		        <h2 class="form-login-heading">Change your password</h2>
		        <div class="login-wrap">
                <input type="email" name="email" placeholder="Email"  class="form-control" required><br >
		         <input type="password" class="form-control" placeholder="current password" name="current_password" required="required" autofocus>
		            <br>
                    <input type="password" class="form-control" placeholder="new password" name="new_password" required="required" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="confirm Password" required="required" name="confirm_password"><br >
		            <br>
		            <button class="btn btn-secondary btn-lg btn-block"  type="submit" name="submit" onclick="return valid();" id="submit"><i class="fa fa-user"></i> change password</button>
		            <hr>
		            <div>
		                <a href="http://localhost/cmp/user/user_index.php" >back to index</a>
		            </div>
                </div>
                </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>