<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Calendar (Calendar & schedule management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	26-01-2018
 */
     

class RC_Calendar {
    
    public static function add_calendar($calname) 
    {
        global $db;
        $calname = $db->escape($calname);
        
        $db->query("INSERT INTO calendar VALUES(NULL, '$calname')");
        $insertid = $db->insert_id;
        return $insertid;
    }
    
    public static function del_calendar($calid)
    {
        global $db;
        $calid = $db->escape($calid);
        $db->query("DELETE FROM calendar WHERE id ='$calid'");    
        $db->query("DELETE FROM schedule WHERE calendar_id ='$calid'"); 
    }
    
    public static function get_all_calendars()
    {
        global $db;
        return $db->get_results("SELECT * FROM calendar order by name");
    }
    
    function get_default_calendar_id() {
        global $db;
        $calendars = $db->get_row("SELECT * FROM calendar WHERE def=1 LIMIT 1");
        return $calendars->id;
    }
    
    public static function erase_calendar($calid)
    {
        global $db;
        $calid = $db->escape($calid);
        $db->query("DELETE FROM schedule WHERE calendar_id ='$calid'"); 
    }
    
    public static function get_schedule($calid)
    {
        global $db;
        $calid = $db->escape($calid);
        return $db->get_results("SELECT * FROM schedule WHERE calendar_id=$calid");
    }
    
    public static function add_schedule($day, $hour, $type, $intday, $calid)
    {
        global $db;
        $db->lescape(array($day, $hour, $type, $intday, $calid));
        $db->query("INSERT INTO schedule VALUES(NULL, '$day', '$hour', '$type', '$intday', '$calid')");
        return $db->insert_id;
    }
    
    public static function set_calname($id, $val)
    {
        global $db;
        $id = $db->escape($id); $val = $db->escape($val);
        $db->query("UPDATE calendar SET name='$val' WHERE id='$id'");
    }
    
    public static function get_schedule_day_hour($intday, $hour, $id)
    {
        global $db;
        $db->lescape(array($intday, $hour, $id));
        return $db->get_results("SELECT day, hour FROM schedule WHERE ((intday = '".$intday."') and hour > '".$hour."') and id != '".$id."' ORDER BY intday, hour LIMIT 1");
    }
    
    public static function get_schedule_with_data($calid)
    {
        global $db;
        $calid = $db->escape($calid);
        return $db->get_results("SELECT s.*, b.desc as name, b.name blockname, b.duration as duration, bg.color as color FROM schedule s
INNER JOIN blocks b ON s.type=b.name 
INNER JOIN block_groups bg ON b.groupid=bg.id WHERE s.calendar_id='".$calid."' ORDER BY s.day, s.hour");
    }
    
    public static function update_schedule($id, $date)
    {
        global $db;
        $evid = $id;
        $date = $date;
        $converted_day = date("l", strtotime($date));
        $converted_hour = date("H:i", strtotime($date)).":00";
        $intday = daytoint($converted_day);
        $db->query("UPDATE schedule SET day='$converted_day', hour='$converted_hour', intday='$intday' WHERE id='$evid'");

    }
    
    public static function add_schedule_formatted($block, $date, $calendar_id)
    {
        global $db;
        $block = $db->escape($block);
        $date = $db->escape($date);
        $calendar_id = $db->escape($calendar_id);

        $converted_day = date("l", strtotime($date));
        $converted_hour = date("H:i", strtotime($date)).":00";
        $intday = daytoint($converted_day);

        $db->query("INSERT INTO schedule VALUES(NULL, '$converted_day', '$converted_hour', '$block', '$intday', '$calendar_id')");
        return $db->insert_id;
    }
    
    public static function del_schedule($id)
    {
        global $db;
        $evid = $db->escape($id);
        $db->query("DELETE FROM schedule WHERE id ='$evid'");
    }
}