<!DOCTYPE html>
<html>
<head>
	<title>HTML Table</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style>
        * {
            font-family: Helvetica, Arial, Sans-serif;
        }
    	strong {
    		color: #222;
    	}
        table {
        	border-spacing: 0;
        }
        thead td {
            font-weight: bold;
        }
        tr:first-child td {
        	border-top: 1px solid #aaa;
        }
        td {
        	margin: 0;
            padding: 10px;
        	text-align: left;
        	border-bottom: 1px solid #aaa;
        	border-right: 1px solid #aaa;
        }
        td:first-child {
        	border-left: 1px solid #aaa;
        }
        tr:nth-child(5n) {
            background: lightgrey;
        }
    </style>
</head>
<body>
    <h1>HTML Table</h1>
    <?php
        $users = array(
                    ["first_name" => "Michael", "last_name" => "Choi"],
                    ["first_name" => "John", "last_name" => "Supsupin"],
                    ["first_name" => "Mark", "last_name" => "Guillen"],
                    ["first_name" => "KB", "last_name" => "Tonel"],
                    ["first_name" => "Hyunjun", "last_name" => "Kim"],
                    ["first_name" => "Dylan", "last_name" => "Lee"],
                    ["first_name" => "Michael", "last_name" => "Jordan"],
                    ["first_name" => "Kevin", "last_name" => "Callaway"],
                    ["first_name" => "James", "last_name" => "Bond"],
                    ["first_name" => "Harry", "last_name" => "Porter"],
                    ["first_name" => "Danniel", "last_name" => "Hart"],
                    ["first_name" => "Bluce", "last_name" => "Willis"],
                    ["first_name" => "Captain", "last_name" => "America"],
                    ["first_name" => "Penny", "last_name" => "Chang"],
                    ["first_name" => "Robinson", "last_name" => "William"]
            );
    ?>
    <table>
        <thead>
            <tr>
                <td>User#</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Full Name</td>
                <td>Full Name in upper case</td>
                <td>Length of full name (without spaces)</td>
            </tr>
        </thead>
        <tbody>
    <?php
        $row_num = 1;
        foreach($users as $user) {
    ?>
            <tr>
    <?php
            for($i = 0; $i < 6; $i++) {
    ?>
                <td>
    <?php
                if($i == 0) {
                    echo $row_num;
                }
                else if($i == 1) {
                    echo $user["first_name"];
                }
                else if($i == 2) {
                    echo $user["last_name"];
                }
                else if($i == 3) {
                    echo $user["first_name"] . " " . $user["last_name"];
                }
                else if($i == 4) {
                    echo strtoupper($user["first_name"] . " " . $user["last_name"]);
                }
                else if($i == 5) {
                    echo strlen($user["first_name"]) + strlen($user["last_name"]);
                }
    ?>
                </td>
    <?php
            }
        $row_num++;
    ?>
            </tr>
    <?php
        }
    ?>
        </tbody>
    </table>
</body>
<html>