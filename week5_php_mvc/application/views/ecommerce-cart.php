<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Cart</title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<a href="ecommerce"><button class="btn btn-danger">Go Back</button></a>
		<h1>Cart</h1>
		<h3>Check out</h3>
		<?= $table; ?>
		<p>Total: $<?= $total; ?></p>
		<h3>Billin Address</h3>
		<form class="form-horizontal" method="post" action="order">
			<div class="form-group">
				<label class="col-sm-2 form-label">Name:</label>
				<div class="col-sm-4">
					<input name="name" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 form-label">Address</label>
				<div class="col-sm-4">
					<input name="address" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 form-label">Card #:</label>
				<div class="col-sm-4">
					<input name="card_num" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-4">
					<button type="submit" class="btn btn-primary">Order</button>
					<input type="hidden" name="order" value="order_now">
				</div>
			</div>
		</form>
	</div>
</body>
</html>