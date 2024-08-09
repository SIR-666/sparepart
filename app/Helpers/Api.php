<?php
use Illuminate\Support\Facades\Http;

// $apiEndpoint = 'https://api.example.com/create';
// $header    'Authorization' => 'Bearer ' . $token
function GetAPI($apiEndpoint,$header){
    $response = Http::withHeaders($header)->get($apiEndpoint);
    return $response->json();
}

// $apiEndpoint = 'https://api.example.com/create';
// $postData = [
//             'key' => 'value',
//             'another_key' => 'another_value',
//         ];
// $header    'Authorization' => 'Bearer ' . $token
function PostAPI($apiEndpoint,$header,$postData){
    $response = Http::withHeaders($header)->post($apiEndpoint, $postData);
    return $response->json();
}

// $apiEndpoint = 'https://api.example.com/update';
// $header    'Authorization' => 'Bearer ' . $token
// $putData = [
//             'key' => 'updated_value',
//             'another_key' => 'updated_another_value',
//         ];
function PutAPI($apiEndpoint, $header, $putData)
{
    $response = Http::withHeaders($header)->put($apiEndpoint, $putData);
    return $response->json();
}

// $apiEndpoint = 'https://api.example.com/delete';
// $header    'Authorization' => 'Bearer ' . $token
function DeleteAPI($apiEndpoint, $header)
{
    $response = Http::withHeaders($header)->delete($apiEndpoint);
    return $response->json();
}