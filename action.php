<?php
// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();
/**
 * Google Authenticator Two Factor Form Action Plugin
 *
 * @author Daniel Popp dan@danpopp.net
 */
class action_plugin_authgoogle extends DokuWiki_Action_Plugin {
    /**
     * Registers the event handlers.
     */
    function register(&$controller)
    {
        $enable = $this->getConf("use2fa_verify");
        if($enable===1) {
            $controller->register_hook('HTML_LOGINFORM_OUTPUT', 'BEFORE', $this, 'two_fa_login_form', array());
        }
    }
    /**
     * Handles the login form rendering.
     */
    function two_fa_login_form(&$event, $param) {
        $twofa_form = "<div><b>".$this->getLang('google_2fa')." </b></div><input type='password' name='t'/><br/><br/>";
        $empty="";
        $pos = $event->data->findElementByAttribute('type', 'submit');
        $event->data->replaceElement($pos-1, $twofa_form);
    }
}
?>