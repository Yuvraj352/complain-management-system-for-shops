<?php
session_start();
error_reporting(0);
if(isset($_SESSION['logins']))
{if(time()-$_SESSION['createds'] > 600)
  {
    unset($_SESSION['logins']);
    unset($_SESSION['createds']);
  }
}
else {
  header("location:http://localhost/cmp/shop/login.php");
}
if(isset($_SESSION['new']))
{ 
   echo'<script> alert("CHANGE YOUR PASSWORD FIRST")</script>';
   unset($_SESSION['new']);
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
      background-color: aquamarine;
		}
	</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>shop</title>
  </head>
  <body>
  <div class="container" align ="center" style="padding: 10px;">
  <h2 textcolor="red">COMPLAINT MANAGEMENT SYSTEM FOR SHOPS</h2>
</div>
	<div class="container cont-1">
        
        
        <p><a class="btn btn-secondary btn-lg btn-block" href="http://localhost/cmp/shop/change_password.php" role="button">Change password</a></p>
        <p>  </p>
        <p><a class="btn btn-secondary btn-lg btn-block" href="http://localhost/cmp/shop/view_complains.php" role="button">View Complains</a></p>
        <p>  </p>
        <p><a class="btn btn-secondary btn-lg btn-block" href="http://localhost/cmp/shop/update_status.php" role="button">Update Complains</a></p>
        <p>  </p>
   
<hr>
<div class="registration">
  <a href="http://localhost/cmp/shop/login.php">log out</a>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>