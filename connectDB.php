<?php
$servername="localhost";
$mysql_user="root";
$mysql_pass="";
$dbname="fmb";
$conn=mysqli_connect($servername, $mysql_user, $mysql_pass, $dbname);
if($conn){
 //  echo("connection success");
}else{
echo("connection not success");
 
}
error_reporting(0);

?>