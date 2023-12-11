<?php   
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$pass="";
$db="studentproject";

$conn=mysqli_connect($host,$user,$pass,$db);

if($conn===false){

    die(mysqli_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=$_POST['username'];

$pass=$_POST['password'];

 
$mysql="select *from user where username='".$name."' AND password='".$pass."' ";

$res=mysqli_query($conn,$mysql); 

$row=mysqli_fetch_array($res);

if($row["user_type"]==0){

    $_SESSION['username']=$name;

    $_SESSION['user_type']=0;

    header('location:studenthome.php');

}elseif($row["user_type"]==1){

    $_SESSION['username']=$name;

    $_SESSION['user_type']=1;

header('location:adminstudent.php');
}else{
    
        $mess= "username and password field";

        $_SESSION["loginmess"]=$mess;

        header('location:login.php');
}
}





?>