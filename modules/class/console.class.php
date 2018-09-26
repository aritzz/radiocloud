<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Calendar (Calendar & schedule management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	26-01-2018
 */
     

class RC_Console {
    
    public static function add_console($userid, $name, $file, $type)
    {
        global $db;
        $db->lescape(array($userid, $name, $file, $type));
        $db->query("INSERT INTO console VALUES(NULL, '$userid', '$name', '$file', '$type')");
        return $db->insert_id;
    }
    
    public static function set_name($id, $name)
    {
        global $db;
        $id = $db->escape($id);
        $name = $db->escape($name);
        $db->query("UPDATE console SET name='".$name."' WHERE id='".$id."'");
    }
    
    public static function set_type($id, $type)
    {
        global $db;
        $id = $db->escape($id);
        $type = $db->escape($type);
        $db->query("UPDATE console SET type='".$type."' WHERE id='".$id."'");
    }
    
    public static function get_type_user($id, $userid)
    {
        global $db;
        $id = $db->escape($id);
        $userid = $db->escape($userid);
        return $db->get_var("SELECT type FROM console WHERE id=$id AND userid='".$userid."'");
    }
    
    public static function get_file_user($id, $userid)
    {
        global $db;
        $id = $db->escape($id);
        $userid = $db->escape($userid);
        return $db->get_var("SELECT file FROM console WHERE id=$id AND userid='".$userid."'");
    }
    
    public static function del_console_user($id, $userid)
    {
        global $db;
        $id = $db->escape($id);
        $userid = $db->escape($userid);
        $db->query("DELETE FROM console WHERE id=$id AND userid='".$userid."'");
    }
    
    public static function get_user_jingles($userid)
    {
        global $db;
        $userid = $db->escape($userid);
        return $db->get_results("SELECT * FROM console WHERE type='jingle' AND userid='".$userid."'");
    }
    
    public static function get_user_intro($userid)
    {
        global $db;
        $userid = $db->escape($userid);
        return $db->get_results("SELECT * FROM console WHERE type='intro' AND userid='".$userid."'");
    }
    
    public static function get_user_youtube($userid)
    {
        global $db;
        $userid = $db->escape($userid);
        return $db->get_results("SELECT * FROM console WHERE type='youtube' AND userid='".$userid."'");
    }
    
    public static function get_user_stream($userid)
    {
        global $db;
        $userid = $db->escape($userid);
        return $db->get_results("SELECT * FROM console WHERE type='stream' AND userid='".$userid."'");
    }
}