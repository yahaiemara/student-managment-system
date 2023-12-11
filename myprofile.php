<?php 
session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}elseif($_SESSION['user_type']==1){
    header('location:login.php');
}
$host="localhost";
$user="root";
$pass="";
$db="studentproject";
$conn=mysqli_connect($host,$user,$pass,$db);
$name=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$name'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
if(isset($_POST['profile'])){
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$sql2="UPDATE user SET email='$email',phone='$phone',password='$password' WHERE username='$name'";
$res2=mysqli_query($conn,$sql2);
if($res2){
    $_SESSION['updateprofile']="تم التحديث بنجاح ";
    header('location:myprofile.php');
}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>studetn Dashboard</title>

	<?php include('admin_css.php'); ?>
</head>
<body>
<?php include('studetn_sidbar.php'); ?>


	<div class="content">
		<?php 
        if(isset($_SESSION['updateprofile'])){
            echo $_SESSION['updateprofile'];
        }unset($_SESSION['updateprofile']);
        
        ?>
    <form action="#" method="post">
   
  <div class="mb-3">
    <label  class="form-label">email</label>
    <input type="email" name="email" class="form-control" value="<?php echo "{$row['email']}" ?>">
  </div>

  <div class="mb-3">
    <label class="form-label">phone</label>
    <input type="number" name="phone" value="<?php echo "{$row['phone']}" ?>" class="form-control">
  </div> 

  <div class="mb-3">
    <label  class="form-label">password</label>
    <input type="password" name="password" value="<?php echo "{$row['password']}" ?>" class="form-control">
  </div>

 <input type="submit" class="btn btn-primary" name="profile"  value="Update" style="margin:10px;">
</form>



	</div>

</body>
</html>