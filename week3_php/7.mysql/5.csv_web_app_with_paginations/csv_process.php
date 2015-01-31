<?php
	session_start();

	define("PAGE_SIZE", 20);

	// $target_dir = "uploads/";
	// $target_file = $target_dir . basename($_FILES["csv_file"]["name"]);
	// $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
	$errors = [];
	$success = "";

	// check file is posted
	if(empty($_FILES["csv_file"]["name"])) {
		// $errors[] = "Sorry, please upload your csv file";
	}

	else {
		// check file existence
		if (file_exists($target_file)) {
			// $errors[] = "Sorry, file already exists.";
		}

		// Allow certain file formats
		if($file_type != "csv") {
			// $errors[] = "Sorry, only CSV files are allowed.";
		}
	}

	// check numbers of erros
	if (count($errors) > 0) {
	    // $_SESSION["errors"] = $errors;
	    // header("location: index.php");
	    // die();
	}

	// if everything is ok, try to upload file
	else {
	    
	    // if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
	        // $success = "The file ". basename( $_FILES["csv_file"]["name"]). " has been uploaded.";
	        
	        // while(file_exists($target_file)) {
	        // 	$data = get_csv($target_file);

	        // 	// get out from while
	        // 	if(file_exists($target_file)) break;
	    // 	}
	    // }

	    // else {
	        // echo "<p class='bg-danger'>Sorry, there was an error uploading your file.</p>";
	    // }
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>CSV Web App with Paginations</title>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style>
		.bg-success {
			padding: 30px;
		}
	</style>
</head>
<body>
	<div class='bg-success'><?= $success; ?></div>
	
	<?php
		// $data = get_csv($target_file);
		$data = get_csv("uploads/us-500.csv");
		draw_csv($data, PAGE_SIZE);
		// var_dump(draw_csv($data, PAGE_SIZE));
		// var_dump($data);
	?>

</body>
</html>

<?php
	// get csv
	function get_csv($file) {
		// set this configuration to detect '\r'
		ini_set('auto_detect_line_endings', true);

		$result = [];

		if (($handle = fopen($file, "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $result[] = $data;
		        // var_dump($data);
		        // echo "<br /><br />";
		    }
		    fclose($handle);
		}
		return $result;
	}

	// draw csv
	function draw_csv($data, $page_size) {
		
		$result_html = array();
		$page_num = floor(count($data) / $page_size);
		$last_page = count($data) % $page_size;
		// $col_len = count($data[0]);

		$page = 0;
		for($i = 0; $i < count($data) / $page_size; $i++) {

			for($j = count($data)/$page_size*$i; $j < $page_size; $j++) {
				echo "$j $i<br />";
			}
			$page++;
			// echo "$i $page <br />";
		}
		
    	// return $result_html;
	}
?>
