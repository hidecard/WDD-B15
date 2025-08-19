<?php
function jjg_calculate_next_year($start_date = false) {
    $now = $start_date ? $start_date : time();
    $month = date('m', $now);
    $day   = date('d', $now);
    $year  = date('Y', $now) + 1;

    $plus_one_year = strtotime("$year-$month-$day");
    return $plus_one_year;
}


function jjg_calculate_next_month($start_date = false) {
    $now = $start_date ? $start_date : time();
    $current_month = date('n', $now);

    if ($current_month == 12) {
        $next_month = 1;
        $plus_one_month = mktime(0, 0, 0, 1, date('d', $now), date('Y', $now) + 1);
    } else {
        $next_month = $current_month + 1;
        $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now), date('Y', $now));
    }

    $i = 1;
    while (date('n', $plus_one_month) != $next_month) {
        $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now) - $i, date('Y', $now));
        $i++;
    }
    return $plus_one_month;
}
?>


