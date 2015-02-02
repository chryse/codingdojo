<html>
<head>
<title>My Form</title>
</head>
<body>

<h1>Welcome <?= $first_name; ?> <?php echo anchor('logout', 'logout'); ?></h1>
<h2>User Information</h2>
<p>First Name: <?= $first_name; ?></p>
<p>Last Name: <?= $last_name; ?></p>
<p>Email Name: <?= $email; ?></p>

</body>
</html>