<?php
$uname = $_post['uname'];
$upswd = $_post['upswd'];
if(!empty($uname)&& !empty($upswd))
{
$host = "localhost';
$dbusername = "root";
$dbpassword = " ";
$dbname = "naresh";
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error())
{
die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
$SELECT = "SELECT uname1 from register Where uname1 = ? LIMIT 1;
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$uname);
$stmt->execute();
$stmt->bind_result($uname);
$stmt->store_result();
$rnum = $stmt->num_rows;
if($rnum ==0)
{
$stmt->close();
echo"user name not found<br>";
}
else
{
echo"user name found<br>";
$SELECT = "SELECT upswd1 FROM register WHERE uname1=?";
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s","$uname");
$stmt->execute();
$stmt->bind_result($pswd);
$stmt->fetch();
echo"<br>Register password:".$pswd;
echo"<br>Entered password:".$upswd;
if($upswd==$pswd){
echo"<br>correct
password<br>successfully
Logged In";
}
else{
echo"<br>incorrect password";
}
}
$stmt->close();
$stmt->close();
}
}
else
{
echo"All field are required.";
die();
}
?>