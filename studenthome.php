<?php 
session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}elseif($_SESSION['user_type']==1){
    header('location:login.php');
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
		
		<h1>Student Dashboard</h1>



	</div>

</body>
</html>