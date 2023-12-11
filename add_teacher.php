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
if(isset($_POST['addteacher'])){
    $name=$_POST['teachername'];
    $description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql="INSERT INTO teacher(name,description,image) VALUES('$name','$description','$dst_db')";
    $res=mysqli_query($conn,$sql);
    if($res){
$_SESSION['addteacher']='تم اضافه المدرس بنجاح';
header('location:add_teacher.php');
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Teacher</title>
<?php 

if(isset($_SESSION['addteacher'])){
    echo $_SESSION['addteacher'];
}unset($_SESSION['addteacher']);


?>
	<?php include('admin_css.php'); ?>
</head>
<body>

	<?php include('admin_sidbar.php'); ?>


	<div class="content">
		<center>
        <h1>Add Teacher</h1>
        </center>
		<form action="#" method="post" enctype="multipart/form-data">
   <div class="mb-3">
<label  class="form-label">Teacher Name</label>
<input type="text" name="teachername" class="form-control">
   </div>
  <div class="mb-3">
    <label  class="form-label">description</label>
    <textarea name="description" class="form-control"></textarea>
  </div>


  <div class="mb-3">
    <label  class="form-label">image</label>
    <input type="file" name="image">
  </div>

 <input type="submit" class="btn btn-primary" name="addteacher" style="margin:10px;" value="Submit">
</form>



	</div>

</body>
</html>