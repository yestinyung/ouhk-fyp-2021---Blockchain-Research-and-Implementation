<?php 
    header("Content-Type: text/html; charset=utf8");
    $stud_id=$_GET['stud_id'];
    $pw=$_GET['pw'];
	$blockchain_code=$_GET['blockchain_code'];
	$type=$_GET['type'];
    include('connect.php');
	$sql = "select * from user where blockchain_code='$blockchain_code'";
    $result = mysqli_query($con,$sql);
    $rows=mysqli_num_rows($result);
    if($rows){
        exit;
    }
    $q="insert into user(stud_id,pw,blockchain_code,type) values ('$stud_id','$pw','$blockchain_code','$type')";
    $reslut=mysqli_query($con,$q);
    if (!$reslut){
        die('Error: ' . mysqli_error());
    }
    mysqli_close($con);
?>
