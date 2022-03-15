<!DOCTYPE html>
<html lang=en>
<title>Error 404 (Not Found)!</title>

<head>
    <meta charset=utf-8>
    <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="./css/google.css">
    <meta http-equiv="refresh" content="0;url=../admin/index.php">
    <title>Redirect ...</title>
    <style>

    </style>
</head>

<body>

    <?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="./index.php">Go back</a>';
?>

</body>

</html>