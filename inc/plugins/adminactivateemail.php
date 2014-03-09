<?php

if(!defined('IN_MYBB')) {
    die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}

function adminactivateemail_info()
{
    return array(
        'name'          => 'Admin Activate Email',
        'description'   => 'A MyBB plugin which emails users after being activated by the administrator.',
        'website'       => 'https://github.com/faviouz/mybb-admin-activate-email',
        'author'        => 'F&#225;bio Maia',
        'authorsite'    => 'https://github.com/faviouz',
        'version'       => '1.0.1',
        'guid'          => '0ba023d1cd47865867778b73940c0bf7',
        'compatibility' => '14*, 16*'
    );
}

$plugins->add_hook('admin_user_users_coppa_activate_commit', 'adminactivateemail_run');

function adminactivateemail_run()
{
    global $mybb, $lang, $user;

    $lang->load('adminactivateemail');

    $subject = $lang->sprintf(
        $lang->adminactivateemail_subject,
        $mybb->settings['bbname']
    );

    $message = $lang->sprintf(
        $lang->adminactivateemail_message,
        $user['username'],
        $mybb->settings['bbname'],
        $mybb->settings['bburl'],
        $mybb->settings['bbname']
    );

    my_mail($user['email'], $subject, $message);
}
