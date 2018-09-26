<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * CLASS:   Streams (Stream list management)
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	27-01-2018
 */

class RC_Streams {
    public static function get_last_color() {
        global $db;
        return $db->get_var("SELECT color FROM streams ORDER BY name DESC LIMIT 1");
    }
    
    public static function get_streams() {
        global $db;
        return $db->get_results("SELECT * FROM streams ORDER BY name");
    }
    
    public static function add_stream($name, $ip, $port, $type, $vars)
    {
        global $db;
        
        /* Do not use the same color */
        $color_array = array("primary", "mint", "pink", "info", "warning", "purple", "success", "danger", "dark");
        $last_color = RC_Streams::get_last_color(); 
        $color_array = array_diff($color_array, array($last_color));
        $index_color_array = array_rand($color_array);
        $our_color = $color_array[$index_color_array];
        
        /* Escape vars and insert */
        $db->lescape(array($name, $ip, $port, $type));
        $type = ($type == "icecast") ? "icecast" : "shoutcast";
        $db->query("INSERT INTO streams VALUES(NULL, '$name', '$ip', '$port', '$type', '$vars', '$color')");
        return $db->insert_id;
    }
    
    public static function del_stream($id)
    {
        global $db;
        $id = $db->escape($id);
        $db->query("DELETE FROM streams WHERE id = $id");
    }
        
    public static function get_shoutcast_listeners($ip, $port, $id)
    {
        $object = simplexml_load_file("http://$ip:$port/stats?sid=$id"); 
        return $object->CURRENTLISTENERS;
    }
    
    public static function get_icecast_listeners($ip, $port, $mount)
    {
        $radio = RC_Streams::get_icecast_info($ip, $port, $mount);
        return (is_numeric($radio['listeners']) ? $radio['listeners'] : 0);
    }
    
    public static function get_icecast_info($ip, $port, $mount)
    {
        $url = "http://".$ip.":".$port . "/status.xsl?mount=/".$mount;
        
        // Get info file
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);
        
        $temp_array = array();
        $radio_info = array();
 
        // icecast2rako aldatuta
        $search_for = "<td\s[^>]*class=\"streamstats\">(.*)<\/td>";
        $search_td = array('<td class="streamstats">','</td>');
 
        if(preg_match_all("/$search_for/siU",$output,$matches)) {
           foreach($matches[0] as $match) {
              $to_push = str_replace($search_td,'',$match);
              $to_push = trim($to_push);
              array_push($temp_array,$to_push);
           }
        }
 
        if(count($temp_array)) {
            $radio_info['mount_start'] = $temp_array[0];
            $radio_info['bit_rate'] = $temp_array[1];
            $radio_info['listeners'] = $temp_array[2];
            $radio_info['most_listeners'] = $temp_array[3];
            $radio_info['genre'] = $temp_array[4];
            $radio_info['url'] = $temp_array[5];
 
            if(isset($temp_array[6])) {
                $x = explode(" - ",$temp_array[6]);
                $radio_info['now_playing']['artist'] = $x[0];
                $radio_info['now_playing']['track'] = $x[1];
            }
            $radio_info['status'] = 'ON AIR';
 
        }
        return $radio_info;
    }
}