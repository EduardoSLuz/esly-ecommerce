<?php 

function maskTel($number)
{

    $number = strlen($number) == 9 ? "(".substr($number, 0, 2).") ".substr($number, 2, 4)."-".substr($number, 6) : "(".substr($number, 0, 2).") ".substr($number, 2, 5)."-".substr($number, 7);
    return $number;
    
}

function maskCep($number)
{

    $number = substr($number, 0, 5)."-".substr($number, 5);
    return $number;
    
}

function maskCpf($number)
{

    $number = substr($number, 0, 3).".".substr($number, 3, 3).".".substr($number, 6, 3)."-".substr($number, 9);
    return $number;
    
}

function maskCnpj($number)
{

    $number = substr($number, 0, 2).".".substr($number, 2, 3).".".substr($number, 5, 3)."/".substr($number, 8, 4)."-".substr($number, 12);
    return $number;

}

function maskPrice($value, $round = 0, $type = 0)
{   

    if(strstr(floatval($value), '.') !== false && strlen(substr(strstr(floatval($value), '.'), 0)) >= 4 && $round != 0) $value = round(floatval($value), 2);

    $price = strstr(floatval($value), '.') != false ? floatval(strstr(floatval($value), '.', true).substr(strstr(floatval($value), '.'), 0, 3)) : floatval($value);

    return $type == 0 ? number_format($price, 2, ',', '.') : floatval($price);
}

function formatPrice($value, $char = ".")
{

    if(!is_numeric($value)) return 0;

    return strstr($value, $char, true) !== false ? number_format($value, 2, $char, $char) : $value; 

}

function porcenDif($val, $val2)
{

    $res = ($val2/$val) - 1;

    $res = $res * 100;

    return intval($res);
}

?>