<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration without DB</title>
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
		.red {
			color: red;
		}
		.small {
			font-size: 0.9em;
		}
		.input-group-addon {
			background-color: rgba(255, 255, 255, 0);
			border: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="text-center">Registration without DB</h1>

					<?php
						if(isset($_SESSION["error_messages"])) {
					?>
				<ul class="bg-danger">
					<?php
							foreach($_SESSION["error_messages"] as $error) {
								echo "<li>" . $error . "</li>";
							}
							unset($_SESSION["error_messages"]);
						}
					?>
				</ul>
				<form class="form-horizontal" method="post" action="registration_without_db_control.php" enctype="multipart/form-data">
					<div class="form-group">
    					<label class="col-sm-3 control-label">Email <span class="red">*</span></label>
    					<div class="col-sm-7">
      						<input class="form-control" name="email" type="email">
    					</div>
  					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">First Name <span class="red">*</span></label>
						<div class="col-sm-7">
							<input class="form-control" name="first_name" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Last Name <span class="red">*</span></label>
						<div class="col-sm-7">
							<input class="form-control" name="last_name" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Password <span class="red">*</span></label>
						<div class="col-sm-7">
							<input class="form-control" name="password" type="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Confirm Password <span class="red">*</span></label>
						<div class="col-sm-7">
							<input class="form-control" name="confirm_password" type="password">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Birth Date</label>
						<div class="col-sm-9">
							<div class="input-group">
      							<div class="input-group-addon">Mon</div>
      							<select class="form-control" name="mon" value="0">
								<?php for ($i=1; $i <= 12 ; $i++) { ?>
									<option><?= $i; ?></option>
      							<?php } ?>
								</select>
								<div class="input-group-addon">Day</div>
      							<select class="form-control" name="day" value="0">
								<?php for ($i=1; $i <= 31 ; $i++) { ?>
									<option><?= $i; ?></option>
      							<?php } ?>
								</select>
								<div class="input-group-addon">Year</div>
      							<select class="form-control" name="year" value="0">
								<?php for ($i=2015; $i >=1900 ; $i--) { ?>
									<option><?= $i; ?></option>
      							<?php } ?>
								</select>
    						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Profile Picture</label>
						<div class="col-sm-7">
							<input name="profile_picture" type="file">
						</div>
					</div>
					<div class="form-group text-right">
						<div class="col-sm-10">
							<button class="btn btn-success" name="submit" type="submit">Submit</button>
						</div>
					</div>
					<input name="registration" type="hidden" value="registration">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
