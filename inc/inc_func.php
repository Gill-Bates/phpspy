<?php

// GENERATE VERSION NUMBER
function showVersion($versionNumber)
{
    echo "[SpyPHP $versionNumber]";
}

// GENERATE RANDOM STRING
function generateRandomString($Url, $UrlCodeLength)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $UrlCodeLength; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// DATABASE CONNECTION
function connectSQLite3($dbPath, $tableName)
{
    if (!file_exists($dbPath)) {
        $conn = new SQLite3($dbPath);
    }

    $conn = new PDO("sqlite:" . $dbPath);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE TABLE IF NOT EXISTS $tableName (
        Id INTEGER,
        UrlId TEXT,
        Timestamp TEXT,
        IP TEXT,
        ISP TEXT,
        Country TEXT,
        City TEXT,
        Language TEXT,
        Browser TEXT,
        Resolution TEXT,
        OS TEXT,
        Device TEXT,
        PRIMARY KEY('Id' AUTOINCREMENT)
        )";
    $conn->exec($query);
}

// GET IP ADDRESS OF CLIENT
function getIpAddress()
{

    // Get IP-address of Client
    //$ipaddr = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

    // Get IP-Details
    // $ipinfo = json_decode(file_get_contents("https://ipinfo.io/{$ipaddr}"));
    // $ipcountry = $ipinfo->country;
    // $ipcity = $ipinfo->city;
    // $ipgeo = "$ipcountry ($ipcity)";
    // $iphost = $ipinfo->hostname;
    // $iporg = $ipinfo->org;
    // $ipprovider = "$iphost, ASN: $iporg";

    return $_SERVER['REMOTE_ADDR'];
}
