Description
===========
DokuWiki Auth Plugin to work with Google Authenticator App.

Using this plugin you can authenticate the dokuwiki users gainst Google Authenticator.
The users themselves and their access rights are still managed within dokuwiki.

Then activate the plugin.
Configure necessary plugin settings like:

 * Your Google Authenticator Secret
 * The URL to your Google Authenticator QR Code
 * Whether to Enable Two-Factor Authentication...

...and select the plugin as active plugin.

Now you can login with the tokens from Google Authenticator for all users.

Troubleshooting
===============

You can revert to the originial auth plugin by editing the file conf/local.php:

   $conf['authtype'] = 'authplain';