<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
?>
<form method="post" action="login_ok.php" class="p-3">
  <div class="mb-3">
    <label for="userId" class="form-label">아이디</label>
    <input type="text" class="form-control" name="userId" id="userId" required>
  </div>
  <div class="mb-3">
    <label for="passwd" class="form-label">비밀번호</label>
    <input type="password" class="form-control" name="passwd" id="passwd" required>
  </div>
  <div class="text-end">
    <button type="submit" class="btn btn-primary">로그인</button>
  </div>
</form>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>