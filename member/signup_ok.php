<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";

$userId = $_POST["userId"];
$userName = $_POST["userName"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];
$passwd = hash('sha512', $passwd);

$sql = "INSERT INTO member
        (userId, email, userName, passwd)
        VALUES('" . $userId . "', '" . $email . "', '" . $userName . "', '" . $passwd . "')";
$result = $mysqli->query($sql) or die($mysqli->error);

if ($result) {
    echo "<script>alert('가입을 환영합니다.');location.href='project_nextLv/index.php';</script>";
    exit;
} else {
    echo "<script>alert('회원가입에 실패했습니다.');history.back();</script>";
    exit;
}
?>