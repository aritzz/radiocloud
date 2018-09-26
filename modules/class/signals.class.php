<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Signals (Signal management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	23-11-2017
 */
     
     
class RC_Signals {
     
    // Get signal status
    function get_status($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT status FROM signals WHERE id=$id");
    }
    
    // Set signal status
    function set_status($id, $newstatus) {
        global $db;
        $id = $db->escape($id);
        $newstatus = $db->escape($newstatus);
        
        return $db->query("UPDATE signals SET status=$newstatus WHERE id=$id");
    }
     
    // Get signal info
    function get_info($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT info FROM signals WHERE id=$id");
    }
    
    // Set signal info
    function set_info($id, $newinfo) {
        global $db;
        $id = $db->escape($id);
        $newinfo = $db->escape($newinfo);
        
        return $db->query("UPDATE signals SET info='$newinfo' WHERE id=$id");
    }


}