<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * LDAP auth global class
 */


class LDAP {

    // Cheap function for validating
    static function is_valid($adServer, $domain, $username, $password) {
        // if you want to disable certificate check
        // putenv('LDAPTLS_REQCERT=never');
        $ldap = ldap_connect($adServer);
        $ldaprdn = $domain . "\\" . $username;

//        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
//        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        $bind = ldap_bind($ldap, $ldaprdn, $password);

        if ($bind) return true;
        else return false;      

    }

}
