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
	$string = str_replace("Ы", "ы", $string);
	$string = str_replace("Э", "э", $string);
	return $string;
}
function toUpperCase($string){
/*
	return @string in upper case 
*/
	$string = strtoupper ($string);
	$string = str_replace("а", "А", $string);
	$string = str_replace("б", "Б", $string);
	$string = str_replace("в", "В", $string);
	$string = str_replace("г", "Г", $string);
	$string = str_replace("ґ", "Ґ", $string);
	$string = str_replace("д", "Д", $string);
	$string = str_replace("е", "Е", $string);
	$string = str_replace("є", "Є", $string);
	$string = str_replace("ж", "Ж", $string);
	$string = str_replace("з", "З", $string);
	$string = str_replace("и", "И", $string);
	$string = str_replace("і", "І", $string);
	$string = str_replace("ї", "Ї", $string);
	$string = str_replace("й", "Й", $string);
	$string = str_replace("к", "К", $string);
	$string = str_replace("л", "Л", $string);
	$string = str_replace("м", "М", $string);
	$string = str_replace("н", "Н", $string);
	$string = str_replace("о", "О", $string);
	$string = str_replace("п", "П", $string);
	$string = str_replace("р", "Р", $string);
	$string = str_replace("с", "С", $string);
	$string = str_replace("т", "Т", $string);
	$string = str_replace("у", "У", $string);
	$string = str_replace("ф", "Ф", $string);
	$string = str_replace("х", "Х", $string);
	$string = str_replace("ц", "Ц", $string);
	$string = str_replace("ч", "Ч", $string);
	$string = str_replace("ш", "Ш", $string);
	$string = str_replace("щ", "Щ", $string);
	$string = str_replace("ь", "Ь", $string);
	$string = str_replace("ю", "Ю", $string);
	$string = str_replace("я", "Я", $string);
	$string = str_replace("ё", "Ё", $string);
	$string = str_replace("ъ", "Ъ", $string);
	$string = str_replace("ы", "Ы", $string);
	$string = str_replace("э", "Э", $string);
	return $string;
}
function deleteSpaces($string){
	return ltrim($string);
}
function replaceApostrophes($string){ 
	$string = str_replace("'", "’", $string);
	$string = str_replace("\'", "’", $string);
	$string = str_replace("�", "’", $string);
	$string = str_replace("\"", "’", $string);
	$string = str_replace("`", "’", $string);	
	return $string;
}
function toNiceLyrics($string){
	$string = deleteSpaces($string);
	$string = replaceApostrophes($string);
	$string  = str_replace("<br>", "\n", $string);
	return $string;
}
function toNiceName($string){
/*
return @string in next style: This Is Artist - This is name
*/
	$string = toLowerCase ($string);
	$string = deleteSpaces($string);
	$string = replaceApostrophes($string);
	
    if (preg_match("/[a-zA-z]+/", $string, $maches) == 0){ 
		$firstChar = toUpperCase($string[0].$string[1]);
		return $firstChar.substr($string, 2);
	}else{
		return strtoupper($string[0]).substr($string, 1);
	}
}
function toCleanString($string){
/*
	return @string without special symbols
*/
	$string = deleteSpaces($string);
	$string = replaceApostrophes($string);
	$string = str_replace(".", "", $string);
	$string = str_replace("?", "", $string);
	$string = str_replace("!", "", $string);
	$string = str_replace("~", "", $string);
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
	return $string;
}
function toSearchString($string){
	$string = toLowerCase($string);
	$string = toCleanString($string);
	$string = str_replace("(", "", $string);
	$string = str_replace(")", "", $string);
	$string = str_replace("-", " ", $string);
	$string = str_replace("’", "", $string);
	return $string;
}
function toNiceUrl($string){
/*
	return @string in nice urlencode style
*/
	$string = toCleanString($string);
	$string = urlencode($string);
	$string = str_replace("%28", "(", $string);
	$string = str_replace("%29", ")", $string);
	$string = str_replace("%E2%80%99", "%27", $string);
	$string = str_replace("%2C", "", $string);
	$string = str_replace("+", "_", $string);
	$string = str_replace("/_+/", "_", $string);
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