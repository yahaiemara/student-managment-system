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
 $sql="SELECT * FROM admission";
$res=mysqli_query($conn,$sql);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admission</title>

	<?php include('admin_css.php'); ?>
</head>
<body>

	<?php include('admin_sidbar.php'); ?>


	<div class="content">
		
		<h1>Admission</h1>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">message</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=$res->fetch_assoc()){

     ?> 
    <tr>
      <td><?php echo "{$row['name']}" ?></td>
      <td><?php echo "{$row['email']}" ?></td>
      <td><?php echo "{$row['phone']}" ?></td>
      <td><?php echo "{$row['message']}" ?></td>
    </tr>
  <?php 
    }
  ?>

   
  </tbody>
</table>

	</div>

</body>
</html>