<?php
    require("__DIR__ . ./admin/config.php");

// GENERATE VERSION NUMBER
function showVersion($versionNumber)
{
    echo "[SpyPHP $versionNumber]";
}

// GENERATE RANDOM STRING
function generateRandomString($UrlCodeLength)
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
    try {
        $conn = new PDO("sqlite:" . $dbPath);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Can't create Database! Check your permissions and try again!",  $e->getMessage(), "\n";
        die;
    }

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
    $conn = null; // Destroy PDO-Session
}

// RECORD CHECK
function checkForRecord($dbPath, $file)
{
    $conn = new PDO("sqlite:" . "./admin/$dbPath");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->query("SELECT UrlId FROM PHPspy WHERE UrlId LIKE '$file';");
    $max_row = $query->fetch(PDO::FETCH_ASSOC);
    return $max_row;
}

// CREATE RECORD
function storeUrlRecord($dbPath, $accessUrl, $tableName) {

    $conn = new PDO("sqlite:" . $dbPath);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO $tableName (UrlId) VALUES('$accessUrl');");
    $stmt->execute();
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
