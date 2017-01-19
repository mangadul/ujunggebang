<?php

function pretty_relative_time($time) {
 if ($time !== intval($time)) { $time = strtotime($time); }
 $d = time() - $time;
 if ($time < strtotime(date('Y-m-d 00:00:00')) - 60*60*24*3) {
	 $format = 'F j';
	 if (date('Y') !== date('Y', $time)) {
		$format .= ", Y";
	 }
	 return date($format, $time);
 }
	if ($d >= 60*60*24) {
		 $day = 'Yesterday';
		 if (date('l', time() - 60*60*24) !== date('l', $time)) { $day = date('l', $time); }
		 return $day . " at " . date('g:ia', $time);
	}
 if ($d >= 60*60*2) { return intval($d / (60*60)) . " hours ago"; }
 if ($d >= 60*60) { return "about an hour ago"; }
 if ($d >= 60*2) { return intval($d / 60) . " minutes ago"; }
 if ($d >= 60) { return "about a minute ago"; }
 if ($d >= 2) { return intval($d) . " seconds ago"; }
 return "a few seconds ago";

}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
