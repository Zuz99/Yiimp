<?php

// Use absolute paths (based on this file's directory) for includes.
// YiiMP console entrypoints often run with a different current working directory.
require_once(__DIR__.'/url.php');
require_once(__DIR__."/curloauth.php");
require_once(__DIR__."/yaamp.php");
require_once(__DIR__."/memcache.php");
require_once(__DIR__.'/settings.php');
require_once(__DIR__.'/admin.php');
require_once(__DIR__.'/cHTTP.php');

require_once(__DIR__."/phpmailer/phpmailer/src/PHPMailer.php");
require_once(__DIR__."/phpmailer/phpmailer/src/SMTP.php");

