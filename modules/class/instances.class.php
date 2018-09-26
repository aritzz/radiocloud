<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Instances (Radiocore instance management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	26-01-2018
 */
     
     
class RC_Instance {
    
    public static function add_instance()
    {
        global $db;
        $name = $db->escape($name);
        if ($db->query("INSERT INTO instances VALUES(NULL, 0, '')")) {
            $insid = $db->insert_id;
            $name = get_config('radioname')." ".$insid;
            $db->query("UPDATE instances SET name = '$name' WHERE id='$insid'");
        }
    }
    
    public static function del_instance($id)
    {
        global $db;
        $instancedel = $db->escape($id);
        $db->query("DELETE FROM instances WHERE id='$instancedel'");
    }
    
    public static function update_instance($calendarid, $instanceid)
    {
        global $db;
        $instanceid = $db->escape($instanceid);
        $calendarid = $db->escape($calendarid);
        $db->query("UPDATE instances SET calendar_id = '$calendarid' WHERE id='$instanceid'");
    }
    
    public static function get_instances()
    {
        global $db;
        return $db->get_results("SELECT id, calendar_id, name FROM instances ORDER BY id");
    }
    
}