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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		.cont-1 {
			max-width: 350px !important;
            max-height: 400px;
      padding: 50px;
      border-radius: 10px;
      background-color: aquamarine;
		}
	</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container" align ="center" style="padding: 10px;">
  <h2 textcolor="red">COMPLAINT MANAGEMENT SYSTEM FOR SHOPS</h2>
</div>

	<div class="container cont-1">
        <p><a class="btn btn-secondary btn-lg btn-block" href="http://localhost/cmp/user/reg-cmp.php" >Register Complain</a></p>
        <p>  </p>
        <p><a class="btn btn-secondary btn-lg btn-block" href="http://localhost/cmp/user/track.php" role="button">Track Complain</a></p>
        <p>  </p>
        <p><a class="btn btn-secondary btn-lg btn-block" href="http://localhost/cmp/user/change_password.php" role="button">Change password</a></p>
        <p>  </p>
   
<hr>
<div class="registration">
  <a href="http://localhost/cmp/user/login.php">log out</a>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>