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
			max-width: 350px !important;
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
  
	<div class="container cont-1">
  <div class="container" align ="center" style="padding: 10px;">
  <h3 textcolor="red">VIEW COMPLAINS</h3>
</div><hr>
        <p>search by category </p>
    <form align="center" width=5555 method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  
  <div class="form-group" align ="center">
    <select class="form-control" id="SHOP" name="shop" style="max-width:250px;" required>
    <option value="-1">Select Shop</option>
    <option value="0">All</option>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="cmp";
$conn= mysqli_connect($servername,$username,$password,$dbname);
 $sql2=mysqli_query($conn, "select id,ShopName from shops ");
while ($rw=mysqli_fetch_array($sql2)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['ShopName']);?></option>
<?php
}
?>
</select>
  </div>
  <div class="form-group" align ="center">
    <select class="form-control" id="rollno" name="rollno" style="max-width:250px;" required>
    <option value="-1">ROLLNO.</option>
    <option value="0">All</option>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="cmp";
$conn= mysqli_connect($servername,$username,$password,$dbname);
 $sql2=mysqli_query($conn, "select DISTINCT rollno from complain");
while ($rw=mysqli_fetch_array($sql2)) {
  ?>
  <option value="<?php echo htmlentities($rw['rollno']);?>"><?php echo htmlentities($rw['rollno']);?></option>
<?php
}
?>
</select>
</div>
<div class="form-group" align ="center">
    <select class="form-control" id="time" name="time" style="max-width:250px;" required>
    <option value="-1">TIME</option>
    <option value="0">All</option>
    <option value="10">LAST 10 DAYS</option>
    <option value="30">LAST 1 MONTH</option>
    <option value="90">LAST 3MONTHS</option>
    
</select>
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
$a=$_POST["shop"];
$b=$_POST["rollno"];
$c=$_POST["time"];
if($b>0&& $a>0 && $c>0)
{
$sql1="select * from complain where rollno='$b' and selection='$a' and time>= NOW()- INTERVAL $c DAY";
$result1=mysqli_query($conn,$sql1);
}
else if($b>0&& $a==0&& $c>0)
{
$sql1="select * from complain where rollno='$b' and time>= NOW()- INTERVAL $c DAY";
$result1=mysqli_query($conn,$sql1);
}
else if($b==0&& $a>0 && $c>0)
{
$sql1="select * from complain where selection='$a' and time>= NOW()- INTERVAL $c DAY";
$result1=mysqli_query($conn,$sql1);
}
else if($b==0&& $a==0&& $c>0)
{
$sql1="select * from complain WHERE time>= NOW()- INTERVAL $c DAY";
$result1=mysqli_query($conn,$sql1);
}
else if($b>0&& $a>0 && $c==0)
{
$sql1="select * from complain where rollno='$b' and selection='$a'";
$result1=mysqli_query($conn,$sql1);
}
else if($b>0&& $a==0&& $c==0)
{
$sql1="select * from complain where rollno='$b'";
$result1=mysqli_query($conn,$sql1);
}
else if($b==0&& $a>0 && $c==0)
{
$sql1="select * from complain where selection='$a'";
$result1=mysqli_query($conn,$sql1);
}
else if($b==0&& $a==0&& $c==0)
{
$sql1="select * from complain";
$result1=mysqli_query($conn,$sql1);
}
else{echo "select categories";}

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