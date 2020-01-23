<?php
session_start();
include_once("db.php");

//to prevent post related error while reloading
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $student_user_id = $_POST['student_user_id'];
    $student_user_password = $_POST['student_user_password'];
	
	$sql = "SELECT * FROM student_user WHERE student_user_id = '$student_user_id' AND password = '$student_user_password' ";
	$fire = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($fire);
	
	//holding login information in session variables
	$_SESSION['student_username'] = $row['student_user_id'];
	$_SESSION['student_password'] = $row['password'];
	
	//login validation
    if(isset ($_POST['student_login'])){
        if($student_user_id == $row['student_user_id'] && $student_user_password == $row['password']){
            header('location: student_interface.php');
        }else{
            echo"Invalid Credentials";
        }
    }
}
//message from student_interface if unauthorized access is tried
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

    <title>Student Side</title>
    <link rel="shortcut icon" href="includes\images\student_icon.png" />

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Are you a student?</h3>
            <form action="" method="post" class="form-group">
                <label for="student_user_id"> Student User Id</label>
                <input type="text" name="student_user_id" placeholder="Enter your Student User Id" class="form-control" id="student_user_id">
                <label for="student_user_password">Password</label>
                <input type="password" name="student_user_password" placeholder="Enter your password" class="form-control" id="student_user_password">
                <input type="submit" name="student_login" value="Login" class="btn btn-success form-group"><br>
                <i>Not a Student but a Teacher? Click <a href="teacher_login.php">here</a>.</i>
            </form>
        </div>
    </div>
</div>
</body>
</html>