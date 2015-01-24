<?php
    // http://simplehtmldom.sourceforge.net/
    // MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
    
    require("simple_form_dom.php");
    $html = file_get_html("http://hyunjunkim.com");


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

 $to = 'timeisonourside@gmail.com';
 $email_subject = "cron tab test";
 $email_body = "This is what I got. $html";
 $headers = "From: noreply@hyunjunkim.com";
 mail($to, $email_subject, $email_body, $headers);
?>