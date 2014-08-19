<?php
function escape($string){
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}