<?php


include_once '/bin/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/bin/limonade-master/lib/limonade.php';
require '/bin/PHPMailer-master/PHPMailerAutoload.php';
$configs = include('/home/luis/Documents/AIESEC/MCMX1617/dev/OfflineHooksPodio/config.php');


Podio::setup($configs['podio_domain'], $configs['podio_key']);

//ogv
//Podio::authenticate_with_app($configs['podio_app_ogv'],$configs['podio_app_ogv_key']);
//$hooks = PodioHook::get_for( "app_field", 138744542);
//ogt
//Podio::authenticate_with_app($configs['podio_app_ogt'],$configs['podio_app_ogt_key']);
//$hooks = PodioHook::get_for( "app_field", 138721130);
//oge
Podio::authenticate_with_app($configs['podio_app_txp'],$configs['podio_app_txp_key']);
$hooks = PodioHook::get_for( "app_field", 149204498);
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