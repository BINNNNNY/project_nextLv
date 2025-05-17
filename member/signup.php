<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php"; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
  <div class="card p-4 shadow-sm" style="width: 100%; max-width: 480px;">
    <h4 class="text-center mb-4 fw-bold">회원가입</h4>

    <form method="post" action="signup_ok.php" id="signupForm" onsubmit="return validateForm();">
      <div class="mb-3">
        <label class="form-label">이름</label>
        <input type="text" name="name" id="name" class="form-control">
        <div class="form-text text-danger d-none" id="nameError">이름을 입력해주세요.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">아이디</label>
        <input type="email" name="user_id" id="user_id" class="form-control">
        <div class="form-text text-danger d-none" id="idError">아이디를 입력해주세요.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">비밀번호</label>
        <input type="password" name="password" id="password" class="form-control">
        <div class="form-text text-danger d-none" id="pwError">비밀번호를 입력해주세요.</div>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-primary">회원가입</button>
      </div>

      <div class="text-center">
        <span class="small">이미 회원이신가요?</span>
        <a href="/project_nextLv/member/login.php" class="small fw-bold">로그인</a>
      </div>
    </form>
  </div>
</div>

<script>
function validateForm() {
  let isValid = true;

  const name = document.getElementById("name");
  const user_id = document.getElementById("user_id");
  const pw = document.getElementById("password");

  // 초기화
  document.querySelectorAll('.form-text.text-danger').forEach(el => el.classList.add('d-none'));

  if (name.value.trim() === '') {
    document.getElementById("nameError").classList.remove("d-none");
    isValid = false;
  }

  if (user_id.value.trim() === '') {
    document.getElementById("idError").classList.remove("d-none");
    isValid = false;
  }

  if (pw.value.trim() === '') {
    document.getElementById("pwError").classList.remove("d-none");
    isValid = false;
  }

  return isValid;
}
</script>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>