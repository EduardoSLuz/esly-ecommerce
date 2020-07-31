<?php 

function maskTel($number)
{

    $number = "(".substr($number, 0, 2).") ".substr($number, 2, 5)."-".substr($number, 7);
    return $number;
    
}

function maskCep($number)
{

    $number = substr($number, 0, 5)."-".substr($number, 5);
    return $number;
    
}

function maskCnpj($number)
{

    $number = substr($number, 0, 2).".".substr($number, 2, 3).".".substr($number, 5, 3)."/".substr($number, 8, 4)."-".substr($number, 12);
    return $number;

}
?>