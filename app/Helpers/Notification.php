<?php

use App\Constants\Constants;

function NotifNewRFQ($status,$cust,$countPartname,$id,$name)
{
    $message = "$status
================
Cust     : $cust
Partname : $countPartname
================
ID : $id
By : $name";

    $data = [
        "chat_id" => "@ipgp5managementproject",
        "message"  => $message
    ];
    $url = Constants::ApiPegawaiBaseUrl . "/api/send-telegram-php";
    PostAPI($url, [], $data);

    return true;
}
