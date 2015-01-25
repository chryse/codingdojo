<!DOCTYPE html>
<html lang="en">
<head>
	<title>Email Validation with DB</title>
	<meta charset="utf-8">
	<style>
	body {
		font-size: 1.0em;
	}

	#wrapper {
		width: 600px;
		margin: 0 auto;
	}

	h1, h2, form, p {
		text-align: center;
	}

	form.reset {
		text-align: right;
	}

	form.reset input, button {
		width: 100px;
		height: 30px;
		background: red;
		color: white;
		border-radius: 5px;
		float: left;
		font-size: 1.0em;
	}

	button {
		background: #0eb;
		float: right;
	}

	button a {
		color: white;
		text-decoration: none;
		/*font-size: 1.3em;*/
	}

	input {
		display: block;
		width: 300px;
		height: 30px;
		margin: 0 auto;
		margin-bottom: 10px;
		font-size: 1.1em;
	}

	input.submit {
		background: #0eb;
		color: white;
		outline: none;
	}

	div.error {
		width: 100%;
		border: 1px solid #aaa;
		background: pink;
		text-align: center;
		padding: 40px 0;
		margin: 10px 0;
		font-size: 1.2em;
		color: white;
	}

	.success {
		border: 1px solid #aaa;
		background: lightgreen;
		text-align: center;
		padding: 40px 20px;
		margin: 10px 0;
		font-size: 1.2em;
		border-radius: 5px;
	}
	.red {
		color: red;
	}
	.output {
		padding: 20px;
		border: 1px solid #aaa;
		margin-bottom: 20px;
	}
	</style>
</head>