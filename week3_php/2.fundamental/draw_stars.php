<!DOCTYPE html>
<html>
<head>
	<title>Draw Stars</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style> 
    </style>
</head>
<body>
    <h1>Draw Stars</h1>
    <?php
        function draw_stars($array) {
            foreach($array as $num) {
                for($i = 0; $i < $num; $i++) {
                    echo "*";
                }
                echo "<br />";
            }
        }
        $arr = [4, 6, 1, 3, 5, 7, 25];
    ?>
    <p>
        $arr = [4, 6, 1, 3, 5, 7, 25];<br />
    <?php
        draw_stars($arr);
    ?>
    </p>
    <hr />
    <h1>Part 2</h1>
    <?php
        function draw_array($array) {
            foreach($array as $value) {
                if(gettype($value) == "integer") {
                    for($i = 0; $i < $value; $i++) {
                        echo "*";
                    }
                }
                else if(gettype($value) == "string") {
                    for($i = 0; $i < strlen($value); $i++) {
                        echo strtolower($value[0]);
                    }
                }
                echo "<br />";
            }
        }
        $x = [4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith"];
    ?>
    <p>
        $x = [4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith"];<br />
    <?php
        draw_array($x);
    ?>
    </p>
</body>
</html>