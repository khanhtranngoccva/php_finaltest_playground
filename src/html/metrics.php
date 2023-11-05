<?php
require_once __DIR__ . "/../../vendor/autoload.php";

function parse_number(mixed $num): float {
    return floatval($num);
}

$logger=new \Admin\PhpFinaltestPlayground\Plugins\Logger("metrics");

$conn = mysqli_connect("database", "root", "root", "metrics");
if (!$conn) {
    $logger->error("Connection failure" . mysqli_connect_error());
    die(500);
}

$conn->query("CREATE TABLE IF NOT EXISTS `primary_metrics` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tp DOUBLE,
    fn DOUBLE,
    fp DOUBLE,
    tn DOUBLE
)");

$conn->execute_query("INSERT INTO primary_metrics (
    tp, fn, fp, tn
) VALUES (?, ?, ?, ?)", [
    parse_number($_POST["tp"]),
    parse_number($_POST["fn"]),
    parse_number($_POST["fp"]),
    parse_number($_POST["tn"]),
]);

header("Location: /exercise2.php");