<?php
$hostname = "localhost";
$dbuserid = "root";
$dbpasswd = "";
$dbname = "rental_fraud_db";  // ✅ 반드시 이 이름으로 설정

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
if ($mysqli->connect_errno) {
    die("DB 연결 실패: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");

?>