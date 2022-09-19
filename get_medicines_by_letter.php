<?php
include('simple_html_dom.php');
$url = 'https://dawaai.pk/';
$html = file_get_html($url);

$alphabets = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
$links        = array();
// foreach ($alphabets as $alphabet ) {
//     $html = file_get_html( $url.'all-medicines/'. $alphabet );
//     $medicine_categories = $html->find('div.child-classes',0)->nextSibling();
//     // echo $medicine_categories;
//     // die();
//     $images = array();
//     $titles = array();
//     $discounts = array();
//     $sale_prices = array();
//     $original_prices = array();

//     foreach($medicine_categories->find('img') as $element){
//         $images[] = $element->src;
//     }

//     //Fetching links of products.
//     foreach($medicine_categories->find('a') as $element) {
//         $links[ $alphabet ][] = $element->href;
//     }

    
//     foreach( $medicine_categories->find('div.label-discount') as $element) {
//         $discounts[] = $element->innertext;
//     }

//     foreach( $images as $image ){
//         $images[] = $image;
//     }

//     foreach($medicine_categories->find('div.card-body') as $element) {
//         $sale_prices[] = $element->lastChild()->innertext;
//         $original_prices[] = $element->lastChild()->firstChild()->innertext;
//         $pack_type[] = $element->firstChild()->nextSibling()->innertext;
//         $pack_size[] = $element->firstChild()->nextSibling()->nextSibling()->innertext;
//     }
// }

echo "<pre>";

print_r( $links );