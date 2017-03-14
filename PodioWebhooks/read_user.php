<?php

include_once '/lib/podio-php-4.3.0/PodioAPI.php';
//limonadue
require_once '/lib/limonade-master/lib/limonade.php';
$configs = include('/home/webmaster/offline_opperations/offline_webhooks_config.php');



Podio::setup('aiesec-mexico', 'H1m3TpwjqotvYxwJzTcXtNJVnPJP47UE6B825iOnS2VzEsmlHd9222c3yUcOGWZi');
//ogv
//Podio::authenticate_with_app($configs['podio_app_ogv'],$configs['podio_app_ogv_key']);
//$item = PodioItem::get(575661081);
//ogt
Podio::authenticate_with_app($configs['podio_app_ogt'],$configs['podio_app_ogt_key']);
$item = PodioItem::get(578672434);
//oge
//Podio::authenticate_with_app($configs['podio_app_oge'],$configs['podio_app_oge_key']);
//$item = PodioItem::get(578659784);



//echo $item->fields['sales_process']->values[0]['text'];
//echo $item->fields[2];
//$email = $item->fields[2]->values;
//echo $item->fields[8]->values[0]['text'];
echo '<br>tratando de leer el sales<br>';
echo $item->fields['sales-process']->values[0]['text'];

echo '<br>tratando de leer el sales<br>';
echo '<br><br>';
echo $item->fields['correo']->values;
echo '<br><br>';
var_dump( $item);

echo $email;
echo $status;
//Array ([fields] => Array ( [titulo] => Helena [apellido] => Rojas Romero [correo] => helenita_rojas@hotmail.com [numero-telefonico] => 5532257165 [comite-local] => Array ( [0] => 5 ) [fuente] => Array ( [0] => 10 ) [autorizo-proporcionar-mis-datos-a-aiesec-en-mexico-ac] => Array ( [0] => 1 ) [sales-process] => Array ( [0] => 6 ) ) [app] => Array ( [app_id] => 17709122 [status] => active [icon] => 387.png [icon_id] => 387 [space_id] => 3073703 [config] => Array ( [item_name] => oGV Plug In Registrations [icon_id] => 387 [type] => standard [name] => oGV Plug In Registrations [New] [icon] => 387.png ) [link] => https://podio.com/aiesecorgmx/ogcdp-mexico-2015/apps/ogv-plug-in-registrations-new [url_add] => https://podio.com/aiesecorgmx/ogcdp-mexico-2015/apps/ogv-plug-in-registrations-new/items/new [url_label] => ogv-plug-in-registrations-new [name] => oGV Plug In Registrations [New] [item_name] => oGV Plug In Registrations ) [ref_type] => [ref_id] => [revisions] => Array ( [0] => Array ( [revision] => 3 [created_on] => 2017-03-08 20:48:36 [created_by] => Array ( [type] => user [id] => 2062651 [avatar_type] => file [avatar_id] => 110150349 [image] => Array ( [hosted_by] => podio [hosted_by_humanized_name] => Podio [thumbnail_link] => https://d2cmuesa4snpwn.cloudfront.net/public/110150349 [link] => https://d2cmuesa4snpwn.cloudfront.net/public/110150349 [file_id] => 110150349 [external_file_id] => [link_target] => _blank ) [name] => Luis Enrique Perez Súarez [url] => https://podio.com/users/2062651 [avatar] => 110150349 ) [created_via] => Array ( [id] => 1 [auth_client_id] => 1 [name] => Podio [display] => ) ) [1] => Array ( [revision] => 2 [created_on] => 2017-03-08 20:48:20 [created_by] => Array ( [type] => user [id] => 2062651 [avatar_type] => file [avatar_id] => 110150349 [image] => Array ( [hosted_by] => podio [hosted_by_humanized_name] => Podio [thumbnail_link] => https://d2cmuesa4snpwn.cloudfront.net/public/110150349 [link] => https://d2cmuesa4snpwn.cloudfront.net/public/110150349 [file_id] => 110150349 [external_file_id] => [link_target] => _blank ) [name] => Luis Enrique Perez Súarez [url] => https://podio.com/users/2062651 [avatar] => 110150349 ) [created_via] => Array ( [id] => 1 [auth_client_id] => 1 [name] => Podio [display] => ) ) [2] => Array ( [revision] => 1 [created_on] => 2017-03-08 20:30:16 [created_by] => Array ( [type] => user [id] => 2062651 [avatar_type] => file [avatar_id] => 110150349 [image] => Array ( [hosted_by] => podio [hosted_by_humanized_name] => Podio [thumbnail_link] => https://d2cmuesa4snpwn.cloudfront.net/public/110150349 [link] => https://d2cmuesa4snpwn.cloudfront.net/public/110150349 [file_id] => 110150349 [external_file_id] => [link_target] => _blank ) [name] => Luis Enrique Perez Súarez [url] => https://podio.com/users/2062651 [avatar] => 110150349 ) [created_via] => Array ( [id] => 1 [auth_client_id] => 1 [name] => Podio [display] => ) ) [3] => Array ( [created_on] => 2017-03-08 19:54:20 [created_by] => Array ( [type] => app [id] => 17709122 [avatar_type] => icon [avatar_id] => 387 [image] => Array ( ) [name] => oGV Plug In Registrations [New] [url] => https://podio.com/aiesecorgmx/ogcdp-mexico-2015/apps/ogv-plug-in-registrations-new [avatar] => -1 ) [created_via] => Array ( [id] => 20662 [auth_client_id] => 20662 [name] => AIESEC México [display] => 1 ) ) ) ) helenita_rojas@hotmail.com

?>






