<?php
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();
//Load the PHPGangsta_GoogleAuthenticator Class
require_once(dirname(__FILE__).'/GoogleAuthenticator.php');
/**
 * Google Authenticator Two Factor Authentication
 *
 * @author Daniel Popp dan@danpopp.net
 */
class auth_plugin_authgoogle extends auth_plugin_authplain  {
    function __construct() {
        parent::__construct();
    }
    function __destruct() {
        //parent::__destruct();
    }
    function checkPass($user,$pass) {
        $secret = $this->getConf("google_secret");
        define('GOOGLE_AUTH_SECRET', $secret);
        $tslack = $this->getConf("timeout_slack");
        $enable = $this->getConf("use2fa_verify");
        $twofactor = true;
        if(!defined('GOOGLE_AUTH_SECRET')) $twofactor=false;
        if($enable==0) $twofactor=false;
        if($twofactor==true) {
            if (isset($_POST['p'])) {
                $ga = new PHPGangsta_GoogleAuthenticator();
                $twofa = $_POST['t'];
                $checkResult = $ga->verifyCode($secret, $twofa, $tslack);
            }
            else {
                $checkResult = false;
            }
            if ($checkResult != true) {
                return false;
            }
        }
        return parent::checkPass($user,$pass);
    }
}
?>