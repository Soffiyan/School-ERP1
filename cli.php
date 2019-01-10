#!/usr/local/bin/php
<?php

/* override normal limitations */
set_time_limit(0);
ini_set('memory_limit', '256M');

/* deny direct call from web browser */
if (isset($_SERVER['REMOTE_ADDR'])) die('Permission denied.');

/* constants */
define('CMD', 1);

/* manually set the URI path based on command line arguments... */
unset($argv[0]); /* except the first one */
$_SERVER['QUERY_STRING'] =  $_SERVER['PATH_INFO'] = $_SERVER['REQUEST_URI'] = '/' . implode('/', $argv) . '/';