<?php 
session_start();

$host="localhost";
$user="root";
$pass="";
$dbname="studentproject";
$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn==true)
{
    die(mysqli_error());
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];
    $sql="INSERT INTO admission(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['message']="Send Data Successfully";
        header('location:index.php');
    }else{
        $_SESSION['messagealert']="Erro";
        header('location:index.php');
    }
}










?>