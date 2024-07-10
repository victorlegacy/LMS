<?php 
$email = "tech.legacy.dev@gmail.com"; 
$password = "Xantity42";
$prods = implode(',',$ex_prods);
$message = 'The following item(s) are about to expire: '.$prods; 
$sender_name = "ProStore"; 
$recipients = $phone; 
$forcednd = "1"; 
$data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients,"forcednd"=>$forcednd); 
$data_string = json_encode($data); 
$ch = curl_init('https://app.multitexter.com/v2/app/sms'); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
 $result = curl_exec($ch); $res_array = json_decode($result);   
 $_SESSION['sent'] = 1;
?>
