<?php
include_once '/lib/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/lib/limonade-master/lib/limonade.php';
require '/home/webmaster/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$configs = include('/home/webmaster/wp-config-files/payment_congif.php');






// Podio hook validation 
// podio app id 18049580
// pdio redirect url = https://aiesec.org.mx

Podio::setup('aiesec-mexico', podio key);





switch ($_POST['type']) {

  // Validate the webhook. This is a special case where we verify newly created webhooks.
	case 'hook.verify':

	PodioHook::validate($_POST['hook_id'], array('code' => $_POST['code']));

  // An item was created
	case 'item.create':
	$s = "";
	foreach ($_POST as $key => $value)
		$s =  $s."Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	send_mail($s);
	case 'item.update':
	$item_id = $_POST["item_id"];
	$status  = get_status_for_register($item_id);
	send_mail($status);

}

// this method gets the status item_id from podio by reading the item_id
function get_status_for_register($item_id){
	$item = json_decode(PodioItem::get_basic($item_id));
	$s = "";
	foreach ($_POST as $key => $value)
	$s =  $s."Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	//TO-DO: to get the satatus and based on that send the corresponding email
	//get the field id
	//fields->field_id->text and id
	
	return $s;
}

function send_mail($text){
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
		//$mail->Username = $configs["mailing_adress"];
		//$mail->Password = $configs["mailing_adress_pass"];
		$mail->Username = mail
		$mail->Password = pass
		$mail->SetFrom('esuarez@aiesec.org.mx','AIESEC MEXICO');
		//$mail->SetFrom($configs["mailing_adress"],'AIESEC MEXICO');
		$mail->Subject = "Donativo a AIESEC Mexico A.C.";
		$mail->Body = $text;
		//$mail->AddAddress($_POST["email"]);
		//$mail->addCC($mail_def);
		//$mail->addCC($mail_pr);
		//$mail->addCC('esuarez@aiesec.org.mx');
		$mail->AddAddress('esuarez@aiesec.org.mx');
		$mail->addCC('esuarez@aiesec.org.mx');
		echo '<br>antes de mandar mail';

		var_dump( $mail);
		$mail->Send();

		echo '<br>despues de mandar mail';

	}catch (Exception $e) {
	//echo 'error <br>'.$e->getMessage();
		echo '<br> hHUBO UN ERROR AIURAAAAA';
	}

}



?>