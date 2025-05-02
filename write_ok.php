<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
if(!$_SESSION['UID']){
    echo "<script>alert('회원 전용 게시판입니다.');location.href='/project_nextLv/index.php';</script>";
    exit;
}

$title=$_POST["title"];
$content=$_POST["content"];
$bid=$_POST["bid"];
$userId=$_SESSION['UID'];
$status=1;

if($bid){//bid값이 있으면 수정이고 아니면 등록이다.
    $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();

    if($rs->userId!=$_SESSION['UID']){
        echo "<script>alert('본인 글이 아니면 수정할 수 없습니다.');location.href='/project_nextLv/index.php';</script>";
        exit;
    }
    $sql="update board set title='".$title."', content='".$content."' where bid=".$bid;//수정하기
}else{
    $sql="insert into board (userId,title,content) values ('".$userId."','".$title."','".$content."')";//등록하기
}
$result=$mysqli->query($sql) or die($mysqli->error);

if($result){
    echo "<script>location.href='/project_nextLv/index.php';</script>";
    exit;
}else{
    echo "<script>alert('글등록에 실패했습니다.');history.back();</script>";
    exit;
}
?>