<?php
/////////////////////////////////// VARIABLES ///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

$Url             = 'http://localhost:8000';         // Base URL (no trailing Slash!)
$UrlCodeLength   = 5;                               // Length of unique URL-Code
$requireAuth     = false;                           // Enable or disable Password Auth for Admin Panel
$dbPath          = "./db.sqlite3";                  // Name of DB Database
$tableName       = "PHPspy";                        // DB Table Name
$timeZone        = "Europe/Berlin";                 // TimeZone
$username        = "admin";                         // Please change!
$password        = "admin";                         // Please change!

////////////////////////////////// DANGER ZONE //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

$appVersion      = "1.0";
$localTimeZone   = date_default_timezone_set($timeZone);