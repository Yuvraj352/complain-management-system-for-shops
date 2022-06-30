<?php
session_start();
error_reporting(0);
if(isset($_SESSION['login']))
{if(time()-$_SESSION['CREATED'] > 600)
  {
    unset($_SESSION['login']);
    unset($_SESSION['CREATED']);
  }
}
else {
  header("location:http://localhost/cmp/admin/login.php");
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
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contactno=$_POST['contactno'];
	$query=mysqli_query($conn, "insert ignore into admin(fullName,adminEmail,password,contactNo) values('$fullname','$email','$password','$contactno')");
	echo'<script> alert("Registration successfull. Now You can login !")</script>';
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

    <title>admin</title>
    
  </head>
  
  <body>
  <script type="text/javascript">
  function valid()
{
var mail=/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
if(document.register.email.value.match(mail)) 
;
else
{
	alert("enter valid email");
	document.register.email.value.focus();
	 return false;
}
  if(document.register.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.register.password.value.focus();
return false;
}
else if(document.register.confirm_password.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.register.confirm_password.focus();
return false;
}
else if(document.register.password.value!= document.register.confirm_password.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirm_password.focus();
return false;
}
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,15}$/;
if(document.register.password.value.match(decimal)) 
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
		      <form class="form-login" method="post" name="register">
		        <h2 class="form-login-heading">Admin Registration</h2>
		        <div class="login-wrap">
		         <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
		            <br>
		            <input type="email" class="form-control" placeholder="Email" id="email"  name="email" required="required">
		            <br>
		            <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
					<input type="password" class="form-control" placeholder="confirm Password" required="required" name="confirm_password"><br >
		             <input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no" required="required" autofocus>
		            <br>
		            <button class="btn btn-secondary btn-lg btn-block"  type="submit" name="submit" onclick="return valid();"><i class="fa fa-user"></i> Register</button>
		            <hr>
		            <div class="registration">
		              
		                <a href="http://localhost/cmp/admin/admin_index.php">back to index</a>
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