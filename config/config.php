<?php 
date_default_timezone_set('Asia/Jakarta');
$set_url = "http://".$_SERVER['HTTP_HOST'];
//echo "<br/>".$set_url."<br/>";
$set_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
//echo $_SERVER['SCRIPT_NAME']."<br/>";
//echo basename($_SERVER['SCRIPT_NAME'])."<br/>";
//echo $set_url."<br/>";
define("URL", $set_url);

?>