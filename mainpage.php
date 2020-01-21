<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> !-->
    <link rel="stylesheet" href="includes\bootstrap-4.4.1-dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

    <title>Notice Circulation</title>
    <link rel="shortcut icon" href="includes\images\cc_icon.png" />

</head>
<body>
<div class="wrapper">
    <div class="row">
        <div class="col-sm-8">
            <h3>Get your college notifications</h3>
            <h4>Select your account type</h4>
            <a href="teacher_login.php"><input type="submit" class="form-control form-group btn btn-warning" name="teacher_login" value="Teacher"></a>
            <a href="student_login.php"><input type="submit" class="form-control btn btn-success" name="student_login" value="Student"></a>

        </div>
    </div>
</div>
	<?php include ("footer.php") ?>
</body>
</html>
