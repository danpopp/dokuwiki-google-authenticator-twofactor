Description
===========
DokuWiki authentication plugin to implement Google Authenticator 2FA.

Using this plugin you can authenticate DokuWiki users against Google Authenticator 2FA. \\
The users themselves and their access rights are still managed within DokuWiki.

To get setup, activate the plugin and configure the required settings:

 * Your Google Authenticator secret.
 * The timeout slack, default is 2 ( 2*30 seconds = 60 seconds ).
 * Whether you want to enable two-factor authentication or not...
 * The URL to your Google Authenticator QR code image (optional).

Troubleshooting
===============

You can revert to the originial auth plugin by editing the file conf/local.php:

   $conf['authtype'] = 'authplain';
