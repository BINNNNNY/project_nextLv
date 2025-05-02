<?php session_start();
include $_SERVER["DOCUMENT_ROOT"]."/project_nextLv/inc/dbcon.php";

$userId=$_POST["userId"];
$passwd=$_POST["passwd"];
$passwd=hash('sha512',$passwd);

$query = "select * from member where userId='".$userId."' and passwd='".$passwd."'";
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();

if($rs){
    $_SESSION['UID']= $rs->userId;//세션에 아이디값을 입력
    $_SESSION['UNAME']= $rs->userName;//세션에 사용자 이름을 입력
    echo "<script>alert('어서오십시오.');location.href='/project_nextLv/index.php';</script>";
    exit;
}else{
    echo "<script>alert('아이디나 암호가 틀렸습니다. 다시한번 확인해주십시오.');history.back();</script>";
    exit;
}

?>