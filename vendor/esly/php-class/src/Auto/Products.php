<?php

$http = "http://www.ecommerce-astemac.com.br";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "$http/cron-jobs/list-products/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"key=ODlnTHhYS2R5cWoyTmk5Nm9wdzRhazlZOWRIelJib1I3bWlITDJGcnFGYz0=");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);

curl_close($ch); 

var_dump($output);
exit;

?>