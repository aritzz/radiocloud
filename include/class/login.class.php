<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * Login global class
 */
 
 
 class User_Login {
	/* Login vars */
	var $login_status = 0;
	var $login_id = 0;
	var $login_name = 0;
	var $login_posta = 0;
	var $login_users = 0;
	var $login_realid = 0;
	var $login_groupid = 0;
	var $login_ordainketak = 0;
	var $login_level = 0;
	var $login_programid = 0;
	var $login_desc = 0;
	var $image = 0;
	
	
	function getUserFromDB($user, $pass, $do_md5 = false)
	{
		global $db;	

        if (get_config('ldap_status') == 1)
		if ($dat = $db->get_row("SELECT * FROM users WHERE username = '".$db->escape($user)."' AND identserver = 'external'")) {
			if (LDAP::is_valid(get_dir('ad_ldap'), get_dir('ad_domain'), $user, $pass))
				return $dat;
		}
		$pass = ($do_md5) ? $pass : md5($pass);

		if ($dat = $db->get_row("SELECT * FROM users WHERE username = '".$db->escape($user)."' AND password = '".$db->escape($pass)."'"))
			return $dat;
			
		return false;
	}
     
	function getUserFromID($userid)
	{
		global $db;	

		if ($dat = $db->get_row("SELECT * FROM users WHERE id = '".$db->escape($userid)."' AND identserver = 'external' AND enabled=1")) {
			if (LDAP::is_valid(get_dir('ad_ldap'), get_dir('ad_domain'), $dat->username, $dat->password))
				return $dat;
		}
		//$pass = ($do_md5) ? $pass : md5($pass);

		if ($dat = $db->get_row("SELECT * FROM users WHERE id = '".$db->escape($userid)."'  AND enabled=1"))
			return $dat;
			
		return false;
	}
	
	/* Do user login */
	function doLogin($user, $pass, $perm = 1) {
		global $_COOKIE, $db;
		
		if ($dat = $this->getUserFromDB($user,$pass)) {
		 $pass = (($dat->identserver) == "external") ? $pass : md5($pass);
         $tok = $this->createToken($dat->id, $perm);

         setcookie("user", $tok['TOKEN'], strtotime( '+30 days' )); 
 		 setcookie("pass", $tok['TOKENH'], strtotime( '+30 days' )); 
 		 setcookie("perm", $perm, strtotime( '+30 days' )); 

		 $this->login_status = 1;
		 $this->login_id = $user;
		 $this->login_realid = $dat->id;
		 
		 $this->login_name = $dat->name;
		 $this->login_level = $dat->level;
		 $this->login_programid = $dat->programid;
		 $this->image = $dat->image;
		 $this->login_desc = $dat->desc;

   		 return true;
		} else return false;
	}
     
     function createToken($userid, $expiration = 1)
     {
         global $db, $_SERVER;
         
         $token = $db->escape(hash('sha256', $userid.bin2hex(random_bytes(10))));
         $tokenhash = $db->escape(hash('sha256', $userid.random_bytes(5)));
         $exp_date = ($expiration == 1) ? "date_add(NOW(), INTERVAL 20 DAY)" : "date_add(NOW(), INTERVAL 2 HOUR)";
         $agent = $db->escape($_SERVER['HTTP_USER_AGENT']);
         $ip = $db->escape($_SERVER['REMOTE_ADDR']);
         
         $db->query("INSERT INTO login VALUES($userid, NOW(), '$ip', '$agent', '$token', '$tokenhash', $exp_date)");
         return array("TOKEN" => $token, "TOKENH" => $tokenhash);
     }
     
     function isValidToken($token, $hash)
     {
         global $db;
         $token = $db->escape($token);
         if ($ntoken = $db->get_results("SELECT * FROM login WHERE token='$token' AND hash='$hash' AND expiration > NOW() LIMIT 1"))
             return $ntoken[0];
         
         return FALSE;
     }

	function updateToken($token, $expiration = 1)
    {
        global $db;
        $token = $db->escape($token);
        $agent = $db->escape($_SERVER['HTTP_USER_AGENT']);
        $ip = $db->escape($_SERVER['REMOTE_ADDR']);
        $exp_date = ($expiration == 1) ? "date_add(NOW(), INTERVAL 20 DAY)" : "date_add(NOW(), INTERVAL 2 HOUR)";
        $db->query("UPDATE login SET seen=NOW(),agent='$agent',ip='$ip',expiration=$exp_date WHERE token='$token'");
    }
     
    function expireToken($token, $hash)
    {
        global $db;
        $token = $db->escape($token);
        $hash = $db->escape($hash);
        if ($this->isValidToken($token, $hash))
            $db->query("UPDATE login SET expiration=NOW() WHERE token='$token' and hash='$hash'");
    }
	
	/* Logout egin */
	function doLogout() {
         $this->expireToken($_COOKIE['user'], $_COOKIE['pass']);
		 setcookie("user"); 
 		 setcookie("pass"); 
         setcookie("perm"); 
	}
	
	/* Egoera aztertu eta datuak ezarri */
	function loginStatus() {
		global $_COOKIE, $db;
		
		if (empty($_COOKIE['user']) or empty($_COOKIE['pass']) or empty($_COOKIE['perm']))
			return false;
		$user = $_COOKIE['user'];
		$pass = $_COOKIE['pass'];
		$perm = $_COOKIE['perm'];

        //var_dump($this->isValidToken($_COOKIE['user'], $_COOKIE['pass'], $_COOKIE['perm']));
        $tokendata = $this->isValidToken($_COOKIE['user'], $_COOKIE['pass']);
        
		if ($tokendata != FALSE)
        { 
        if (($dat = $this->getUserFromID($tokendata->userid)) && $this->login_status == 0) { // taldea existitzen da
			setcookie("user", $tokendata->token, strtotime( '+30 days' )); 
 		    setcookie("pass", $tokendata->hash, strtotime( '+30 days' )); 
            $this->updateToken($tokendata->token, $_COOKIE['perm']);
		 	$this->login_status = 1;
		 	$this->login_id = $user;
		 	$this->login_realid = $dat->id;
		 	$this->login_name = $dat->name;
		 	$this->login_level = $dat->level;
			$this->image = $dat->image;
			$this->login_programid = $dat->programid;
		 	$this->login_desc = $dat->desc;

			
			return true;
		}}
        
        return false;
		
	}
	
	function is_admin() {
		if ($this->login_level == 100)
			return true;
			
		return false;
	}
 }
 
 ?>
