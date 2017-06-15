<?php
 $phone=$_REQUEST['phone'];
 $password=$_REQUEST['pword'];
 $con=mysqli_connect("13.76.209.146","test","test123!","BM-44259") or die("Failed to connect");
 //$con=mysqli_connect("localhost","root","","myapp") or die("Failed to connect");
 $qry="select * from tbl_exam where vchr_phone='$phone' and vchr_password='$password'";
 $result=mysqli_query($con,$qry);
 $data=array();
 if(mysqli_num_rows($result)==0)
 {
 	 $data["ResponseCode"]="404";
	 $data["Message"]="Invalid credentials";
 }
while($fetch=mysqli_fetch_row($result))
 	{
 	$data["ResponseCode"]="500";
 	$data["Message"]="Success";
	$data["vchr_uname"]=$fetch[0];
	$data["vchr_password"]=$fetch[1];
	$data["vchr_phone"]=$fetch[2];
}
 $data2[]=$data;
 echo json_encode($data2);
 
?>