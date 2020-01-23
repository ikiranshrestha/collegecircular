<?php
session_start();

//if user attempts to access to this page without logging in, throw the user to login page
if (!isset($_SESSION['teacher_username']) AND !isset($_SESSION['teacher_password']))
{
    header("Location: teacher_login.php?message=Please Login as Teacher First");
    die();
}

include_once("db.php");
$sql="SELECT * FROM notices WHERE notice_for = 'teacher' OR notice_for = 'both' ORDER BY noticeid DESC";
$fire = mysqli_query($connection, $sql);
					
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
    <title>Teachers' Side</title>
    <link rel="shortcut icon" href="includes\images\teacher_icon.png" />

</head>
<body>
<div class="header1">
				<center>
				<p>
				<img src="includes\images\teacher_icon.png" alt="teacher_icon" class="teacher_icon">
				<h3>Teachers' Side</h3>
				</p>
				</center>
	</div>
<div class="container-fluid">
    <div class="row">
		<div class="col-sm-5">
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
									<td><?php echo $row['publishing_date'] ?></td>
								</tr>
							</tbody>
							<?php } ?>
					</table>
				</center>
			</div>
		</div>
		<div class="col-sm-6">
			<form class="" method="post" action="">
					<div class="row">
						<div class="col-sm-8 add-notice-text">
							<label for = "information_title">Information Title</label>
							<input type ="text" name="information_title" class="form-control" placeholder="Enter suitable title for the following Information" id="information_title">
							<label for ="information_for">Information for</label><br/>
								<label><input type="radio" name="information_for" value="administration" class="form-group">Administration Only</label><br/>
								<label><input type="radio" name="information_for" value="student" class="form-group">Students Only</label><br/>
								<label><input type="radio" name="information_for" value="both" class="form-group">Both - Administration and Students</label><br/>
							<label for = "notice_body">Information Details</label>
							<textarea name="information_details" class="form-control" placeholder="Write your Details" id="information_details" rows="25" cols="50"></textarea>		
						</div>
						<div class="col-sm-1 publishbtn">
							<input type="submit" name="send" class="btn btn-success" value="Send">
						</div>
					</div>
					</form>
		</div>
		<div class="col-sm-1 publishbtn">
				<a href="logout.php"><input type="submit" class="btn btn-danger" value="Logout"></a>
		</div>
    </div>
		<?php include ("footer.php") ?>
</body>
</html>