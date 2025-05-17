<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/dbcon.php";

$user_id = $_GET['user_id'] ?? '';

if (!$user_id) {
  echo "invalid";
  exit;
}

$stmt = $mysqli->prepare("SELECT user_id FROM users WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$res = $stmt->get_result();

echo $res->num_rows > 0 ? "taken" : "available";