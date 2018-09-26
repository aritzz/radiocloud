<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Blocks (Block management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	23-11-2017
 */
     
     
class RC_Block {
    
    /** Block getters/setters **/
    public static function get_var($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT vars FROM blocks WHERE id=$id");
    }
    
    public static function set_var($id, $newvar) {
        global $db;
        $id = $db->escape($id);
        $newvar = $db->escape($newvar);
        
        return $db->query("UPDATE blocks SET vars='$newvar' WHERE id=$id");
    }
    
    public static function set_desc($id, $newdesc) {
        global $db;
        $id = $db->escape($id);
        $newdesc = $db->escape($newdesc);
        
        return $db->query("UPDATE blocks SET blocks.desc='$newdesc' WHERE blocks.id=$id");
    }
    
    public static function get_desc($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT desc FROM blocks WHERE id=$id");
    }
    
    public static function set_duration($id, $new) {
        global $db;
        $id = $db->escape($id);
        $new = $db->escape($new);
        $new .= " minutes";
        
        return $db->query("UPDATE blocks SET duration='$new' WHERE id=$id");
    }
    
    public static function get_duration($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT duration FROM blocks WHERE id=$id");
    }
    
    public static function set_group($id, $new) {
        global $db;
        $id = $db->escape($id);
        $new = $db->escape($new);
        
        return $db->query("UPDATE blocks SET group='$new' WHERE id=$id");
    }
    
    public static function get_group_id($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT group FROM blocks WHERE id=$id");
    }
    
    public static function get_group_name($id) {
        global $db;
        $id = $db->escape($id);
        $groupid = $db->escape($this->get_group_id($id));
        return $db->get_var("SELECT groupname FROM block_groups WHERE id=$groupid");
    }
    
    public static function get_groups() {
        global $db;
        return $db->get_results("SELECT * FROM block_groups ");
    }
    
    public static function get_blocks() {
        global $db;
        return $db->get_results("SELECT *, blocks.id as ident FROM blocks INNER JOIN block_groups ON block_groups.id = blocks.groupid WHERE blocks.id NOT IN (SELECT blockid FROM podcast_download UNION SELECT blockid FROM programs)");
    }

    public static function set_type($id, $new) {
        global $db;
        $id = $db->escape($id);
        $new = $db->escape($new);
        
        return $db->query("UPDATE blocks SET type='$new' WHERE id=$id");
    }
    
    public static function get_type($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT type FROM blocks WHERE id=$id");
    }
    
    public static function set_name($id, $new) {
        global $db;
        $id = $db->escape($id);
        $new = $db->escape($new);
        
        return $db->query("UPDATE blocks SET name='$new' WHERE id=$id");
    }
    
    public static function get_groups_ordered_by_id() {
        global $db;
        return $db->get_results("SELECT id, groupname, color FROM block_groups ORDER BY id ASC");
    }
    
    public static function get_blocks_enabled_by_group($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_results("SELECT blocks.id as id, blocks.desc as name, blocks.name as blockname, blocks.duration as duration FROM blocks WHERE blocks.groupid = ".$id." AND blocks.enabled=1 AND blocks.id > 2");
    }
    
    public static function get_last_color() {
        global $db;
        return $db->get_var("SELECT color FROM blocks ORDER BY id DESC LIMIT 1");
    }

    /* Add things */
    public static function add_group($izena, $kolorea)
    {
        global $db;
        $izena = $db->escape($izena);
        $kolorea = $db->escape($kolorea);
        return $db->query("INSERT INTO block_groups VALUES(NULL, '".$izena."', '".$kolorea."')");
    }

    public static function add_block($izena, $taldea, $mota, $helbidea, $iraupena) // returns 1 for OK transaction
    {
        global $db;
        $ret = 0;
        $izena = $db->escape($izena);
        $taldea = $db->escape($taldea);
        $mota = $db->escape($mota);
        $helbidea = $db->escape($helbidea);
        $iraupena = $db->escape($iraupena);
        
        $iraupena = is_numeric($iraupena) ? $iraupena." minutes" : "";

        if (empty($izena) or empty($taldea) or empty($mota) or empty($helbidea))
            return $ret;
        
        if (filter_var($helbidea, FILTER_VALIDATE_URL) === FALSE) {
            $helbidea = preg_replace('#[^a-zA-Z0-9_.]#', '', $helbidea);
        }
        

        
        // Transaction start
        $db->query('BEGIN');

        $last_id = $db->get_var("SELECT id FROM blocks ORDER BY id DESC LIMIT 1"); // get id
        $last_id++;
        $db->query("INSERT INTO blocks VALUES(NULL, 'Block$last_id', '$mota', '$helbidea', '$izena', '$taldea', 1, '$iraupena')");
        // Commit
        if($db->query('COMMIT') !== false) {
            $ret = 1;
        } else // or rollback
         $db->query('ROLLBACK');
        
        if ($ret == 1) $ret = $db->insert_id;
        
        return $ret;
    }
    
    
    /* Enable/disable block */
    public static function disable($id) {
        global $db;
        $id = $db->escape($id);
        return $db->query("UPDATE blocks SET enabled=0 WHERE id=$id");
    }
    
    public static function enable($id) {
        global $db;
        $id = $db->escape($id);
        return $db->query("UPDATE blocks SET enabled=1 WHERE id=$id");
    }
    
        
    public static function is_enabled($id) {
        global $db;
        $id = $db->escape($id);
        return $db->get_var("SELECT enabled FROM blocks WHERE id=$id");
    }
    
    /* Delete blocks and groups */
    public static function del_group($id) {
        global $db;
        $id = $db->escape($id);
        
        if (is_numeric($id) && $id > 1) { // group 0 can't be removed
            // Delete from schedule database
            $all_blocks = $db->query("SELECT * FROM blocks WHERE groupid = '".$id."'");

            foreach ($all_blocks as $ublock) {
                $getblockname = $db->get_var("SELECT name FROM blocks WHERE blocks.id=".$ublock->id);
                $db->query("DELETE FROM schedule WHERE type='".$getblockname."'");
            }

            // Delete groups and blocks with that group
            $db->query("DELETE FROM block_groups WHERE id = '".$id."'");
            $db->query("DELETE FROM blocks WHERE groupid = '".$id."'");
        }
    }
    
    public static function del_block($id) {
        global $db;

        if (is_numeric($id) && $id > 2) {
            $getblockname = $db->get_var("SELECT name FROM blocks WHERE blocks.id=".$id);
            $db->query("DELETE FROM schedule WHERE type='".$getblockname."'");
            // Delete groups and blocks with that group
            $db->query("DELETE FROM blocks WHERE id = '".$id."'");
        }
    }
}