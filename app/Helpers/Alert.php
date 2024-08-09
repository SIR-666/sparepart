<?php
use RealRashid\SweetAlert\Facades\Alert;

function AlertSuccess($title,$message){
    return Alert::success($title, $message);
}

function AlertInfo($title,$message){
    return Alert::info($title, $message);
}

function AlertError($title,$message){
    return Alert::error($title, $message);
}
