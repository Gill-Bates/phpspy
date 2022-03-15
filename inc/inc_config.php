<?php
/////////////////////////////////// VARIABLES ///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

$Url             = 'http://localhost:8000';  // Base URL
$UrlCodeLength   = 15;                       // Length of unique URL-Code
$requireAuth     = false;                    // Enable or disable Password Auth for Admin Panel
$tableName       = "SpyPHP";                 // DB Table Name
$baitTarget      = "./file.png";             // Filename to the delivered Bait
$timeZone        = "Europe/Berlin";          // TimeZone
$username        = "admin";
$password        = "admin";

////////////////////////////////// DANGER ZONE //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

$appVersion      = "1.0";
$localTimeZone   = date_default_timezone_set($timeZone);
$dbPath          = __DIR__ . "db.sqlite3";   // Path to SQllight Database