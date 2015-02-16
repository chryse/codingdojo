<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
    // http://simplehtmldom.sourceforge.net/
    // MANUAL: http://simplehtmldom.sourceforge.net/manual.htm
    
    require("simple_form_dom.php");
    ini_set('memory_limit', '-1');
    $html = file_get_html('http://yukimall.com/front/php/product.php?product_no=2848&main_cate_no=47&display_group=1');
    // $html = file_get_html("http://yukimall.com/front/php/product.php?product_no=1359&main_cate_no=51&display_group=1");

    // $url = "http://yukimall.com/front/php/product.php?product_no=2806&main_cate_no=48&display_group=2";
    
    //Find all images 
    // foreach($html->find('img') as $element) 
       // echo "img " . $element->src . '<br>';

    $category = [];
    for($i = 0; $i< 200; $i++) {
        $category[] = "http://yukimall.com/front/php/category.php?cate_no=" . $i;
    }

    $product = [];
    for($j = 2500; $j < 2849; $j++) {
        $product[] = "http://yukimall.com/front/php/product.php?product_no=" . $j;
    }

    $url = "http://yukimall.com";
    $link_pattern1 = "/product\.php/";
    $link_pattern2 = "/category\.php/";
    
    $pattern1 = "/yukimall.com/";
    $pattern2 = "/web\/upload/";

    $links = [];


    function get_image($links) {
        global $pattern1;
        foreach($links as $link) {
            $new_link = file_get_html($link);
            foreach($new_link->find("img") as $element) {
                if(preg_match($pattern1, $element->src)) {
                    echo "<img src='" . $element->src . "'><br/>";
                    echo $element->src . "<br />";
                }
            }
        } 
    }

    function get_image1($links) {
        global $pattern1;
        global $pattern2;
        foreach($links as $link) {
            $new_link = file_get_html($link);
            foreach($new_link->find("img") as $element) {
                if(preg_match($pattern1, $element->src)) {
                    echo "<img src='" . $element->src . "'><br/>";
                    echo $element->src . "<br />";
                }
                if(!preg_match($pattern2, $element->src)) {
                    echo "<img src='http://" . $pattern1 . $element->src . "'><br/>";
                    echo $element->src . "<br />";
                }
            }
        } 
    }

    // get_image($category);
    get_image1($product);

    $url_list = [];

    function call($html) {
        global $url;
        foreach($html->find("a") as $element) {
            if(preg_match("/product\.php/", $element)) {
                $url_list[] = $url . $element->href;
                $new_html = file_get_html($url . $element->href);
                call($new_html);
            }
        }
    }
    // call($html);

    // echo "<pre>";
    // var_dump($url_list);
    // echo "</pre>";
?>

</body>
</html>