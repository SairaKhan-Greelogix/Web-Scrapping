<?php
include('simple_html_dom.php');
$url = 'https://dawaai.pk/disease/bacterial-infections/1105';
// $url = 'https://dawaai.pk/disease/nausea/1161';
$html = file_get_html($url);
foreach( $html->find('div.dieses') as $dieses ) {
	echo $dieses;
}
