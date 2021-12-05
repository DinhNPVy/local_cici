<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*lay ngay tu dang int
*@time : int - thoi giaan muon hien thi
*@full_time : cho biet muon lay ca gio phut giay hay khong
*/
function get_date($time = '')
{
    $time = (!$time) ? now() : $time;
    $format = '%d-%m-%Y';

    $date = mdate($format, $time);
    return $date;
}

function get_time_info($time = '')
{
    $time = (!$time) ? now() : $time;
    $info = array();
    $info['d'] = intval(mdate('%d', $time));
    $info['m'] = intval(mdate('%m', $time));
    $info['y'] = intval(mdate('%Y', $time));
    $info['h'] = intval(mdate('%H', $time));
    $info['mi'] = intval(mdate('%i', $time));
    $info['s'] = intval(mdate('%s', $time));

    return $info;
}


function get_time_from_date($date, $format = '')
{
    // xu ly format 
    $format = ($format == '') ? "%d-%m-%Y" : $format;
    $format = str_replace(array('%', ' '), '', $format);
    $format = strtolower(($format));

    // phan tich input
    $arr_date = explode('-', $date);
    $arr_format = explode('-', $format);
    if (count($arr_date) != 3 || count($arr_format) != 3) {
        return FALSE;
    }

    // lay gia tri ngay thang nam
    $time = array();
    foreach ($arr_format as $k => $v) {
        $time[$v] = intval(trim($arr_date[$k]));
    }
    $timestamp = mktime(0, 0, 0, $time['m'], $time['d'], $time['y']);
    return $timestamp;
}

function get_time_between($date, $type = '')
{
    if (!$date) {
        return FALSE;
    }
    // neu date la moc thoi gian co dinh ngay - thang - nam
    $time = explode('-', $date);
    if (count($time) < 3) {
        return FALSE;
    }

    $d = $time[0];
    $m = $time[1];
    $y = $time[2];

    if ($type == '') {
        $time_start = mktime(0, 0, 0, $m, $d, $y); // lay thoi gian bat dau 1 ngay
        $time_end = mktime(24, 0, 0, $m, $d, $y); // thoi gian ket thuc 1 ngay
    } else {
        $time_start = mktime(0, 0, 0, $m, 1, $y); // lay thoi gian bat dau trong thang do
        if ($m == '12') {
            $m = 0;
            $y = $y + 1;
        }
        $time_end = mktime(24, 0, 0, $m + 1, 1, $y); // lay thoi gian ket thuc trong thang do 

    }

    $data = array('start' => $time_start, 'end' => $time_end);
    return $data;
}
