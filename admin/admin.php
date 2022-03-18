<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    require('./admin/config.php');

    if(!isset($_SESSION['login'])) {
        header('LOCATION:./index.php'); die();
    }

    // CONNECT TO DB
    connectSQLite3($dbPath, $tableName);
    
    // Build URL
    $UrlId = "image" . generateRandomString($UrlCodeLength) .  ".png";
    $accessUrl = $Url . "?file=" . $UrlId;

    // Store URl in Databaser
    storeUrlRecord($dbPath, $UrlId, $tableName);
?>

<!DOCTYPE html>
<html lang=en>

<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <title>PHPSpy <?php echo $appVersion; ?> | Admin-Center</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<script type="text/javascript" src="../js/admin.js"></script>

    <table class="form">
        <tr>
            <td>
                <img src="../assets/phpspy_logo.png" alt="PHPSPY" class="logo">
            </td>
        </tr>
        <tr>
            <td>
                <h1 class="text-center">Welcome, Admin!</h1>
                Your unique Link to the Fake-Image to share:
                <br />
                <input type="text" value="<?php echo "$accessUrl"; ?>" class="url">            
            </td>
        </tr>
    </table>
    <a href="./logout.php">Logout</a>
    <?php include('../inc/inc_footer.php'); ?>
</body>
</html>

<?php
exit();
// END OF SCRIPT
?>