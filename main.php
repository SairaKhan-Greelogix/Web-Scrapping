<?php
include('simple_html_dom.php');
$url = 'https://dawaai.pk/';
$html = file_get_html($url);

// $title = $html->find('title', 0);
// $image = $html->find('img', 0);

$popular_products = $html->find('section.popular-products',0);
// echo $popular_products;

$images = array();
$links = array();
$titles = array();
$discounts = array();
$sale_prices = array();
$original_prices = array();
$products = array();

foreach( $popular_products->find('img') as $element ) {
    $images[] = $element->src;
}
foreach($html->find('a') as $element) {
    $links[] = $element->href;
    $titles[] = $element->innertext;
}
foreach($html->find('div.label-discount') as $element) {
    $discounts[] = $element->innertext;
}

foreach($html->find('div.card-body') as $element) {
	$sale_prices[] = $element->lastChild()->innertext;
    $original_prices[] = $element->lastChild()->firstChild()->innertext;
    $pack_type[] = $element->firstChild()->nextSibling()->innertext;
    $pack_size[] = $element->firstChild()->nextSibling()->nextSibling()->innertext;
}




// for ($i=0; $i < ; $i++) { 
// 	// code...
// }



// $dom = new DOMDocument();
// @ $dom->loadHTML( $popular_products );
// $links =  $popular_products->getElementByTagName('a');
// foreach ($links as $link ) {
// 	// echo "<pre>";
// 	echo $link;
// 	// code...
// }
// $topBrands = $html->find('section.top-brands',0);
// echo $topBrands;


// echo "winter_care";
// $html = file_get_html($url);
// for( $i=0; $i<=3; $i++ ) {
// 	$winter_care = $html->find('section.winter-care-products',$i)->outertext;
// 	echo $winter_care;	
// }

// Create atabase connection.
// echo "File inclued successfully";
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "webscrapping";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die(" Connection failed: " . $conn->connect_error);
} else {

    // $item['name']     = $element->find('span.name',0)->plaintext;
    //             $item['value']    = $element->find('div.value',0)->plaintext;
    //             $articles[] = $item;
            echo "Medicines categories";
            $medicines = array();
            $html      = file_get_html( $url );
            foreach( $html->find('div.main-nav',0)->find('ul') as $element ) {

                if(! is_numeric( $element->find('li') ) ) {
                    foreach( $element->find('li') as $child )
                    {
                        // echo $child->find('a')->href;
                        foreach( $child->find('a') as $c ) {
                            echo "<pre>";
                            echo $c->href;
                        }
                    }
                    
                }
            }

            // foreach( $html->find('section.systemic_class',0)->find('a') as $element ) {
            //     $medicine[] = array(
            //         'name' => $element->innertext,
            //         'link' => $element->href
            //     );
            // }
            // echo "<pre>";
            // print_r( $medicine);
            // echo count($medicine);
            // Inserting data into table.
            // for ($i=0; $i < count( $medicine ) ; $i++) {
            //     $name = $medicine[$i]['name'];
            //     $link = $medicine[$i]['link'];
            //     var_dump( $name );
            //     var_dump( $link );
            //     // die();
            //     $sql = "INSERT INTO sub_categories ( Name, Link, Type ) VALUES ( '".$name."', '".$link."' , 1 )";
            //     if ($conn->query($sql) === TRUE) {
            //       echo "Value entered successfully";
            //     } else {
            //       echo "Error occur " . $conn->error;
            //     }
            // }
            
    
}



// foreach( $html->find('a') as $element ) {
//     // echo $element->href."</br>";
//     echo $element->innertext."<br/>";
// }
// $medicine_categories = $html->find('section.systemic_class',0)->innertext;
// echo $medicine_categories;

// $alphabets = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
// foreach ($alphabets as $alphabet ) {
// 	echo $alphabet;
// 	// die();
// 	$html = file_get_html( $url.'all-medicines/'.$alphabet );
// 	$medicine_categories = $html->find('section.therapeutic_class',0);
// 	echo $medicine_categories;
//}

// echo "PRODUCT INFORMATION";

// https://dawaai.pk/medicine/evion-200mg-661.html?source=Popular%20Products



// foreach ($categories as $category => $item) {
// 	echo $item;
// }
// echo $categories;
