<?php
	session_start();
	if(isset($_FILES["csv_file"])) {
		unset($_FILES["csv_file"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSV Web App with Paginations</title>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
		body {
			font-size: "Helvetica Neue", helvetica, arial, sans-serif;
			font-size: 14px;
			line-height: 20px;
		}
		form {
			margin-top: 40px;
		}
		ul.bg-danger {
			border-radius: 5px;
			padding: 10px;
			font-size: 1.2em;
			line-height: 1.5em;
			padding-left: 30px;
			margin-top: 40px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="text-center">CSV Web App with Paginations</h1>

					<?php
						if(isset($_SESSION["errors"])) {
					?>
				<ul class="bg-danger">
					<?php
							foreach($_SESSION["errors"] as $error) {
								echo "<li>" . $error . "</li>";
							}
							unset($_SESSION["errors"]);
						}
					?>
				</ul>
				<form class="form-horizontal" method="post" action="csv_process.php" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-4 control-label">CSV File</label>
						<div class="col-sm-8">
							<input name="csv_file" type="file">
						</div>
					</div>
					<div class="form-group text-center">
						<div class="col-sm-12">
							<button class="btn btn-success" name="action" type="submit" value="submit">Submit</button>
						</div>
					</div>
					<!-- <input name="action" type="hidden" value="upload"> -->
					<!-- <input type="submit" value="Upload Image" name="submit"> -->
				</form>
			</div>
		</div>
	</div>

</body>
</html>
