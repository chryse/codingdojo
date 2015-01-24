<?php
    // http://simplehtmldom.sourceforge.net/
    // MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
    
    require("simple_form_dom.php");
    $html = file_get_html('http://www.bing.com/search?q=coding+ninjas&go=Submit&qs=n&form=QBLH&pq=coding+ninjas&sc=8-13&sp=-1&sk=&cvid=4c11f1ac814946a689f8e58a073c4406');

    // Find all images 
    // foreach($html->find('img') as $element) 
    //    echo "img " . $element->src . '<br>';


    $data = [];
    $pattern = "/coding\+ninjas/";

    // Find all links 
    foreach($html->find('a') as $element) {
       // echo $element->href . '<br>';
        if (preg_match ($pattern, $element)) {
            $data[] = $element;
        }
        // $data[] = $element->href;
    }

    for($i = 0; $i < 20; $i++) {
        echo "$i $data[$i]<br/>";
    }
?>