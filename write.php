<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
if(!$_SESSION['UID']){
    echo "<script>alert('회원 전용 게시판입니다.');history.back();</script>";
    exit;
}
$bid=$_GET["bid"];//get으로 넘겼으니 get으로 받는다.

if($bid){//bid가 있다는건 수정이라는 의미다.
    $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();
    if($rs->userid!=$_SESSION['UID']){
        echo "<script>alert('본인 글이 아니면 수정할 수 없습니다.');history.back();</script>";
        exit;
    }
}
?>
<form method="post" action="write_ok.php">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">제목</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="제목을 입력하세요.">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">내용</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">등록</button>
</form>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/project_nextLv/inc/footer.php";
?>
//깃 연결 확인인