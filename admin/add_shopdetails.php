<?php
session_start();
//error_reporting(0);
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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		.cont-1 {
			max-width: 400px !important;
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

  <div class="container" align ="center" style="padding: 10px;">
  <h2 textcolor="red">ADD SHOP DETAILS</h2>
</div>
	<div class="container cont-1">
        <p> </p>
    <form align="center" width=5555 method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="form-group">
    <input type="text" class="form-control"  placeholder="SHOPNAME,SHOP TYPE" name="txt1">
  </div>
  <div class="form-group">
    <input type="text" class="form-control"  placeholder="OWNER NAME" name="txt2">
  </div>
  <div class="form-group">
    <input type="text" class="form-control"  placeholder="CONTACT NO." name="txt3">
  </div>
  <div class="form-group">
    <input type="email" class="form-control"  placeholder="EMAIL" name="email">
  </div>
  <hr>
  <input class="btn btn-secondary" type="submit" value="submit" name ="submit">
  
  <hr>
	 
		  <a href="http://localhost/cmp/admin/admin_index.php" >back to index</a>
	 </div>
</form>
</div>
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
$a=$_POST["txt1"];
$b=$_POST["txt2"];
$c=$_POST["email"];
$d=$_POST["txt3"];
$e = rand(100000,999999);
require_once("mail_function1.php");
		$mail_status = sendOTP($c,$e);
    if($mail_status==1)
    {
      $sql3="insert into pass(otp,ownerEmail,valid) values('$e','$c','1')";
      mysqli_query($conn,$sql3);
      $sql2="insert into shopowner(ShopName,ownerName,ownerEmail,contactNo,password) values('$a','$b','$c','$d','".md5($e)."')";
    }
    $sql="insert into shops(ShopName,ownerName,email) values('$a','$b','$c')";
$sql1="select * from shops where ShopName='$a'";
$result=mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);
$result1=mysqli_query($conn,$sql1);
$num=mysqli_fetch_array($result1);
if($num>0)
{
echo" record inserted successfully";
echo"<table border='1' cellpadding='5' width='90%' align='center'>";
echo"<tr>";
echo"<th>id</th>";
echo"<th>shop name</th>";
echo"<th>owner name</th>";
echo"<th>email</th>";
echo"</tr>";
while($row=$result1->fetch_assoc())
{
echo"<tr>";
echo"<td>".$row["id"]."</td>";
echo"<td>".$row["ShopName"]."</td>";
echo"<td>".$row["ownerName"]."</td>";
echo"<td>".$row["email"]."</td>";
echo"</tr>";
}
echo"</table>";
}
else
{
echo"0 results";
}
$conn->close();
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>