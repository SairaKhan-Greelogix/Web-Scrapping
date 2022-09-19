<?php
include('simple_html_dom.php');
$url = 'https://dawaai.pk';
$html = file_get_html($url);
foreach( $html->find('div.main-nav') as $main_navigation ) {
	echo "<pre>";
	echo $main_navigation;
	foreach( $main_navigation->find('ul') as $main_category ) {
		echo "<pre>";
		echo $main_category->children;
	}
}
