<?php $this->load->view("header")?>
<body>

<div id="main" class="container">
	<div class="row">
		<h1><i class="fa fa-book"></i> Book Review</h1>
<?
	if($this->session->flashdata("login_errors")) {
		echo "<div class='bg-danger'><p>";
		echo $this->session->flashdata("login_errors");
		echo "</p></div>";
	}
?>		
		<div class="col-md-6">
			<h2>Register</h2>
			<form method="post" action="/home/login_process">
				<div class="form-group">
					<label>Name</label>
					<input class="form-control" name="name" type="text">
				</div>
				<div class="form-group">
					<label>Alias</label>
					<input class="form-control" name="alias" type="text">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" name="email" type="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" name="password" type="password">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input class="form-control" name="confirm_password" type="password">
				</div>
				<div class="form-group text-right">
					<input type="hidden" name="action" value="register">
					<button class="btn btn-primary" type="submit">Register</button>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h2>Login</h2>
			<form method="post" action="/home/login_process">
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" name="email" type="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" name="password" type="password">
				</div>
				<div class="form-group text-right">
					<input type="hidden" name="action" value="login">
					<button class="btn btn-primary" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>