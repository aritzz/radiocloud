<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Jingles (jingle management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	05-02-2018
 */

class RC_Jingles {
       
    public static function get_jingles() {
        global $db;
        return $db->get_results("SELECT * FROM jingles ORDER BY name ASC");
    }
    
    public static function type_conv($type)
    {
        switch ($type)
        {
            case "File":
                return "Fitxategia";
                break;
            case "RandomFile":
                return "Ausaz";
                break;
        }
    }
    
    public static function jingletype_conv($type)
    {
        switch ($type)
        {
            case "beep":
                return "Beep ostean";
                break;
            case "end":
                return "Bukaeran";
                break;
            case "endp":
                return "Buk. prob.";
                break;
        }
    }
    
    public static function num_to_prob($prob)
    {
        switch ($prob)
        {
            case 1:
                return "Beti";
            case 2:
                return "Handia";
            case 5:
                return "Ertaina";
            case 7:
                return "Txikia";
        }
    }
    
    public static function add_jingle($name, $type, $filetype, $source, $probability)
    {
        global $db;
        
        /* Escape vars and insert */
        $db->lescape(array($name, $type, $source, $probability, $filetype));
        
        $db->query("INSERT INTO jingles VALUES(NULL, '$name', '$type', '$filetype','$source', '$probability', 1)");
        return $db->insert_id;
    }
    
    public static function del_jingle($id)
    {
        global $db;
        $id = $db->escape($id);
        $db->query("DELETE FROM jingles WHERE id = $id");
    }
    
    public static function toggle_status($id)
    {
        global $db;
        $id = $db->escape($id);
        
        $db->query("UPDATE jingles SET enabled = IF(enabled=1, 0, 1) WHERE id=$id");
    }
        
    
 
}