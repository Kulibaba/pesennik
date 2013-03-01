<?php
function toLowerCase($string){
/*
	return @string in lower case 
*/
	$string = strtolower ($string);
	$string = str_replace("А", "а", $string);
	$string = str_replace("Б", "б", $string);
	$string = str_replace("В", "в", $string);
	$string = str_replace("Г", "г", $string);
	$string = str_replace("Ґ", "ґ", $string);
	$string = str_replace("Д", "д", $string);
	$string = str_replace("Е", "е", $string);
	$string = str_replace("Є", "є", $string);
	$string = str_replace("Ж", "ж", $string);
	$string = str_replace("З", "з", $string);
	$string = str_replace("И", "и", $string);
	$string = str_replace("І", "і", $string);
	$string = str_replace("Ї", "ї", $string);
	$string = str_replace("Й", "й", $string);
	$string = str_replace("К", "к", $string);
	$string = str_replace("Л", "л", $string);
	$string = str_replace("М", "м", $string);
	$string = str_replace("Н", "н", $string);
	$string = str_replace("О", "о", $string);
	$string = str_replace("П", "п", $string);
	$string = str_replace("Р", "р", $string);
	$string = str_replace("С", "с", $string);
	$string = str_replace("Т", "т", $string);
	$string = str_replace("У", "у", $string);
	$string = str_replace("Ф", "ф", $string);
	$string = str_replace("Х", "х", $string);
	$string = str_replace("Ц", "ц", $string);
	$string = str_replace("Ч", "ч", $string);
	$string = str_replace("Ш", "ш", $string);
	$string = str_replace("Щ", "щ", $string);
	$string = str_replace("Ь", "ь", $string);
	$string = str_replace("Ю", "ю", $string);
	$string = str_replace("Я", "я", $string);
	$string = str_replace("Ё", "ё", $string);
	$string = str_replace("Ъ", "ъ", $string);
	$string = str_replace("Ы", "Ы", $string);
	$string = str_replace("Э", "э", $string);
	return $string;
}
function toCleanString($string){
/*
	return @string without special symbols
*/
	$string = str_replace(".", "", $string);
	$string = str_replace("’", "'", $string);
	$string = str_replace("?", "", $string);
	$string = str_replace("!", "", $string);
	$string = str_replace("'", "'", $string);
	$string = str_replace("\"", "'", $string);
	$string = str_replace("~", "", $string);
	$string = str_replace("`", "'", $string);
	$string = str_replace("@", "", $string);
	$string = str_replace("#", "", $string);
	$string = str_replace("$", "", $string);
	$string = str_replace("%", "", $string);
	$string = str_replace("^", "", $string);
	$string = str_replace("&", "and", $string);
	$string = str_replace("*", "", $string);
	$string = str_replace("[", "", $string);
	$string = str_replace("]", "", $string);
	$string = str_replace("{", "", $string);
	$string = str_replace("}", "", $string);
	$string = str_replace("/", "", $string);
	$string = str_replace("\\", "", $string);
	$string = str_replace("|", "", $string);
	$string = str_replace(";", "", $string);
	$string = str_replace(":", "", $string);
	$string = str_replace("+", "", $string);
	$string = str_replace("<", "", $string);
	$string = str_replace(">", "", $string);
	$string = str_replace("’", "'", $string);
	return $string;
}
function toSearchString($string){
	$string = toLowerCase($string);
	$string = toCleanString($string);
	$string = str_replace("(", "", $string);
	$string = str_replace(")", "", $string);
	$string = str_replace("'", "", $string);
	$string = str_replace("-", " ", $string);
	return $string;
}
function toNiceUrl($string){
/*
	return @string in nice urlencode style
*/
	$string = toCleanString($string);
	$string = urlencode($string);
	$string = str_replace("%27", "", $string);
	$string = str_replace("%28", "(", $string);
	$string = str_replace("%29", ")", $string);
	$string = str_replace("+", "_", $string);
	$string = str_replace("__", "_", $string);
	$string = str_replace("___", "_", $string);
	return $string;
}
function getFullDate($date) {
/*
	get russian-style date from 
	@date - string, date from MySQL
*/
	$date_elements  = explode("-",$date);
	$unix_date =  mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
	$rus_date = date('d F Y', $unix_date);
	$rus_date = str_replace("January", "января", $rus_date);
	$rus_date = str_replace("February", "февраля", $rus_date);
	$rus_date = str_replace("March", "февраля", $rus_date);
	$rus_date = str_replace("April", "февраля", $rus_date);
	$rus_date = str_replace("May", "февраля", $rus_date);
	$rus_date = str_replace("June", "февраля", $rus_date);
	$rus_date = str_replace("July", "февраля", $rus_date);
	$rus_date = str_replace("August", "февраля", $rus_date);
	$rus_date = str_replace("September", "февраля", $rus_date);
	$rus_date = str_replace("October", "февраля", $rus_date);
	$rus_date = str_replace("November", "февраля", $rus_date);
	$rus_date = str_replace("December", "декабря", $rus_date);
	return  $rus_date;
}
?>