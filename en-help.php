<?php if(!defined('PLX_ROOT')) exit; ?>

<H2> Help </ h2>

Traduction with Google. Sorry is non good. ;)

The plugin-automatic plux principle is to copy an archive in a directory named "sites" which is at the root of your website (not your hoster). <br /> <br />

With the plugin, you give a name to your test sites (always a single word), can remove when you no longer need and even purge the entire directory "sites" with a single click. Everything else is done alone. ;) <br /> <br />

<Strong> Known issue troubleshooting</ strong> <br /> <br />

-> The refresh of the site creation page (creation.php) causes the installation of a new Pluxml in the Sites folder, but it does not matter at all if you can see its directories in administration <strong> Pluxautomatic </ strong> in <strong> "below, the list of sites created" </ strong>. <br />

They will be deleted the next purge this directory.

<P> -> For safety, it is advantageous to rename some files </ p>

For example, purging the folder "Sites" is done through the file "vider.php" to the root of your Pluxml and anyone knowing that you are using this plugin can bleed for you. <br />
The combined (while waiting to find better) is to rename this file but also consider changing /plugins/pluxautomatic/admin.php line ...

<P> vider.php ../../ "target = _blank> PURGE! </a> </ P>


<Strong> The file manager. </ Strong>

For security reasons, the file manager will ask you for identification at each session to avoid the crafty manage your test sites for you.<br /><br />

The login and default password is "Testov" and "Testov"<br /><br />

You can change these IDs and various settings manager by editing the file /sites/index-ex.php and replacing these values to the line 163 that tells ...<br /><br />

// _ $ CONFIG ['users'] = array ();
$ _config ['Users'] = array (array ( "Testov", "Testov", "admin"));<br /><br />

At line 240, you can enter your own @mail to receive notification when a file is downloaded to your website.<br /><br />

$ _config [ 'Upload_email'] = "paloque.jack@gmail.com";<br /><br />

The rest of the file manager is already configured but you can watch the opportunities it offers and not all activated.<br />

<P> I wish you a very good testing and good luck. :) </ P>





