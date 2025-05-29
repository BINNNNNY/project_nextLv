<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php"; ?>
<?php require_once 'config.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
    <h4 class="text-center mb-4 fw-bold">전세사기 커뮤니티</h4>

    <form method="post" action="login_ok.php">
      <div class="mb-3">
        <label class="form-label">아이디</label>
        <input type="text" name="userId" class="form-control" placeholder="아이디를 입력하세요" required>
      </div>
      <div class="mb-3">
        <label class="form-label">비밀번호</label>
        <input type="password" name="passwd" class="form-control" placeholder="비밀번호를 입력하세요" required>
      </div>
      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">로그인</button>
      </div>
    </form>

    <div class="text-center mb-2 small">
      <a href="#" class="me-2">계정찾기</a> | <a href="/project_nextLv/member/signup.php" class="ms-2">회원가입</a>
    </div>

    <hr>
    <div class="text-center mb-3 text-muted">or</div>

    <div class="d-grid gap-2">
      <a href="<?php echo $google_auth_url; ?>">
        <button class="btn btn-outline-dark social-login-btn">
          <img src="https://www.google.com/favicon.ico" alt="구글 로고"> Google로 로그인하기
        </button>
      </a>
      <a href="<?php echo $naver_auth_url; ?>">
        <button class="btn btn-outline-dark social-login-btn">
          <img src="https://www.naver.com/favicon.ico" alt="네이버 로고"> 네이버로 로그인하기
        </button>
      </a>
    </div>

    <div class="text-center text-muted mt-4 small">
      계속을 클릭하면 <a href="#">서비스 약관</a> 및 <a href="#">개인정보 보호정책</a>에 동의하게 됩니다.
    </div>
  </div>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>

<style>
.social-login-btn {
    width: 300px !important;
    margin: 0 auto;
    display: flex !important;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
.social-login-btn img {
    width: 18px;
    height: 18px;
}
</style>