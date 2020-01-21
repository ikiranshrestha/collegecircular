<?php
session_start();
if (!isset($_SESSION['admin_username']) AND !isset($_SESSION['admin_password']))
{
    header("Location: admin_login.php?message=Please Login as Administrator First");
    die();
}
echo "Hello ".$_SESSION['admin_username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
    <title>Admin Side</title>
    <link rel="shortcut icon" href="includes\images\admin_logo.png" />

</head>
<body>
<div class="header1">
				<center>
				<p>
				<img src="includes\images\admin_logo.png" alt="admin_logo" class="admin_logo">
				<h3>Admin Side</h3>
				</p>
				</center>
	</div>
<div class="container-fluid">
    <div class="row">
		<div class="col-sm-3">
				<div class="sidebar">
					<h3>Options</h3>
						<ul class="nav navbar-nav">
							<li class="nav-item active"><a href="add_notice.php" class="nav-link">Add Notice</a></li>
							<li class="nav-item">Update Notice </li>
							<li class="nav-item">Delete Notice</li>
							<a href="logout.php"><li class="nav-item">Logout</li></a>
						</ul>
				</div>
		</div>
		<div class="col-sm-9">
			<div class="main-field">
				<center>
				<h3>Alert</h3>
				<p>Hello, This is Kiran Shrestha building his first CMS.</p>
		
				</center>
			</div>
		</div>
    </div>
	
	<?php include ("footer.php") ?>
</body>
</html>
