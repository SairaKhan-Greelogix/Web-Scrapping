<?php


$url = 'https://dawaai.pk/otc/c15-serum-30-ml-bottle-49581.html?source=Popular%20Products';
$url = 'https://dawaai.pk/medicine/atarax-25mg-515.html';
$url = 'https://dawaai.pk/medicine/amclav-8-17157.html';
$url = 'https://dawaai.pk/medicine/acicon-39951.html';
$url = 'https://dawaai.pk/medicine/panadol-drips-287.html';
$url = 'https://dawaai.pk/otc/premium-disposable-protective-mask-imported-44199.html?source=Category%20Page';
$url = 'https://dawaai.pk/otc/safi-syrup-1107.html?source=Category%20Page';
$url = 'https://dawaai.pk/otc/durex-play-massage-2-in-1-200ml-purple-37676.html?source=Popular%20Products';
$url = 'https://dawaai.pk/otc/enfamil-a-ar-powder-400g-37017.html?source=Category%20Page';
$url = 'https://dawaai.pk/medicine/advantan-ointment-1550.html';


// Find Product Id.
$lastPart = substr($url, strrpos($url, '-', -1 )+1 , -1 );
$product_id = substr($lastPart, 0, strpos($lastPart, "."));
// echo $product_id;
// die();

// Api call to get the product price info.
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dawaai.pk/product/get_product',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'id='.$product_id,
  CURLOPT_HTTPHEADER => array(
    'authority: dawaai.pk',
    'accept: text/html, */*; q=0.01',
    'accept-language: en-US,en;q=0.9',
    'cache-control: no-cache',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'cookie: _fbp=fb.1.1660551215712.432769046; _hjSessionUser_2224780=eyJpZCI6IjllYjZiOGZlLTQ3YzYtNTc5ZC04M2JiLTgyYmI3MzM3OTVlZiIsImNyZWF0ZWQiOjE2NjA1NTEyMTU5NDgsImV4aXN0aW5nIjp0cnVlfQ==; _tt_enable_cookie=1; _ttp=c9ac6edf-b976-442c-8454-9f65169d1a91; __zlcmid=1BTl9Ucf5JmFMLU; G_ENABLED_IDPS=google; cebs=1; moe_uuid=de3bd09b-d3e5-41d6-8dce-5cbd5d74b399; PHPSESSID=hmfrh9e65ks8njrjribau8lt02; _gid=GA1.2.2023536396.1661749935; locationCityId=48504; locationCityName=Karachi; _hjIncludedInSessionSample=0; _hjSession_2224780=eyJpZCI6ImQ0YzBjZmVhLWUwNjUtNDA5My1iMzJlLWI3MDY2NmU1YzNiZCIsImNyZWF0ZWQiOjE2NjE4NTMyODc4MTcsImluU2FtcGxlIjpmYWxzZX0=; _hjAbsoluteSessionInProgress=1; _ce.s=v~770bf05ae0c42cacdb428d2b190b96448aaa4e08~vpv~1~v11.rlc~1661857243333~v11slnt~1660896953434; ci_session=lm2na1ip3q2g71bpjkq4bnorvusp13uh; _gat=1; cebsp=117; _ga_M50BR48D77=GS1.1.1661855225.35.1.1661858675.0.0.0; _ga=GA1.1.1752302098.1660551214; mp_1b439ed4835dcc8528bac6ce6d25c879_mixpanel=%7B%22distinct_id%22%3A%20%22182a090b820617-0730a8d54bd2fb-1c525635-1aeaa0-182a090b821c35%22%2C%22%24device_id%22%3A%20%22182a090b820617-0730a8d54bd2fb-1c525635-1aeaa0-182a090b821c35%22%2C%22Platform%22%3A%20%22Website%22%2C%22%24search_engine%22%3A%20%22google%22%2C%22%24initial_referrer%22%3A%20%22https%3A%2F%2Fwww.google.com%2F%22%2C%22%24initial_referring_domain%22%3A%20%22www.google.com%22%2C%22__alias%22%3A%20%22sairakhanbscs%40gmail.com%22%2C%22%24user_id%22%3A%20%22sairakhanbscs%40gmail.com%22%2C%22Name%22%3A%20%22saira%20khan%22%2C%22Email%22%3A%20%22sairakhanbscs%40gmail.com%22%2C%22Phone%20Number%22%3A%20%22-%22%7D; ci_session=lm2na1ip3q2g71bpjkq4bnorvusp13uh',
    'origin: https://dawaai.pk',
    'pragma: no-cache',
    'referer: https://dawaai.pk/medicine/evion-200mg-661.html?source=Popular%20Products',
    'sec-ch-ua: "Chromium";v="104", " Not A;Brand";v="99", "Google Chrome";v="104"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "macOS"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'sec-gpc: 1',
    'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36',
    'x-requested-with: XMLHttpRequest'
  ),
));

$response = curl_exec($curl);
// echo "<pre>";
// echo $response;
curl_close($curl);

$response_json         = json_decode( $response );
$product_data          = $response_json->product;
$product_id            = $product_data->p_id;
$p_price               = $product_data->p_price;
$product_pack_size     = $product_data->pack_size;
$product_type          = $product_data->p_type;
$strip_per_pack        = (int)$product_data->strip_per_pack;
$product_discount      = (int)$product_data->discount;
$product_buy_limit     = (int)$product_data->p_buy_limit;
$product_stock_status  = $product_data->p_stock_status;
$pack_limit            = (int)$response_json->pack_limit;
$strip_limit           = $response_json->strip_limit;
$product_category_name = $product_data->cat_name;

// Calculating original and discounte price.
$original_price   = $p_price * $strip_per_pack;
$discounted_price = $original_price -( ($product_discount * $original_price)/100 );

// echo "original_price"." = ".$original_price;
// echo "<br>";
// echo "discounted_price"." = ".$discounted_price;
// echo "<br>";
// echo "product_id"." = ".$product_id;
// echo "<br>";
// echo "prouct_price"." = ".$original_price;
// echo "<br>";
// echo "prouct_pack_size"." = ".$product_pack_size;
// echo "<br>";
// echo "prouct_type"." = ".$product_type;
// echo "<br>";
// echo "prouct_discount"." = ".$discounted_price;
// echo "<br>";
// echo "prouct_buy_limit"." = ".$product_buy_limit;
// echo "<br>";
// echo "prouct_stock_status"." = ".$product_stock_status;
// echo "<br>";
// echo "prouct_category_name"." = ".$product_category_name;
// echo "<br>";

include('simple_html_dom.php');
$html = file_get_html($url);
// die;
$product_details = $html->find('article.product-details',0);

//Product Name.
$product_name = $html->getElementByTagName('h1')->innertext();
// echo "<br>";
// echo $product_name;
// Product Image.

foreach( $product_details->find('img.img-responsive') as $image ) {
	$image = $image->src;
}
// echo "<br>";
// echo $image;

// Product brand name and link.

foreach( $product_details->find('.brand-name') as $brand ) {
	foreach( $brand->find('a') as $link ) {
		$brand_link = $link->href;
		$brand_name = $link->innertext;
	}
}

// echo "<br>";
// echo $brand_name;
// echo "<br>";
// echo $brand_link;


// Prescription required.
$get_prescription = $html->find('p.prescription-required',0);
if( $get_prescription ) {
	$prescription_required = 1;	
	// $prescription_required = $get_prescription->innertext();	
} else {
	$prescription_required = 0;
}
// echo "<br>"."Prescription : ".$prescription_required;
// Generics Info.

foreach( $product_details->find('.generics') as $generics ) {
	// echo $generics;
	// echo $generics->find('a');
	foreach( $generics->find('.generate-img') as $desc ) {
		$generics_desc = $desc->innertext;
	}
	foreach( $generics->find('a') as $genere ) {
		$generic_link  = $genere->href;
		$generic_name  = $genere->innertext;
	}
}

// echo "<br>";
// echo "generic_name = ".$generic_name;
// echo "<br>";
// echo "generics_desc = ".$generics_desc;
// echo "<br>";
// echo "generic_link = ".$generic_link;

$generic_data = file_get_html( $generic_link );

// Getting generic details.
$generics_array = ['contradications','side-effect','Expert_Advice','faqs'];
if( !empty( $generic_data ) ) {
	foreach( $generic_data->find('section.generics-glossary-detail') as $generic_detail ) {
		// echo $generic_detail;
		foreach( $generic_detail->find('div.listing_container') as $list ) {
			foreach( $list->children() as $children ) {
				echo $children;
				echo "<br>";
				$tab_data = $children->getAttribute('data-tab');
				if( in_array( $tab_data , $generics_array ) ) {
					$generic_key = array_search( $tab_data, $generics_array );
					switch ( $generic_key ) {
				    case 0:
				    		$contradications = $generic_detail->find('div.content_container',0);
				        break;
				    case 1:
				    		$side_effects = $generic_detail->find('div.content_container',1);
				        break;
				    case 2:
				    		$expert_advice = $generic_detail->find('div.content_container',2);
				        break;
				    case 3:
				    		$faqs = $generic_detail->find('div.content_container',3);
				        break;
					}
				}
			}
		}
	}
}


$contradications = str_replace('"', "'", $contradications  );
$side_effects = str_replace('"', "'", $side_effects  );
$expert_advice = str_replace('"', "'", $expert_advice  );
$faqs = str_replace('"', "'", $faqs  );
// echo $contradications;
// echo $side_effects;
// echo $expert_advice;
// echo $faqs;

// die();

// Getting Diseases and Categories.

$diseases = array();
$categories = array();
foreach( $product_details->find('div.divider') as $prod ) {
	$count_of_anchor_tags = count( $prod->nextSibling()->find('a') );
	if( $count_of_anchor_tags > 0 ) {
		$number_of_diseases = count( $prod->nextSibling()->find('a.used-for') );
		$medicine_category = count( $prod->nextSibling()->find('a.prescription') );
		if( $number_of_diseases > 0 ) {
			foreach( $prod->nextSibling()->find('a.used-for') as $single_disease ) {
				$disease_link = $single_disease->href;
				$get_disease_info = file_get_html( $disease_link );
				foreach( $get_disease_info->find('div.dieses') as $dieses_content ) {
					$disease_content = $dieses_content->innertext();
				}
				$diseases[] = array(
					'disease_link'    => $single_disease->href,
					'disease_name'    => $single_disease->innertext(),
					'disease_content' => $disease_content
				);
			}
		}
		if( $medicine_category > 0 ) {
			foreach( $prod->nextSibling()->find('a.prescription') as $category ) {
				$categories[] = array(
					'category_link' => $category->href,
					'category_name' => $category->innertext
				);
			}
		} else {
			echo "In else ";
		}
	}
}

// echo "<pre>";
// print_r( $categories );
// die();
// Getting product details.

$product_content_headings = ['Description','Directions For Use','Safety Information/Precautions','Introduction','Key Benefits','Primary Uses','Indications','Side Effects','Warnings','Contraindications','Overview','FAQS'];
$tabs_info = array();
$product_detail = $html->find('article.product-generics',0);
foreach( $html->find('article.product-generics') as $product_detail ) {
	foreach( $product_detail->find('.product-side-tabs.content') as $product_info_tabs ) {
		// First Child
		$first_child = $product_info_tabs->first_child();
		if( !is_null( $first_child ) ) {
			if( !is_null( $first_child->firstChild() ) ) {
				$heading = $first_child->firstChild()->innertext();
			if( in_array( $heading, $product_content_headings ) ) {
				$key = array_search( $heading, $product_content_headings );
				// Switch statement.
				switch ( $key ) {
			    case 0:
			    		$description = $first_child->innertext();
			        break;
			    case 1:
			    		$Directions_for_use = $first_child->innertext();
			        break;
			    case 2:
			    		$Safety_information = $first_child->innertext();
			        break;
			    case 3:
			    		$Introduction = $first_child->innertext();
			        break;
			    case 4:
			    		$Key_benefits = $first_child->innertext();
			        break;
			    case 5:
			    		$Primary_uses = $first_child->innertext();
			        break;
			    case 6:
			    		$Indications = $first_child->innertext();
			        break;
			    case 7:
			    		$Side_effects = $first_child->innertext();
			        break;
			    case 8:
			    		$Warnings = $first_child->innertext();
			        break;
			    case 9:
			    		$Contraindications = $first_child->innertext();
			        break;
			    case 10:
			    		$Overview = $first_child->innertext();
			        break;
			    case 11:
			    		$FAQS = $first_child->innertext();
			        break;
				}
			}

			}
			
		}
		// Second Child
		if( !is_null( $first_child ) ) {
			$second_child = $first_child->nextSibling();
			if( !is_null( $second_child ) ) {
				if( !is_null( $second_child->firstChild() ) ) {
					$heading = $second_child->firstChild()->innertext();
					if( in_array( $heading, $product_content_headings ) ) {
						$key = array_search( $heading, $product_content_headings );
						// Switch statement.
						switch ( $key ) {
					    case 0:
					    		$description = $second_child->innertext();
					        break;
					    case 1:
					    		$Directions_for_use = $second_child->innertext();
					        break;
					    case 2:
					    		$Safety_information = $second_child->innertext();
					        break;
					    case 3:
					    		$Introduction = $second_child->innertext();
					        break;
					    case 4:
					    		$Key_benefits = $second_child->innertext();
					        break;
					    case 5:
					    		$Primary_uses = $second_child->innertext();
					        break;
					    case 6:
					    		$Indications = $second_child->innertext();
					        break;
					    case 7:
					    		$Side_effects = $second_child->innertext();
					        break;
					    case 8:
					    		$Warnings = $second_child->innertext();
					        break;
					    case 9:
					    		$Contraindications = $second_child->innertext();
					        break;
					    case 10:
					    		$Overview = $second_child->innertext();
					        break;
					    case 11:
					    		$FAQS = $second_child->innertext();
					        break;
						}
					}

				}	
			}
		}
		
		// Third Child
		if( !is_null( $second_child ) ) {
			$third_child   = $second_child->nextSibling();
			if( !is_null( $third_child ) ) {
				if( !is_null( $third_child->firstChild() ) ) {
					$heading = $third_child->firstChild()->innertext();
					if( in_array( $heading, $product_content_headings ) ) {
						$key = array_search( $heading, $product_content_headings );
						// Switch statement.
						switch ( $key ) {
					    case 0:
					    		$description = $third_child->innertext();
					        break;
					    case 1:
					    		$Directions_for_use = $third_child->innertext();
					        break;
					    case 2:
					    		$Safety_information = $third_child->innertext();
					        break;
					    case 3:
					    		$Introduction = $third_child->innertext();
					        break;
					    case 4:
					    		$Key_benefits = $third_child->innertext();
					        break;
					    case 5:
					    		$Primary_uses = $third_child->innertext();
					        break;
					    case 6:
					    		$Indications = $third_child->innertext();
					        break;
					    case 7:
					    		$Side_effects = $third_child->innertext();
					        break;
					    case 8:
					    		$Warnings = $third_child->innertext();
					        break;
					    case 9:
					    		$Contraindications = $third_child->innertext();
					        break;
					    case 10:
					    		$Overview = $third_child->innertext();
					        break;
					    case 11:
					    		$FAQS = $third_child->innertext();
					        break;
						}
					}
				}
			}
		}
		// Fourth Child
		if( !is_null( $third_child ) ) {
			$fourth_child   = $third_child->nextSibling();
			if ( !is_null( $fourth_child ) ) {
				if( !is_null ( $fourth_child->firstChild() ) ) {
					$heading = $fourth_child->firstChild()->innertext();
					if( in_array( $heading, $product_content_headings ) ) {
					$key = array_search( $heading, $product_content_headings );
					// Switch statement.
					switch ( $key ) {
				    case 0:
				    		$description = $fourth_child->innertext();
				        break;
				    case 1:
				    		$Directions_for_use = $fourth_child->innertext();
				        break;
				    case 2:
				    		$Safety_information = $fourth_child->innertext();
				        break;
				    case 3:
				    		$Introduction = $fourth_child->innertext();
				        break;
				    case 4:
				    		$Key_benefits = $fourth_child->innertext();
				        break;
				    case 5:
				    		$Primary_uses = $fourth_child->innertext();
				        break;
				    case 6:
				    		$Indications = $fourth_child->innertext();
				        break;
				    case 7:
				    		$Side_effects = $fourth_child->innertext();
				        break;
				    case 8:
				    		$Warnings = $fourth_child->innertext();
				        break;
				    case 9:
				    		$Contraindications = $fourth_child->innertext();
				        break;
				    case 10:
				    		$Overview = $fourth_child->innertext();
				        break;
				    case 11:
				    		$FAQS = $fourth_child->innertext();
				        break;
					}
				}
				}
				
			}
		}
		// Fifth Child
		if( !is_null( $fourth_child ) ) {
			$fifth_child   = $fourth_child->nextSibling();
			if( !is_null( $fifth_child ) ) {
				if( !is_null( $fifth_child->firstChild() ) ) {
					$heading = $fifth_child->firstChild()->innertext();
					if( in_array( $heading, $product_content_headings ) ) {
						$key = array_search( $heading, $product_content_headings );
						// Switch statement.
						switch ( $key ) {
					    case 0:
					    		$description = $fifth_child->innertext();
					        break;
					    case 1:
					    		$Directions_for_use = $fifth_child->innertext();
					        break;
					    case 2:
					    		$Safety_information = $fifth_child->innertext();
					        break;
					    case 3:
					    		$Introduction = $fifth_child->innertext();
					        break;
					    case 4:
					    		$Key_benefits = $fifth_child->innertext();
					        break;
					    case 5:
					    		$Primary_uses = $fifth_child->innertext();
					        break;
					    case 6:
					    		$Indications = $fifth_child->innertext();
					        break;
					    case 7:
					    		$Side_effects = $fifth_child->innertext();
					        break;
					    case 8:
					    		$Warnings = $fifth_child->innertext();
					        break;
					    case 9:
					    		$Contraindications = $fifth_child->innertext();
					        break;
					    case 10:
					    		$Overview = $fifth_child->innertext();
					        break;
					    case 11:
					    		$FAQS = $fifth_child->innertext();
					        break;
						}
					}
				}
			}
		}
	}
}

// echo "<pre>";
// echo " Description "."<br>".$Description;
// echo " Directions_for_use "."<br>".$Directions_for_use;
// echo " Safety_information "."<br>".$Safety_information;
// echo " Introduction "."<br>".$Introduction;
// echo " Key_benefits "."<br>".$Key_benefits;
// echo " Primary_uses "."<br>".$Primary_uses;
// echo " Indications "."<br>".$Indications;
// echo " Side_effects "."<br>".$Side_effects;
// echo " Warnings "."<br>".$Warnings;
// echo " Contraindications "."<br>".$Contraindications;
// echo " Overview "."<br>".$Overview;
// echo " FAQS "."<br>".$FAQS;

$Description = str_replace('"', "'", $description  );
$Directions_for_use = str_replace('"', "'", $Directions_for_use );
$Safety_information = str_replace('"', "'", $Safety_information );
$Introduction = str_replace('"', "'", $Introduction );
$Key_benefits = str_replace('"', "'", $Key_benefits );
$Primary_uses = str_replace('"', "'", $Primary_uses );
$Indications = str_replace('"', "'", $Indications );
$Side_effects = str_replace('"', "'", $Side_effects );
$Warnings = str_replace('"', "'", $Warnings );
$Contraindications = str_replace('"', "'", $Contraindications );
$Overview = str_replace('"', "'", $Overview );
$FAQS = str_replace('"', "'", $FAQS );

// Create Database Connection.
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "webscrapping";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	} else {
		// Connect to database.
		if ( !mysqli_select_db( $conn,'webscrapping' ) )  {
			die(" Unable to select database: " . mysqli_error());
		} else {
				// Checking if the product already exists.
				$check_product_query = "SELECT id FROM product WHERE name = '".$product_name."'";
				$result = mysqli_query( $conn, $check_product_query );
				// Create product if not exists already.
				if( $result->num_rows === 0 ) {
					// Checking if the same brand exists already.
					$query = "SELECT id FROM brands WHERE brand_name = '".$brand_name."'";
					$brand_exists = mysqli_query($conn, $query);
					if( $brand_exists->num_rows === 0 ) {
						// Insert data as brand doesnot exist already.
						$insert_query = 'INSERT INTO brands (brand_name, brand_link ) VALUES ( "'.$brand_name.'", "'.$brand_link.'" )';
						$add_brand    = mysqli_query($conn, $insert_query);
						if( $conn->insert_id > 0 ) {
							$brand_id     = $conn->insert_id;	
						} else {
							die( " Brand insertion error ". mysqli_error( $conn ) );
						}
						
					}	else {
						// get brand_id.
						$get_brand_id = mysqli_fetch_array( $brand_exists );
						$brand_id = $get_brand_id['id'];
					}

					if( !empty( $brand_id ) ) {
						// Create Product.
						$insert_product_query = 'INSERT INTO product ( name, image, brand_id, prescription_required, product_pack_size, product_type, strip_per_pack, product_discount, product_buy_limit, product_stock_status, pack_size, pack_limit, strip_limit, discounted_price, original_price, description, directions_for_use, safety_information, introduction, benefits, primary_uses, indications, side_effects, warnings, contraindications, overview, faqs ) VALUES ( "'.$product_name.'", "'.$image.'", '.$brand_id.' , "'.$prescription_required.'", "'.$product_pack_size.'" , "'.$product_type.'", '.$strip_per_pack.', "'.$product_discount.'", "'.$product_buy_limit.'", "'.$product_stock_status.'", "'.$pack_size.'", '.$pack_limit.', "'.$strip_limit.'", "'.$discounted_price.'", "'.$original_price.'", "'.$description.'", "'.$Directions_for_use.'", "'.$Safety_information.'", "'.$Introduction.'", "'.$Key_benefits.'", "'.$Primary_uses.'", "'.$Indications.'", "'.$Side_effects.'", "'.$Warnings.'", "'.$Contraindications.'", "'.$Overview.'", "'.$FAQS.'")';
							// echo "<pre>";
							// echo $insert_product_query;
							$insert_product_result = mysqli_query($conn, $insert_product_query);
						
						$product_id = $conn->insert_id;

						if( $product_id > 0 ) {
							// echo "Data inserted";
						} else {
							die( " Product insertion Error " . mysqli_error( $conn ) );
						}

					}
					

					// Categories.
					// if( count( $categories ) !== 0 ) {
						// If category exists, then get id else create category.
						$category_ids = array();
						// Check if product Categories already exists.
						foreach( $categories as $single_category ) {
							$category_query = "SELECT id FROM categories WHERE name = '".$single_category['category_name']."'";
							$category_result = mysqli_query( $conn, $category_query );
							
							if( $category_result->num_rows === 0 ) {
								// Create category.
								$insert_category = 'INSERT INTO categories (name, link, parent_category ) VALUES ( "'.$single_category['category_name'].'", "'.$single_category['category_link'].'", 0 )';
								$add_category   = mysqli_query($conn, $insert_category );
								if( $conn->insert_id > 0 ) {
									$category_ids[] = $conn->insert_id;
								} else {
									die( "Category Creation Error ". mysqli_error( $conn ) );
								}

							} else {
									// get category_id.
									$get_category_id = mysqli_fetch_array( $category_result );
									$category_ids[]  = $get_category_id['id'];
								}
						}
						// Create product_categories Link.
						if( isset( $product_id ) ) {
							foreach( $category_ids as $single_category_id ) {
								$insert_product_category = "INSERT INTO product_categories ( product_id, category_id ) VALUES ( $product_id, $single_category_id )";
									// echo $insert_product_category;
								$product_category_result = mysqli_query($conn, $insert_product_category );
								// $product_id = $conn->insert_id;
							}
						}	
					// }
					

					// If disease exists, then get id else create disease.
					if ( count( $diseases ) !== 0 ) {
						$diseases_ids = array();
						foreach( $diseases as $disease ) {
							// Check if disease exists.
							// echo  $disease['disease_name'];
							$disease_query = "SELECT id FROM diseases WHERE disease_name = '".ltrim( $disease['disease_name'] )."'";
							$get_disease   = mysqli_query( $conn, $disease_query );
							// echo "<pre>";
							// print_r( $get_disease );
							
							if( $get_disease->num_rows === 0 ) {
									// echo "In if";
									$insert_disease = 'INSERT INTO diseases ( disease_name, disease_link, disease_content ) VALUES ( "'.$disease['disease_name'].'", "'.$disease['disease_link'].'", "'.str_replace('"', "'", $disease['disease_content'] ).'" )';
									$insert_disease_result = mysqli_query($conn, $insert_disease );
									if( $conn->insert_id > 0 ) {

									} else {
										die( " Disease insertion Error " . mysqli_error( $conn ) );
									}
									$diseases_ids[] = $conn->insert_id;
							} else {
								// echo "In else";
								$get_disease_array = mysqli_fetch_array( $get_disease );
								$diseases_ids[]    = $get_disease_array['id'];
							}
						}

						// echo "<pre>";
						// print_r( $diseases_ids );

						// Create product_diseases Link.
						foreach( $diseases_ids as $single_disease_id ) {
							if( !empty($product_id )) {
								// Insert diseases.
								$insert_product_disease = "INSERT INTO product_diseases ( product_id, disease_id ) VALUES ( $product_id, $single_disease_id )";
								// echo $insert_product_disease;
								$product_category_result = mysqli_query($conn, $insert_product_disease );
							}
							
						}
					}


					// If generics exists, then get id else create generics.
					if( !empty( $generic_name ) ) {
						$generic_query = 'SELECT id FROM generics WHERE name = "'.$generic_name.'"';
						$get_generic   = mysqli_query( $conn, $generic_query );
						if( $get_generic->num_rows === 0 ) {
							$insert_generic = 'INSERT INTO generics ( name, link, description, contradications, side_effects, expert_advice, faqs ) VALUES ( "'.$generic_name.'", "'.$generic_link.'", "'.$generics_desc.'", "'.$contraindications.'", "'.$side_effects.'", "'.$expert_advice.'", "'.$faqs.'" )';
								// echo $insert_generic;
							$insert_generic_result = mysqli_query($conn, $insert_generic );
							if( $conn->insert_id > 0 ) {
								$generic_id = $conn->insert_id;
								// Create product_generic Link.
								if( !empty($product_id )) {
									// Insert diseases.
									$insert_product_generic = "INSERT INTO product_generic ( product_id, generic_id ) VALUES ( $product_id, $generic_id )";
									// echo $insert_product_generic;
									$product_generic_result = mysqli_query( $conn, $insert_product_generic );
								}
							} else {
								die( " Generic insertion Error " . mysqli_error( $conn ) );
							}
						}
					}
					echo "Product inserted successfully !!!";				
				} else {
					

					die(" The product Already Exists !!! ");
				}

		}
}





