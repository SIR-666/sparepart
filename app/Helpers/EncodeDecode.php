<?php

//$jsonString --> string of json which will be decode to object again
function JsonDecode($jsonString){
    return json_decode($jsonString);
}

//$object --> make object to string of json
function JsonEncode($object){
    return json_encode($object);
}

function EncryptId($data, $key = "Plant5") {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    $encrypted = $iv . $encrypted;
    return bin2hex($encrypted);
}

// Decryption function
function DecryptId($data, $key = "Plant5") {
    $data = hex2bin($data);
    $iv_length = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $iv_length);
    $encrypted = substr($data, $iv_length);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}

//fun
// function GenerateInternalPartNumber(){
//     return
// }
