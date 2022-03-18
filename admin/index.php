<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require('../admin/config.php');

echo isset($_SESSION['login']);
if (isset($_SESSION['login'])) {
    header('LOCATION:./admin.php');
    die();
}
?>

<!DOCTYPE html>
<html lang=en>

<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <title>PHPSpy
        <?php echo $appVersion; ?> | Admin-Login
    </title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <table class="form">
        <tr>
            <td>
                <img src="../assets/phpspy_logo.png" alt="PHPSPY" class="logo">

            </td>
        </tr>
        <tr>
            <td>
                <h1 class="text-center">Please Login first</h1>
                <?php
                if (isset($_POST['submit'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    if ($user === $username && $pass === $password) {
                        $_SESSION['login'] = true;
                        header('LOCATION:./admin.php');
                        die();
                    } {
                        echo "<div class=\"alert\">Username and Password did not match!</div>";
                    }
                }
                ?>
                <form action="" method="post">

                    <input type="text" name="user" placeholder="Username" required>
                    <br />
                    <input type="password" name="pass" placeholder="Password" required>
                    <br />
                    <button type="submit" name="submit" class="button">Login</button>
                </form>
            </td>
        </tr>
    </table>

    <?php include('../inc/inc_footer.php'); ?>
</body>

</html>