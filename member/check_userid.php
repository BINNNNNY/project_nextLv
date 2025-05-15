<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/dbcon.php";
$userId = $_GET['userId'] ?? '';

if (!$userId) {
  echo "invalid";
  exit;
}

$result = $mysqli->query("SELECT * FROM users WHERE user_id = '$userId'");
echo $result->num_rows > 0 ? "taken" : "available";
?>