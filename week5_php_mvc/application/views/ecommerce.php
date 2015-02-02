<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce</title>
	<meta charset="utf-8">
	<link href="/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		div.cart {
			float: right;
			font-size: 1.3em;
		}

		div.cart a {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Products</h1>
		<div class="cart"><a href="view-cart">Cart (<?= $cart; ?>)</a></div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>Description</td>
					<td>Price</td>
					<td colspan="2">Qty</td>
				</tr>
			</thaed>
			<tbody>
				<tr>
					<form action="add-cart" method="post">
						<td><?= $product0["name"]  ?></td>
						<td>$<?= $product0["price"] ?></td>
						<td>
							<select name="quantity">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</td>
						<td><button type="submit" class="btn btn-primary">Buy</button></td>
						<input type="hidden" name="product" value="1">
					</form>
				</tr>
				<tr>
					<form action="add-cart" method="post">
						<td><?= $product1["name"] ?></td>
						<td>$<?= $product1["price"] ?></td>
						<td>
							<select name="quantity">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</td>
						<td><button type="submit" class="btn btn-primary">Buy</button></td>
						<input type="hidden" name="product" value="2">
					</form>
				</tr>
			</tbody>
		</table>
		<a href="/"><button class="btn btn-primary">Go Back</button></a>
	</div>
</body>
</html>