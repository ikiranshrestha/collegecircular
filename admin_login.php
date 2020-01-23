<?php
session_start();
include_once("db.php");

//to prevent post related error while reloading
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $admin_user_id = $_POST['admin_user_id'];
    $admin_user_password = $_POST['admin_user_password'];
	
	$sql = "SELECT * FROM admin_user WHERE admin_user_id = '$admin_user_id' AND password = '$admin_user_password' ";
	$fire = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($fire);
	
	//holding login information in session variables
	$_SESSION['admin_username'] = $row['admin_user_id'];
	$_SESSION['admin_password'] = $row['password'];
	
    if(isset ($_POST['admin_login'])){
        if($admin_user_id== $row['admin_user_id'] && $admin_user_password == $row['password']){
            header('location: admin_interface.php');
        }else{
            echo"Invalid Credentials";
        }
    }
}
//message from admin_interface if unauthorized access is tried
if(!empty ($_GET)){
	$message = $_GET['message'];
	echo $message;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Administrator Access</title>
    <link rel="shortcut icon" href="includes\images\student_icon.png" />

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Administrator Access</h3>
            <form action="" method="post" class="form-group">
                <label for="admin_user_id"> Admin User Id</label>
                <input type="text" name="admin_user_id" placeholder="Enter your Admin User Id" class="form-control" id="admin_user_id">
                <label for="admin_user_password">Password</label>
                <input type="password" name="admin_user_password" placeholder="Enter your password" class="form-control" id="admin_user_password">
                <input type="submit" name="admin_login" value="Login" class="btn btn-success form-group"><br>
                <i>Not an Admin? Please Stay Away. Click <a href="mainpage.php">here</a>.</i>
            </form>
        </div>
    </div>
</div>
</body>
</html>