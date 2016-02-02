<?php
// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();
/**
 * Google Authenticator Two Factor Form Action Plugin
 *
 * @author Daniel Popp dan@danpopp.net
 */
class action_plugin_authgoogle2fa extends DokuWiki_Action_Plugin {
    /**
     * Registers the event handlers.
     */
    function register(Doku_Event_Handler $controller)
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
        $twofa_form = "<label class=\"block\"><span>".$this->getLang('google_2fa')." </span><input type='password' name='t' class='edit'/></label><br/>";
        $empty="";
        $pos = $event->data->findElementByAttribute('type', 'submit');
        $event->data->replaceElement($pos-1, $twofa_form);
    }
}
?>
