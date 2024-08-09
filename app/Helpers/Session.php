<?php
use Illuminate\Support\Facades\Session;

//Save Session Data
//$key --> name key from session
//$value --> value which want to save with key name in session
function SaveSession($key,$value){ 
    return Session::put($key, $value);
}

//Get All Session Data
function GetAllSession(){ 
    return Session::all();
}

//Get Session Data
//$key --> name key from session
function GetSession($key) {
    if (Session::has($key)) {
        return Session::get($key);
    }

    return null; // Return null or any other default value if the key is not present
}

//Remove Session Data
//$key --> name key from session
function RemoveSession($key){ 
    return Session::forget($key);
}

//Remove all Session Data
function RemoveAllSession($key){ 
    return Session::flush();
}

function GetHeaderAPIFromSession(){
    return [
        'Authorization' => "Bearer ".GetSession('token')
    ]; 
}

function GetUserIDFromSession(){
    return GetAllSession()["user"]->id;
}

function GetHeaderAPIFromAuthorization($request)
{
    return [
        'Authorization' => $request->header('Authorization')
    ]; 
}



