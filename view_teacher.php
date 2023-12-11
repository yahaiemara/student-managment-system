<?php 
session_start();
error_reporting(0);
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
$sql="SELECT * FROM teacher";
$res=mysqli_query($conn,$sql);
if($_GET['id']){
    $id=$_GET['id'];
    $sql2="DELETE FROM teacher WHERE id='$id'";
    $res=mysqli_query($conn,$sql2);
    if($res){
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
		<center><h1>view Teacher</h1></center>
		
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Teacher Name</th>
      <th scope="col">About Teacher</th>
      <th scope="col">Image</th>
        <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
    <?php  while($row=$res->fetch_assoc()){

     ?>
    <tr>
      <td><?php echo "{$row['name']}" ?></td>
      <td><?php echo "{$row['description']}" ?></td>
      <td>
        <img height="50px;" src="<?php echo "{$row['image']}" ?>">
      </td>
      <td> 
        <?php   
        echo "<a href='view_teacher.php?id={$row['id']}' class='btn btn-danger'>Delete</a>"
        
        ?>
      </td>
      <td> 
        <?php   
        echo "<a href='Update_teacher.php?id={$row['id']}' class='btn btn-primary'>Update</a>"
        
        ?>
      </td>
    </tr>
    <?php } ?>
  
  </tbody>
</table>


	</div>

</body>
</html>