<?php

function GetStatusByTimeColorProgress($number){
    if ($number == 100) {
        return "success";
    }elseif ($number > 80) {
        return "info";
    }elseif ($number > 50) {
        return "warning";
    }

    return "danger";
}

function GetStatusDeadlineColorProgress($number){
    if ($number > 0) {
        return "danger"; //overdue
    }elseif ($number <= 0 && $number > -7) {
        return "warning"; // near deadline
    }

    return " text-dark";
}
