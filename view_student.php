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
$sql="SELECT * FROM user WHERE user_type='0'";
$res=mysqli_query($conn,$sql);

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
		
		<h1>view_student</h1>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">password</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
    <?php   
    while($row=$res->fetch_assoc()){
    
    ?>
    <tr>
      <td><?php echo "{$row['username']}" ?></td>
      <td><?php echo "{$row['email']}" ?></td>
      <td><?php echo "{$row['phone']}" ?></td>
      <td><?php echo "{$row['password']}" ?></td>
      <td><?php echo "<a onclick=\"javascript:return confirm('Do you sure ');\" class='btn btn-primary' href='delete.php?id={$row['id']}'>Delete</a>" ?>
    </td>
    <td><?php echo "<a  class='btn btn-danger' href='update_student.php?id={$row['id']}'>Update</a>" ?>
    </td>
    </tr>
  <?php 
    }
  ?>
  </tbody>
</table>

	</div>

</body>
</html>