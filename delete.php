<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$pass="";
$db="studentproject";
$conn=mysqli_connect($host,$user,$pass,$db);
if($_GET['id']){
    $id=$_GET['id'];
    $sql="DELETE FROM user WHERE id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['message']="Deleted Successfully";
        header('location:view_student.php');
    }
}





?>