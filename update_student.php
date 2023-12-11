<?php 
session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}elseif($_SESSION['user_type']==0){
    header('location:login.php');
}
$host="localhost";
$user="root";
$pass="";
$db="studentproject";
$id=$_GET['id'];
$conn=mysqli_connect($host,$user,$pass,$db);
$sql="SELECT * FROM user WHERE id='$id'";
$res=mysqli_query($conn,$sql);
$row=$res->fetch_assoc();
#################################UPDATE######################
if(isset($_POST['update'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $sql2="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password'";
    $res2=mysqli_query($conn,$sql2);
    if($res2){
        echo "<script>
        alert('Update Successfully');
        </script>";
        header('location:view_student.php');
    }else{
        echo "<script>
        alert('Update Field');
        </script>";
        header('locaton:view_student.php');
    }

}





?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<?php include('admin_css.php'); ?>
</head>
<body>

	<?php include('admin_sidbar.php'); ?>


	<div class="content">
		
        <h1>Update Student</h1>
        <form action="#" method="post">
   <div class="mb-3">
<label  class="form-label">Username</label>
<input type="text" name="username" class="form-control" value="<?php echo "{$row['username']}" ?>">
   </div>
  <div class="mb-3">
    <label  class="form-label">email</label>
    <input type="email" name="email" class="form-control" value="<?php echo "{$row['email']}"?>">
  </div>

  <div class="mb-3">
    <label class="form-label">phone</label>
    <input type="number" name="phone" class="form-control" value="<?php echo "{$row['phone']}"?>">
  </div> 

  <div class="mb-3">
    <label  class="form-label">password</label>
    <input type="password" name="password" class="form-control" value="<?php echo "{$row['password']}"?>">
  </div>

 <input type="submit" style="margin:10px;" class="btn btn-primary" name="update"  value="Update">
</form>
      
		



	</div>

</body>
</html>