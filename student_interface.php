<?php
session_start();
if (!isset($_SESSION['student_username']) AND !isset($_SESSION['student_password']))
{
    header("Location: student_login.php?message=Please Login as Student First");
    die();
}

include_once("db.php");
$sql="SELECT * FROM notices WHERE notice_for = 'student' OR notice_for = 'both'";
$fire = mysqli_query($connection, $sql);
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
    <title>Students' Side</title>
    <link rel="shortcut icon" href="includes\images\teacher_icon.png" />

</head>
<body>
<div class="header1">
				<center>
				<p>
				<img src="includes\images\student_icon.png" alt="student_icon" class="student_icon">
				<h3>Students' Side</h3>
				</p>
				</center>
	</div>
<div class="container-fluid">
    <div class="row">
		<div class="col-sm-9">
			<div class="main-field">
				<center>
					<table class="table table-striped table-hover tabledec">
						<thead class="table table-thead">
							<tr>
							<th>Notice Id</th>
							<th>Notice Title</th>
							<th>Notice Body</th>
							<th>Notice Publishing Day</th>
							</tr>
						</thead>
							<?php while ($row= mysqli_fetch_assoc($fire)){ ?>
							<tbody>
								<tr>
									<td><?php echo $row['noticeid'] ?></td>
									<td><?php echo $row['notice_title'] ?></td>
									<td><?php echo  $row['notice_body'] ?></td>
									<td>2019-23-32</td>
								</tr>
							</tbody>
							<?php } ?>
					</table>
				</center>
			</div>
		</div>
		<div class="col-sm-4 publishbtn">
				<a href="logout.php"><input type="submit" class="btn btn-danger" value="Logout"></a>
		</div>
    </div>
		<?php include ("footer.php") ?>
</body>
</html>