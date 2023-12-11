

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login-page</title>
</head>
<body background="school2.jpg" class="img"> 
    <center>
        <div class="form_deg">
            <center class="title_form">
                Login Form
                <h4>
  


                <?php 

error_reporting(0);
session_start();
session_destroy();




?>



                </h4>
            </center>
            <Form action="login_check.php" method="post" class="login_form">
                <div>
                <label class="label_deg">UserName</label>
                <input type="text" name="username" >
             
                </div>
                <div> 
                <label class="label_deg">Password</label>
                <input type="password" name="password" >
                
               </div>  
               <div>
                
                <input type="submit" class="btn btn-success" name="submit" value="Login">
                </div>
                <label></label>
            </Form>
        </div>
    </center>
</body>
</html>