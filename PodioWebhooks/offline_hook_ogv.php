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


switch ($_POST['type']) {

  // Validate the webhook. This is a special case where we verify newly created webhooks.
	case 'hook.verify':

	PodioHook::validate($_POST['hook_id'], array('code' => $_POST['code']));

  // An item was created
	case 'item.create':
	$s = "";
	foreach ($_POST as $key => $value)
		$s =  $s."Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
		//send_mail($s,$s);
	break;
	case 'item.update':
	$item_id = $_POST["item_id"];
	$item  = get_status_for_register($item_id);
	$status =  $item->fields['sales-process']->values[0]['text'];
	//$email = $item->correo;
	//$email = $item->fields['correo']->values[0]['text'];;
	$email = $item->fields['correo']->values;
	
	
	$mail = get_mail_content($status);
	if ($mail!= NULL){
		send_mail($email,$mail);	
	}
	
	break;


}

function get_mail_content($status){
	switch ($status) {
		case 'Open':
		return file_get_contents('./OfflineMails/signup_email_offline.html',TRUE);	
		case 'Accepted':
		return file_get_contents('./OfflineMails/Accepted_email_offline.html',TRUE);	
		case 'Realized':
		return file_get_contents('./OfflineMails/Realized_email_offline.html',TRUE);	
		case 'Approved':
		return file_get_contents('./OfflineMails/Approved_email_offline.html',TRUE);	
		default :
		return NULL;	
	}

}

// this method gets the item  from podio by reading the item_id
function get_status_for_register($item_id){
	$item = PodioItem::get($item_id);
	
	return $item;
}

function send_mail($email,$text){
	try{
		echo '<br>despues de la config';
		$mail = new PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		//$mail->Username = htmlspecialchars($configs['mail_account']);
		//$mail->Password = htmlspecialchars($configs['mail_pass']);
		$mail->Username = 'noreply@aiesec.org.mx';
		$mail->Password = 'AIESEC123';
		$mail->SetFrom('noreply@aiesec.org.mx','AIESEC MEXICO');
		//$mail->SetFrom($configs["mailing_adress"],'AIESEC MEXICO');
		$mail->Subject = "Tu experiencia con AIESEC";
		$mail->Body = $text;
		//$mail->AddAddress($_POST["email"]);
		//$mail->addCC($mail_def);
		//$mail->addCC($mail_pr);
		//$mail->addCC('esuarez@aiesec.org.mx');
		$mail->AddAddress($email);
		
		

		//var_dump( $mail);
		$mail->Send();

		

	}catch (Exception $e) {
	//echo 'error <br>'.$e->getMessage();
		echo '<br> hHUBO UN ERROR AIURAAAAA';
	}

}



?>