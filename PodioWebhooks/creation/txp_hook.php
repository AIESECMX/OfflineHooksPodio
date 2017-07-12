<?php

include_once '/bin/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/bin/limonade-master/lib/limonade.php';
require '/bin/PHPMailer-master/PHPMailerAutoload.php';
$configs = include('../../config.php');


Podio::setup($configs['podio_domain'], $configs['podio_key']);
Podio::authenticate_with_app($configs['podio_app_txp'],$configs['podio_app_txp_key']);

create_hook();
////creates a hook that reacts to a field update
function create_hook(){
	$app_field_id = 149204498; // Only act on changes on the field with field_id
	echo '<br> despues poner el id';
	$event_type = "item.update"; // Only act when field values are updated
	try {
	$hook = PodioHook::create("app_field", $app_field_id, array(
	  "url" => "http://api.aiesec.org.mx/webhooks/podio/offline_hook_txp.php",
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