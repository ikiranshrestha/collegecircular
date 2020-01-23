<?php
session_start();
include_once("db.php");

//to prevent post related error while reloading
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $teacher_user_id = $_POST['teacher_user_id'];
    $teacher_user_password = $_POST['teacher_user_password'];
	
	
	$sql= "SELECT * FROM teacher_user WHERE teacher_user_id = '$teacher_user_id' AND password = '$teacher_user_password'";
	$fire= mysqli_query($connection, $sql);
	$row= mysqli_fetch_assoc($fire);
	
	
	//holding login information in session variables
	$_SESSION['teacher_username'] = $teacher_user_id;
	$_SESSION['teacher_password'] = $teacher_user_password;
	
    if(isset ($_POST['teacher_login'])){
				//login validation
	if($teacher_user_id== $row['teacher_user_id'] AND $teacher_user_password == $row['password']){
		header("Location: teacher_interface.php");
		echo "Hello ".$teacher_user_id;
	}else{
		echo"Invalid credentials";
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

    <title>Teaching Faculty</title>
    <link rel="shortcut icon" href="includes\images\teacher_icon.png" />

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Are you a teaching faculty?</h3>
            <form action="" method="post" class="form-group">
                <label for="teacher_user_id"> Teacher User Id</label>
                <input type="text" name="teacher_user_id" placeholder="Enter your Teacher User Id" class="form-control" id="teacher_user_id">
                <label for="teacher_user_password">Password</label>
                <input type="password" name="teacher_user_password" placeholder="Enter your password" class="form-control" id="teacher_user_password">
                <input type="submit" name="teacher_login" value="Login" class="btn btn-success form-group"><br>
                <i>Not a Teacher but Student? Click <a href="student_login.php">here</a>.</i>
            </form>
        </div>
	
    </div>
</div>
</body>
</html>
