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
$sql="SELECT * FROM teacher WHERE id='$id'";
$res=mysqli_query($conn,$sql);
$row=$res->fetch_assoc();
if(isset($_POST['updateteacher'])){
    $name=$_POST['name'];
    $description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql2="UPDATE teacher SET name='$name',description='$description',image='$dst_db'";
    $res2=mysqli_query($conn,$sql2);
    if($res2){
        header('location:view_teacher.php');
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
		
		<h1>Update Teacher</h1>

        <form action="#" method="post" enctype="multipart/form-data">
   <div class="mb-3">
<label  class="form-label">Teacher Name</label>
<input type="text" name="name" class="form-control" value="<?php echo "{$row['name']}" ?>">
   </div>
  <div class="mb-3">
    <label  class="form-label">description</label>
    <textarea name="description" class="form-control"><?php echo "{$row['description']}" ?></textarea>
  </div>

  <div class="mb-3">
    <label  class="form-label">Current image</label><br>
    <img src="<?php echo "{$row['image']}" ?>" height="80px;">
  </div>
  <br>
  <div class="mb-3">
    <label  class="form-label">image</label>
    <input type="file" name="image">
  </div>

 <input type="submit" class="btn btn-primary" name="updateteacher" style="margin:10px;" value="Submit">
</form>

	</div>

</body>
</html>