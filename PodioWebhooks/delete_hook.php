<?php

include_once '/lib/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/lib/limonade-master/lib/limonade.php';
require '/home/webmaster/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$configs = include('/home/webmaster/offline_opperations/offline_webhooks_config.php');

Podio::setup('aiesec-mexico', 'H1m3TpwjqotvYxwJzTcXtNJVnPJP47UE6B825iOnS2VzEsmlHd9222c3yUcOGWZi');

//ogv
//Podio::authenticate_with_app($configs['podio_app_ogv'],$configs['podio_app_ogv_key']);
//$hooks = PodioHook::get_for( "app_field", 138744542);
//ogt
//Podio::authenticate_with_app($configs['podio_app_ogt'],$configs['podio_app_ogt_key']);
//$hooks = PodioHook::get_for( "app_field", 138721130);
//oge
Podio::authenticate_with_app($configs['podio_app_oge'],$configs['podio_app_oge_key']);
$hooks = PodioHook::get_for( "app_field", 138744409);
//


foreach ($hooks as $hook) {
  echo "Hook id: ".$hook->hook_id."<br>";
  echo  "Hook type: ".$hook->type."<br>";
  echo  "Hook URL: ".$hook->url."<br>";
  //delete_hook($hook->hook_id);
}


function delete_hook($id){
	echo 'lol';
	try{
	var_dump(PodioHook::delete($id));
	}catch(Exeption $e){
		echo $e;
	}
}
?>