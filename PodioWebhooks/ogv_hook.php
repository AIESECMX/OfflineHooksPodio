<?php

include_once '/lib/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/lib/limonade-master/lib/limonade.php';
require '/home/webmaster/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';


$configs = include('/home/webmaster/offline_opperations/offline_webhooks_config.php');





// Podio hook validation 
// podio app id 18049580
// pdio redirect url = https://aiesec.org.mx

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