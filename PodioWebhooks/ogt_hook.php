<?php

include_once '/lib/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/lib/limonade-master/lib/limonade.php';
require '/home/webmaster/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$configs = include('/home/webmaster/wp-config-files/payment_congif.php');







Podio::setup('aiesec-mexico', 'H1m3TpwjqotvYxwJzTcXtNJVnPJP47UE6B825iOnS2VzEsmlHd9222c3yUcOGWZi');
Podio::authenticate_with_app(17706408,'e0078851f0d64c1aac973f5c2667e743');

create_hook();
////creates a hook that reacts to a field update
function create_hook(){
	$app_field_id = 138721130; // Only act on changes on the field with field_id=123
	echo '<br> despues poner el id';
	$event_type = "item.update"; // Only act when field values are updated
	try {
	$hook = PodioHook::create("app_field", $app_field_id, array(
	  "url" => "https://aiesec.org.mx/TEST/offline_op/offline_hook_ogt.php",
	  "type" => $event_type
	));
	echo '<br>despues de crear el hook';
	}catch (Exception $e){
		echo '<br> error';
		var_dump($e);
		echo '<br> error';
	}
	//var_dump($hook);
}



?>