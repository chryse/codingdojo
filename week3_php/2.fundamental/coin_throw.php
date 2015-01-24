<!DOCTYPE html>
<html>
<head>
	<title>States Array</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="">
    <style> 
        h4 {
            text-decoration: underline;
        }
        p {
            color: grey;
            line-height: 1.5em;
        }
        h4, strong {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Coin Throw</h1>
    <h4>Starting the program</h4>
    <p>
    <?php
        $total_heads = 0;
        $total_tails = 0;
        $total_attempts = 5000;
        for($i = 1; $i <= $total_attempts; $i++) {
    ?>
        Attemp # <strong><?= $i; ?></strong> : Throwing a coin... It's a <strong>
    <?php
        $current_coin = throw_coin();
        if($current_coin == "head") {
            $total_heads++;
        }
        else {
            $total_tails++;
        }
        echo $current_coin;
    ?>
    </strong> Got <strong><?= $total_heads; ?></strong> head(s) so far and <strong><?= $total_tails; ?></strong> tails(s) so far<br />
    <?php
        }
    ?>
    </p>
    <h4>Ending the programs - thank you!</h4>

    <?php
        function throw_coin() {
            $coin = rand(0,1);
            if ($coin == 0) {
                return "tail";
            }
            else {
                return "head";
            }
        }
    ?>
    

</body>
</html>