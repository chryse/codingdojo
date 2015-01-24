<!DOCTYPE html>
<html>
<head>
	<title>States Array</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style>
    	div {
            display: inline-block;
            width: 200px;
            height: 400px;
            border: 1px solid #aaa
        }
        select {
            width: 150px;
            height: 30px;
            font-size: 1.5em;
            margin: 0 25px;
        }
        h4 {
            text-align: center;
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <h1>States Array</h1>
    <?php
        $states = array("CA", "WA", "VA", "UT", "AZ");
        
        function show_list($list) {
            for($i = 0; $i < count($list); $i++) {
                echo "<option value='" . $list[$i] . "'>" . $list[$i] . "</option>";
            }
        }

        function show_list1($list) {
            foreach($list as $value) {
                echo "<option value='" . $value . "'>" . $value . "</option>";
            }
        }

        $states1 = array("CA", "WA", "VA", "UT", "AZ", "NJ", "NY", "DE");
        function insert_list($list) {
            $list[] = "NJ";
            $list[] = "NY";
            $list[] = "DE";
            show_list1($list);
        }
    ?>
    <div>
        <h4>For loop</h4>
        <select>
            <? show_list($states) ?>
        </select>
    </div>
    <div>
        <h4>Foreach loop</h4>
        <select>
            <? show_list1($states) ?>
        </select>
    </div>
    <div>
        <h4>Insert states</h4>
        <select>
            <? insert_list($states) ?>
        </select>
    </div>
</body>
</html>