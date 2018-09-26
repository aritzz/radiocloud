<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	09-10-2016
 */

/** Calendar ajax requests **/





if ($_GET['calChange']) {

    switch($_GET['calChange']) {
        case "add":
            $calid = RC_Calendar::add_calendar($_POST['name']);            
            if ($calid != NULL) { echo $calid; die(); }
            else die("ERROR");
            break;
        case "del":
            $calid = $db->escape($_POST['id']);
            if ($calid != NULL) 
                if (is_numeric($calid)) {
                    RC_Calendar::del_calendar($calid);
                    die("ok");
                }
            break;
        case "erase":
            $calid = $db->escape($_POST['id']);
            if ($calid != NULL) 
                if (is_numeric($calid)) {
                    RC_Calendar::erase_calendar($calid);
                    die("ok");
                }
            break;
        case "clone":
            $calname = $db->escape($_POST['name']);
            $calid = $db->escape($_POST['id']);

            if ($calname != NULL) {
                $new_cal = RC_Calendar::add_calendar($calname);       
                $get_orig_cal = RC_Calendar::get_schedule($calid);
                foreach ($get_orig_cal as $calev) {
                    RC_Calendar::add_schedule($calev->day, $calev->hour, $calev->type, $calev->intday, $new_cal);
                }
                echo $new_cal;
                
                die();
            }
            die("ERROR");
            break;
        case "rename":
            $calname = $db->escape($_POST['name']);
            $calid = $db->escape($_POST['id']);
            if ($calname != NULL)
                if (is_numeric($calid))
                { 
                  RC_Calendar::set_calname($calid, $calname);
                 die("OK");
                }
            die("ERROR");
            break;
        default:
            die("ERROR");
            break;
    }
}
if ($_GET['getCalendars']) {
   $calendars = RC_Calendar::get_all_calendars();

    die(json_encode($calendars));    
}

if ($_POST['calendarID'] == 0)
        $calendar_id = RC_Calendar::get_default_calendar_id();
else
        $calendar_id = $db->escape($_POST['calendarID']);

// get calendar events
if ($_POST['req'] == "get_events")
{



$events_db = RC_Calendar::get_schedule_with_data($calendar_id);


$in = 0;
foreach ($events_db as $event)
{
	

	$get_next = RC_Calendar::get_schedule_day_hour($event->intday, $event->hour, $event->id);
        
	
	$next = ($get_next) ? daytodate($get_next[0]->day, $_POST['start'])."T".$get_next[0]->hour : daytodate($event->day, $_POST['start'])."T23:59:59";

	if (!$event->duration) { // undefined duration
		$event_end = $next;
	} else { 
		$event_start = daytodate($event->day, $_POST['start'])."T".$event->hour;
		$dateTime = DateTime::createFromFormat("Y-m-d\TH:i:s", $event_start);
		$dateTime->modify("+".$event->duration);
		$event_end = $dateTime->format("Y-m-d\TH:i:s");

		if ($get_next) // overlap
			if (strtotime($next) < strtotime($event_end))
				$event_end = $next;

	} 

 	$event_array[] = array(
            'id' => $event->id,
            'title' => $event->name,
            'blockname' => $event->blockname,
            'start' => daytodate($event->day, $_POST['start'])."T".$event->hour,
            'end' => $event_end,
            'className' => $event->color,
            'allDay' => false
    );
	$in++;
}

echo json_encode($event_array);

} // end list of events

if ($_POST['req'] == "update_event")
{
    RC_Calendar::update_schedule($_POST['id'], $_POST['date']);
}


if ($_POST['req'] == "trash")
{
    RC_Calendar::del_schedule($_POST['id']);
}
if ($_POST['req'] == "add_event")
{
    $retid = RC_Calendar::add_schedule_formatted($_POST['block'], $_POST['date'], $calendar_id);
	echo $retid;
}




die();

