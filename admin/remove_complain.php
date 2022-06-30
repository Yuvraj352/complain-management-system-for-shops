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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		.cont-1 {
      padding: 50px;
      border-radius: 10px;
      background-color: lightgreen;
		}
	</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
  
<div class="container cont-1">
<div class="container" align ="center" style="padding: 10px;">
<h2>Remove Complain/s
</div>
  <form align="center" width=5555 method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="cmp";
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
die("Connection Failed: " .mysqli_error());
}
$sql="select * from complain";
$result1=mysqli_query($conn,$sql);
if($result1->num_rows>0)
{
echo"<table border='0' cellpadding='5' width='90%' align='center'>";
echo"<tr>";
echo"<th>name</th>";
echo"<th>rollno</th>";
echo"<th>email</th>";
echo"<th>shopName</th>";
echo"<th>complain</th>";
echo"<th>time</th>";
echo"<th>comment</th>";
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
echo"<td>".$row["comment"]."</td>";
?>
<td><input class="form-check-input" type="checkbox" name="users[]" value="<?php echo htmlentities($row['id']);?>"></td>
<?php
echo"</tr>";
}
echo"</table>";
}
else
{
echo"0 results";
}
if(isset($_POST["remove"]))
{
    $rowCount = count($_POST["users"]);
    for($i=0;$i<$rowCount;$i++)
     {
    mysqli_query($conn,"delete from complain where id='".$_POST["users"][$i]."'");
     }
    header("location:http://localhost/cmp/admin/update_complain.php");

}
$conn->close();
    ?>
<input class="btn btn-secondary" type="submit" value="remove" name ="remove">
</form>
  <hr>
		  <a href="http://localhost/cmp/admin/admin_index.php" >back to index</a>
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