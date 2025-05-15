<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/dbcon.php";

$userId = $_POST["userId"];
$userName = $_POST["userName"];
$email = $_POST["email"];
$passwd = hash('sha512', $_POST["passwd"]);

$sql = "INSERT INTO users (user_id, name, password, email, birth_date, role)
        VALUES (?, ?, ?, ?, CURDATE(), 'user')";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $userId, $userName, $passwd, $email);
$result = $stmt->execute();

if ($result) {
    echo "<script>alert('가입을 환영합니다.'); location.href='/project_nextLv/index.php';</script>";
} else {
    echo "<script>alert('회원가입에 실패했습니다.'); history.back();</script>";
}
?>