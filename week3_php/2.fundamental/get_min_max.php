<!DOCTYPE html>
<html>
<head>
	<title>Get Min and Max</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style> 
        p {
            line-height: 1.5em;
        }
    </style>
</head>
<body>
    <h1>Get Min and Max</h1>
    <?php
        function get_max_min($array) {
            $result = array();
            $min = $max = $array[0];
            foreach($array as $value) {
                if($min > $value) {
                    $min = $value;
                }
                if($max < $value) {
                    $max = $value;
                }
            }
            $result["min"] = $min;
            $result["max"] = $max;
            return $result;
        }
        $sample = [1345, 2.4, 2.67, 1.23, 332, 2, 1.02];
        $output = get_max_min($sample);
    ?>
    <p>
        <strong>
        input: $sample = [1345, 2.4, 2.67, 1.23, 332, 2, 1.02];<br />
        <?php
            var_dump($output);
        ?>
        </strong>
    </p>
</body>
</html>