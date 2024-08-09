<?php

function StringToDate($dateString)
{
    $format = 'Y-m-d H:i:s';

    // Create a DateTime object from the string
    $dateTime = DateTime::createFromFormat($format, $dateString);

    // Check if the conversion was successful
    if ($dateTime instanceof DateTime) {
        // Output the formatted date
        return $dateTime->format('Y-m-d H:i:s');
    } else {
        $datetime = strtotime($dateString);
        return date('Y-m-d H:i', $datetime);
    }
}

function GetDayNameFromDate($dateString)
{
    $timestamp = strtotime($dateString);
    return date('l', $timestamp);
}

function CalculateDateDifference($date1)
{
    $date1 = StringToDate($date1);
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime();

    // Hitung selisih antara dua tanggal
    $interval = $datetime1->diff($datetime2);

    // Tentukan apakah tanggal pertama lebih kecil atau lebih besar dari tanggal kedua
    if ($datetime1 < $datetime2) {
        $sign = '+';
    } else {
        $sign = '-';
    }

    if ($interval->format('%a') == 0) {
        return 0;
    }

    // Format output dengan tanda yang sesuai
    $formattedDifference = $sign . $interval->format('%a');

    return $formattedDifference;
}

function ToStrToTimeJs($dateString)
{
    $timestamp = strtotime(substr($dateString, 0, 19)); // Get the Unix timestamp (seconds)
    $milliseconds = (int)substr($dateString, 20); // Extract the milliseconds and convert to integer
    $result = ($timestamp * 1000) + $milliseconds; // Combine both parts
    return $result;
}

function GetMonthName($monthNumber)
{
    $dateObj = DateTime::createFromFormat('!m', $monthNumber);
    return $dateObj->format('F');
}
