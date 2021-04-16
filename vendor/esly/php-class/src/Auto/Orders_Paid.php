<?php

$http = "http://www.ecommerce-astemac.com.br";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "$http/cron-jobs/orders-paid/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"key=VjF0RDQxeUFzVVNDREM4VzdvRmVjb2RvRE0wVGF6eXF1a0pLZGhqdFVyZz0=");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);

curl_close($ch); 

var_dump($output);
exit;

?>