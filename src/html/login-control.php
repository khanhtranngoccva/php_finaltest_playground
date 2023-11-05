<?php

require_once __DIR__ . "/../../vendor/autoload.php";

$username = $_POST["username"];
$password = $_POST["password"];
$logger = new \Admin\PhpFinaltestPlayground\Plugins\Logger("main");

$conn = mysqli_connect("database", "root", "root", "final_exam_db");
if (!$conn) {
    echo ("Error: " . mysqli_connect_error());
    die();
}

$login_res = $conn->execute_query("SELECT * FROM account WHERE username = ? AND password = ?", [
    $username,
    $password,
])->fetch_assoc();

$logger->info($login_res);

if (!$login_res) {
    header("Location: /exercise2.html");
    die();
}

$accountId = $login_res["accountID"];
$photos = $conn->execute_query("SELECT `photo`.`photoID` as `photoID`, `data` FROM `photo` INNER JOIN `account_photo` ON `account_photo`.`photoID` = `photo`.`photoID` WHERE `account_photo`.`accountID` = ?;", [
    intval($accountId),
])->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/exercise4.css">
    <title>Gallery</title>
</head>
<body>
<section class="grid">
    <?php
        foreach ($photos as $photo) {
            $logger->info($photo);
            $data = $photo["data"];
            echo "<img class='photo' src='$data' alt=''/>";
        }
    ?>
</section>
</body>
</html>
