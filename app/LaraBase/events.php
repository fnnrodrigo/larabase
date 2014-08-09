<?php

// Log last login for User
Event::listen('auth.login', function($user)
{
    $user->last_login = new DateTime;
    $user->save();
});

// Log last activity for Authenticated user
Event::listen('last.activity', function($user)
{
    $user->last_activity = new DateTime;
    $user->save();
});

// Send notification email to Admin when a Post is created
Event::listen('report.created', function($data)
{
    Mail::send('emails.notifications.report_created', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'Admin')->subject('Notification - Report Created');
    });
});

// Send notification email to Admin when Feedback is submitted
Event::listen('feedback.submitted', function($data)
{
    Mail::send('emails.notifications.feedback', $data, function($message)
    {
        $message->to(Config::get('larabase.admin_email'), 'Admin')->subject('Notification - Feedback');
    });
});