<?php
function daysUntilToday($date)
{
    date_default_timezone_set('Asia/Kolkata');
    // echo date_timestamp_get(date_create($date)) . "<br />";
    // echo date_timestamp_get(date_create()) . "<br />";
    // echo date('l jS \of F Y h:i:s A');
    $diff = date_timestamp_get(date_create()) - date_timestamp_get(date_create($date));
    // return  $diff;
    if ($diff < (2.628e+6)) {
        if ($diff < (86400)) {
            if ($diff < (3600)) {
                if ($diff < (60)) {
                    return $diff . " seconds ago";
                } else {
                    return floor($diff / 60) . " minute" . (($diff > 120) ? "s" : "") . " ago";
                }
            } else {
                return floor($diff / (3600)) . " hour" . (($diff > (7200)) ? "s" : "") . " ago";
            }
        } else {
            return floor($diff / (86400)) . " day" . (($diff > (172800)) ? "s" : "") . " ago";
        }
    } else {
        return floor($diff / (2.628e+6)) . " month" . (($diff > (5.256e+6)) ? "s" : "") . " ago";
    }
}
