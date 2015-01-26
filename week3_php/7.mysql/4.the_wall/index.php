<?php
	session_start();

	// unset success messages in SESSION
	if(isset($_SESSION["success_register"])) {
		unset($_SESSION["success_register"]);
	}

	if(isset($_SESSION["success_login"])) {
		unset($_SESSION["success_login"]);
	}

	include("header.php");
?>
<div class="container">
	<div class="row main-view">
		<h1>Welcome to the Wall</h1>
		<h2>Simple post system</h2>
	</div>
	<?php
		if(isset($_SESSION["errors"])) {
	?>
	<div class="row bg-danger error">
		<ul>
	<?php
			foreach($_SESSION["errors"] as $error) {
					echo "<li>$error</li>";
			}
			unset($_SESSION["errors"]);
	?>
		</ul>
	</div>
	<?php
		}
	?>
	
	<div class="row">
		<div class="col-sm-6">
			<h2>Login</h2>
				<form method="post" action="login_process.php">
					<input name="action" type="hidden" value="login">
					<div class="form-group">
						<label>Email address:</label>
						<input name="email" type="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input name="password" type="password" class="form-control">
					</div>
					<div class="text-right">
						<button name="login" type="submit" class="btn btn-primary">Log In</button>
					</div>
				</form>
			</div>
		<div class="col-sm-6">
		<h2>Registration</h2>
			<form method="post" action="login_process.php">
				<input name="action" type="hidden" value="registration">
				<div class="form-group">
					<label>First Name:</label>
					<input name="first_name" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Last Name:</label>
					<input name="last_name" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Emali:</label>
					<input name="email" type="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input name="password" type="password" class="form-control">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input name="confirm_password" type="password" class="form-control">
				</div>
				<div class="text-right">
					<button name="registration" type="submit" class="btn btn-primary">Registration</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	include("footer.php");
?>