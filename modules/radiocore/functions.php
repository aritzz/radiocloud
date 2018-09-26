<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	09-10-2016
 */


function daytodate($weekday, $firstday) {
	switch ($weekday)
	{
		case "Monday":
			$i = 0;
			break;
		case "Tuesday":
			$i = 1;
			break;
		case "Wednesday":
			$i = 2;
			break;
		case "Thursday":
			$i = 3;
			break;
		case "Friday":
			$i = 4;
			break;
		case "Saturday":
			$i = 5;
			break;
		case "Sunday":
			$i = 6;
			break;
	}
	

	return date("Y-m-d", strtotime('+'.$i.' days', strtotime($firstday)));
}

function daytoint($weekday) {
	switch ($weekday)
	{
		case "Monday":
			$i = 0;
			break;
		case "Tuesday":
			$i = 1;
			break;
		case "Wednesday":
			$i = 2;
			break;
		case "Thursday":
			$i = 3;
			break;
		case "Friday":
			$i = 4;
			break;
		case "Saturday":
			$i = 5;
			break;
		case "Sunday":
			$i = 6;
			break;
	}

	return $i;
}

function number_to_day($jasotakoa)
{
	$r = "Urtzirula";
	switch ($jasotakoa)
	{
		case '0': 
		$r = "Astelehena"; 
		break;		
		case '1': 
		$r =  "Asteartea"; 
		break;	
		case '2': 
		$r =  "Asteazkena"; 
		break;	
		case '3': 
		$r =  "Osteguna"; 
		break;	
		case '4': 
		$r =  "Ostirala"; 
		break;	
		case '5': 
		$r =  "Larunbata"; 
		break;	
		case '6': 
		$r =  "Igandea"; 
		break;	
	}

	return $r;
}