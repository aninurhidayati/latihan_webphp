<?php
function index(){
	$listmenu = array(
		array("id"=>"01", "nm_menu"=>"Dashboard", "link"=>"home.php"),
		array("id"=>"02", "nm_menu"=>"Blog", "link"=>"#"),
		array("id"=>"03", "nm_menu"=>"Berita", "link"=>"mod_berita")
	);
	return $listmenu;
}