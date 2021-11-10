<?php
/*
*lay ngay tu dang int
*@time : int - thoi giaan muon hien thi
*@full_time : cho biet muon lay ca gio phut giay hay khong
*/
function get_date($time, $full_time = true)
{
    $format = '%d-%m-%Y';
    if ($full_time) {
        $format = $format . ' - %H:%i:%s';
    }
    $date = mdate($format, $time);
    return $date;
}
