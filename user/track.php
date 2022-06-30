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
  <h2 textcolor="red">COMPLAINT MANAPOSMENT SYSTEM FOR SHOPS</h2>
</div>
	<div class="container cont-1">
    <form align="center" width=5555 method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  
  <div class="form-group">
    <input type="text" class="form-control" id="Roll no." placeholder="ROLL NO." name="txt2">
  </div>
  <div class="form-group">
  <input class="btn btn-secondary" type="submit" value="Track" name ="submit">
  </div>
  <hr>
  <div>
	 <a href="http://localhost/cmp/user/user_index.php" >back to index</a>
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
$b=$_POST["txt2"];
$sql1="select * from complain where rollno='$b'";
$result1=mysqli_query($conn,$sql1);
if($result1->num_rows>0)
{
echo"<table border='1' cellpadding='5' width='90%' align='center'>";
echo"<tr>";
echo"<th>name</th>";
echo"<th>rollno</th>";
echo"<th>email</th>";
echo"<th>shopName</th>";
echo"<th>complain</th>";
echo"<th>time</th>";
echo"<th>opt</th>";
echo"<th>comment</th>";
echo"<th>status</th>";
echo"</tr>";
while($row=$result1->fetch_assoc())
{
  $sql2="select ShopName from shops where id=".$row["selection"]."";
  $result2=mysqli_query($conn,$sql2);
  $row1=$result2->fetch_assoc();
echo"<tr>";
echo"<td>".$row["name"]."</td>";
echo"<td>".$row["rollno"]."</td>";
echo"<td>".$row["email"]."</td>";
echo"<td>".$row1["ShopName"]."</td>";
echo"<td>".$row["complains"]."</td>";
echo"<td>".$row["time"]."</td>";
echo"<td>".$row["opt"]."</td>";
echo"<td>".$row["comment"]."</td>";
echo"<td>".$row["status"]."</td>";
echo"</tr>";
}
echo"</table>";
}
else
{
echo"no complaint found";
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