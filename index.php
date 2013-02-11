<?php 
/*
 * Copyright (c) 2010-2012 Netkick s.r.o. All rights reserved.
 */
 
version_compare(PHP_VERSION, '5.3', '<') and exit('SUPERCART requires PHP 5.3 or newer.');

error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE);

ini_set('display_errors', true);

$pathinfo = pathinfo(__FILE__);
$dirname = $pathinfo['dirname'];

define('SQC', true);

define('SC', true);
define('DOCROOT', $dirname.'/');
define('APPDIR', 'core');
define('APPROOT', DOCROOT.APPDIR.'/');

require DOCROOT.APPDIR.'/bootstrap.php';

// display errors and exceptions
Core::$debug = ($_SERVER['HTTP_HOST'] == 'localhost');

// display profiler at the bottom
Core::$profiler = false;

Core::setup();