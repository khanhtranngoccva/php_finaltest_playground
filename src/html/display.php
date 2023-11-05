<?php
require_once __DIR__ . "/../../vendor/autoload.php";
$logger=new \Admin\PhpFinaltestPlayground\Plugins\Logger("metrics");

$conn = mysqli_connect("database", "root", "root", "metrics");
if (!$conn) {
    $logger->error("Connection failure" . mysqli_connect_error());
    die(500);
}

$result = $conn->execute_query("SELECT * FROM `primary_metrics` LIMIT 1")->fetch_assoc();

$tp = floatval($result["tp"]);
$tn = floatval($result["tn"]);
$fn = floatval($result["fn"]);
$fp = floatval($result["fp"]);


$precision = $tp / ($tp + $fp);
$recall = $tp / ($tp + $fn);
$accuracy = ($tn + $tp) / ($tn + $fp + $tp + $fn);
$f1 = ($precision * $recall) / ($precision + $recall) * 2;

echo "<p>Precision: $precision</p>";
echo "<p>Recall: $recall</p>";
echo "<p>Accuracy: $accuracy</p>";
echo "<p>F1 Score: $f1</p>";



