<?php
$uname1=$_post['uname1'];
$email=$_post['email'];
$upswd1=$_post['upswd1'];
$upswd2=$_post['upswd2'];
if(!empty($uname1)|| !empty(!email)|| !empty($upswd1)|| !empty($upswd2))
{
$host = "localhost";
$dbusername="root";
$dbpassword=" ";
$dbname="naresh";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
die('connect error(".mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
$SELECT="SELECT email From register Where email=?LIMIT 1";
$INSERT="INSERT INTO register (uname1,email,upswd1,upswd2)values(?,?,?,?)";
$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0){
$stmt->close();
$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$uname1,$email,$upswd1,$upswd2);
$stmt->execute();
echo"new record inserted successfully";
}else{
echo"someone already register using this email";
}
$stmt->close();
$conn->close();
}
}else{
echo"all field are required";
die();
}
?>
