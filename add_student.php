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
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die(mysqli_error());
}

if(isset($_POST['add_student'])){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $usertype=0;
    $check="SELECT *FROM user WHERE username='$name'";
    $check_query=mysqli_query($conn,$check);
   $row=mysqli_num_rows($check_query);
    if($row==1){
        echo "<script>
        alert('this name is alerdy exists,please try anthor name');
        </script>";
    }else{

    $sql="INSERT INTO user(username,email,user_type,phone,password)VALUES('$name','$email','$usertype','$phone','$password')";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<script>
        alert('Add Student Successfully');
        </script>";
    }else{
       echo "<script>
        alert('Upload Filed');
        </script>";
    }
}
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Student</title>

	<?php include('admin_css.php'); ?>
</head>
<body>

	<?php include('admin_sidbar.php'); ?>


	<div class="content">
		
		<h1>Admin Student</h1>


<form action="#" method="post">
   <div class="mb-3">
<label  class="form-label">Username</label>
<input type="text" name="username" class="form-control">
                       </div>
  <div class="mb-3">
    <label  class="form-label">email</label>
    <input type="email" name="email" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">phone</label>
    <input type="number" name="phone" class="form-control">
  </div> 

  <div class="mb-3">
    <label  class="form-label">password</label>
    <input type="password" name="password" class="form-control">
  </div>

 <input type="submit" class="btn btn-primary" name="add_student"  value="Submit">
</form>
	</div>

</body>
</html>