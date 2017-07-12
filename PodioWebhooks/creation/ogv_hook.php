<?php


include_once '/bin/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/bin/limonade-master/lib/limonade.php';
require '/bin/PHPMailer-master/PHPMailerAutoload.php';
$configs = include('../../config.php');


Podio::setup($configs['podio_domain'], $configs['podio_key']);
Podio::authenticate_with_app($configs['podio_app_ogv'],$configs['podio_app_ogv_key']);

create_hook();
////creates a hook that reacts to a field update
function create_hook(){
	$app_field_id = 138744542; // Only act on changes on the field with field_id=123
	echo '<br> despues poner el id';
	$event_type = "item.update"; // Only act when field values are updated
	try {
	$hook = PodioHook::create("app_field", $app_field_id, array(
	  "url" => "https://aiesec.org.mx/TEST/offline_op/offline_hook_ogv.php",
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