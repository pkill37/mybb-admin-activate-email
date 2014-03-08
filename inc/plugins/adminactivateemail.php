<?php
/**
 * Admin Activate Email 1.0
 * Copyright 2011 Fábio Maia, All Rights Reserved
 */
 
// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

$plugins->add_hook("admin_user_users_coppa_activate_commit", "adminactivateemail_run");

function adminactivateemail_info()
{
	return array(
		"name"			=> "Admin Activate Email",
		"description"	=> "A plugin which emails users after being activated by the administrator.",
		"website"		=> "http://mybb.com",
		"author"		=> "F&#225;bio Maia",
		"authorsite"	=> "http://community.mybb.com/user-16693.html",
		"version"		=> "1.0",
		"guid" 			=> "0ba023d1cd47865867778b73940c0bf7",
		"compatibility" => "14*,16*"
	);
}

function adminactivateemail_run()
{
	global $mybb, $lang, $user;
	
	$lang->load("adminactivateemail");
	
	$adminactivateemail_subject = $lang->sprintf($lang->adminactivateemail_subject, $mybb->settings['bbname']);
	$adminactivateemail_message = $lang->sprintf($lang->adminactivateemail_message, $mybb->user['username'], $mybb->settings['bbname'], $mybb->settings['bburl'], $mybb->settings['bbname']);
	
	my_mail($user['email'], $adminactivateemail_subject, $adminactivateemail_message);
}
?>
