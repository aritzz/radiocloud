<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Podcast (External podcast management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	25-01-2018
 */
     
     
class RC_Podcast {
    
    
    public static function set_url($id, $val)
    {
        global $db;
        $id = $db->escape($id);
        $val = $db->escape($val);
        $db->query("UPDATE podcast_download SET url='$val' WHERE id=$id");            
    }
    
    public static function set_day($id, $val)
    {
        global $db;
        $id = $db->escape($id);
        $val = $db->escape($val);
        if (is_numeric($id))
            $db->query("UPDATE podcast_download SET dday='$val' WHERE id=$id");            
    }
    
    public static function set_hour($id, $val)
    {
        global $db;
        $id = $db->escape($id);
        $val = $db->escape($val);
        if (is_numeric($id))
            $db->query("UPDATE podcast_download SET dhour='$val' WHERE id=$id");
    }
    
    public static function add_podcast($url, $eguna, $ordua, $blockid, $mota)
    {
        global $db;
        $db->lescape(array($url, $eguna, $ordua, $blockid));
        $ret = 0;
        
        if (!empty($eguna) or !empty($ordua) or !empty($url) or !empty($blockid) or !empty($mota))
        {
            $db->query("INSERT INTO podcast_download VALUES(NULL, '$url', '$eguna', '$ordua', '$blockid', '$mota', '', '')");
            $ret = $db->insert_id;
        }
        
        return $ret;

    }
    
    public static function force_update($id) {
        global $db;
        if (!empty($id) && is_numeric($id))
            $db->query("UPDATE podcast_download SET last_file='FORCE', last_update=NULL WHERE id=$id");
    }
    
    public static function get_podcasts() 
    {
        global $db;
        return $db->get_results("SELECT pd.last_update as update_time, pd.*, blocks.vars as filename, blocks.desc as desk, blocks.name as name, block_groups.groupname as groupname FROM podcast_download pd INNER JOIN blocks ON pd.blockid = blocks.id INNER JOIN block_groups ON blocks.groupid = block_groups.id");
    }
    
    public static function del_podcast($id) {
        global $db;
        $id = $db->escape($id);
        
        if (is_numeric($id)) {
            // Delete from schedule database
            $BLOCKM = new RC_Block();
            $blockid = $db->get_var("SELECT blockid FROM podcast_download WHERE id='".$id."'");
            $BLOCKM->del_block($blockid);

            // Delete groups and blocks with that group
            $db->query("DELETE FROM podcast_download WHERE id = '".$id."'");
        }
    }

}