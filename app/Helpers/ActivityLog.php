<?php

use Spatie\Activitylog\Models\Activity;

function CreateActivityLog($description){
    return activity()->log($description);
}

function GetAllActivityLog(){
    return Activity::all(); 
}

function GetByUserIDActivityLog($user_id){
    return Activity::where('causer_id', $user_id)->get();; 
}