<?php

include_once '/lib/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/lib/limonade-master/lib/limonade.php';
require '/home/webmaster/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$configs = include('/home/webmaster/wp-config-files/payment_congif.php');






// Podio hook validation 
// podio test app id 18049580
// podio test clinet id -> 7aee38e461354490b1b9ef5e1219e6a6
// field status test 141787338
// podio app ogv  id 17709122
// podio test clinet id ->  f663655fe6da4d5daacff328a16d948b
// field status ogv (sales-process) -> 138744542 
// podio app ogt  id 17706408
// podio test clinet id -> e0078851f0d64c1aac973f5c2667e743
// field status ogt (sales-process) -> 138721130 
// podio app oge  id 17709104
// podio test clinet id -> 84993cfd50dc43e8b0ffd8624345d12c
// field status ogt (sales-process) -> 138744409
// pdio redirect url = https://aiesec.org.mx

Podio::setup('aiesec-mexico', 'H1m3TpwjqotvYxwJzTcXtNJVnPJP47UE6B825iOnS2VzEsmlHd9222c3yUcOGWZi');
var_dump( Podio::authenticate_with_app(17706408,'e0078851f0d64c1aac973f5c2667e743'));

create_hook();
////creates a hook that reacts to a field update
function create_hook(){
	$app_field_id = 138721130; // Only act on changes on the field with field_id=123
	echo '<br> despues poner el id';
	$event_type = "item.update"; // Only act when field values are updated
	try {
	$hook = PodioHook::create("app_field", $app_field_id, array(
	  "url" => "https://aiesec.org.mx/TEST/offline_op/offline_hook.php",
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