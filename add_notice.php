<?php
include_once("db.php");
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	if(isset ($_POST['publish'])){
	if($_POST['publish']=='Publish'){
			$notice_title = $_POST['notice_title'];
			$notice_for = $_POST['notice_for'];
			$notice_body = $_POST['notice_body'];
			$publishing_date = date("Y/m/d");;
			
			/*print_r($_POST); */
			
			$sql= "INSERT INTO notices(notice_title, notice_for, notice_body, publishing_date) VALUES('$notice_title', '$notice_for', '$notice_body', '$publishing_date')";
			$fire= mysqli_query($connection, $sql);
			/*if($fire){
				echo "true";
			}*/	
	}

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php' ?>
    <title>Admin Side</title>
    <link rel="shortcut icon" href="" />

</head>
<body>
	<div class="container">
					<form class="" method="post" action="">
					<div class="row">
						<div class="col-sm-8 add-notice-text">
							<label for = "notice_title">Notice Title</label>
							<input type ="text" name="notice_title" class="form-control" placeholder="Enter suitable title for the following Notice" id="notice_title">
							<label for ="notice_for">Notice for</label><br/>
								<label><input type="radio" name="notice_for" value="teacher" class="form-group">Teachers Only</label><br/>
								<label><input type="radio" name="notice_for" value="student" class="form-group">Students Only</label><br/>
								<label><input type="radio" name="notice_for" value="both" class="form-group">Both - Teachers and Students</label><br/>
							<label for = "notice_body">Notice Body</label>
							<textarea name="notice_body" class="form-control" placeholder="Write your Notice" id="notice_body" rows="25" cols="50"></textarea>		
						</div>
						<div class="col-sm-4 publishbtn">
							<input type="submit" name="publish" class="btn btn-success" value="Publish">
						</div>
					</div>
					</form>
				
	</div>
		<?php include ("footer.php") ?>
</body>
</html>