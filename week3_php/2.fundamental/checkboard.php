<!DOCTYPE html>
<html>
<head>
	<title>Checkerboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style>
        table {
            border-spacing: 0;
        }
        td {
            width: 30px;
            height: 30px;
        }
        .red {
            background: red;
        }
        .black {
            background: black;
        }
        
    </style>
</head>
<body>
    <h1>Checkerboard</h1>
    <?php
        define("ROW", 10);
        define("COL", 10);

        function get_color($row, $col) {
            if($row % 2 == 0) {
                if($col % 2 == 0) {
                    return "red";
                }
                else {
                    return "black";
                }
            }
            else {
                if($col % 2 == 0) {
                    return "black";
                }
                else {
                    return "red";
                }
            }
        }
    ?>
    <table>
    <?php
        for($i = 0; $i < ROW; $i++) {
    ?>
        <tr>
    <?php
            for($j = 0; $j < COL; $j++) {        
    ?>
            <td class="<?= get_color($i, $j) ?>"></td>
    <?php
            }
    ?>
        </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>