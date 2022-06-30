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
//date_default_timezone_set("Asia/Calcutta");
//$result = mysqli_query($conn,"update complain set time='" .date("Y-m-d H:i:s"). "' where selection='1'||'2'||'4'");
?>