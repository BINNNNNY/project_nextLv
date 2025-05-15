<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/dbcon.php";
session_start();

$userId = $_POST['userId'];
$passwd = hash('sha512', $_POST['passwd']);

$query = "SELECT * FROM users WHERE user_id=? AND password=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $userId, $passwd);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['UID'] = $user['user_id'];
    $_SESSION['UNAME'] = $user['name'];
    $_SESSION['ROLE'] = $user['role'];
    echo "<script>location.href='/project_nextLv/index.php';</script>";
} else {
    echo "<script>alert('아이디 또는 비밀번호가 잘못되었습니다.'); history.back();</script>";
}
?>