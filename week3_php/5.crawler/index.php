<?php
    //connecting to a remote url using curl

    //see http://www.php.net/manual/en/function.curl-setopt.php for more info
    $url = "http://www.bing.com/search?q=coding+ninja&go=Submit&qs=n&form=QBLH&pq=coding+ninja&sc=8-12&sp=-1&sk=&cvid=4bb346b5958840b38ed275db9f68971c";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    $data = curl_exec($ch);
    $info = curl_getinfo($ch);  
    curl_close($ch);

    echo "<h1>Data</h1>";
    echo "<pre>".htmlentities($data)."</pre>";
    
    // while(preg_match("/^ninja/", substr((htmlentities($data)), $matches)) {

    // }

    // var_dump(htmlentities($data));
    // var_dump($matches);

    // echo "<h1>Info</h1>";
    // echo "<pre>";
    // var_dump($info);
    // echo "</pre>";


    // create a string
    // $string = 'abcefghijklmnopqrbbbbstuvwaaaxyz0123456789 bb';

    // // echo our string
    // preg_match("/b/", $string, $matches);

    // // loop through the matches with foreach
    // foreach($matches as $key=>$value) {
    //     echo $key.' -> '.$value;
    // }
?>
