<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>로그인</title>
  <link rel="stylesheet" href="./css/loginForm.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/headers.css">
  <link rel="stylesheet" href="./css/footers.css">
  <script src="./js/jquery.min.js"></script>
  <script>
    function check_input() {
      const form = document.login_form;
      if (!form.student_id.value.trim()) {
        alert("아이디를 입력하세요.");
        form.student_id.focus();
        return;
      }
      if (!form.pass.value.trim()) {
        alert("비밀번호를 입력하세요.");
        form.pass.focus();
        return;
      }
      form.submit();
    }
  </script>
</head>
<body>
  <?php include "header.php"; ?>
  <section>
    <div class="container py-3">
      <div class="p-3 mb-4 bg-light rounded-3">
        <div class="container-fluid py-1">
          <h1 class="display-4 fw-bold">
            &nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56..."/>
            </svg>
            &nbsp;&nbsp;Login
          </h1>
        </div>
      </div>

      <div class="container login-container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 login-form-1">
            <h3>로그인을 해주세요.</h3>
            <form class="form-signin" name="login_form" action="./login_check.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="*아이디" name="student_id" required />
              </div>
              <div class="form-group py-3">
                <input type="password" class="form-control" placeholder="*비밀번호" name="pass" required />
              </div>
              <div class="form-group py-1">
                <input type="button" class="form-control btn btn-primary" value="로그인" onclick="check_input()" />
              </div>
              <div class="form-group">
                <input type="button" class="form-control btn btn-secondary" value="회원가입" onclick="location.href='member_join.php';" />
              </div><br>
              <div class="form-group">
                <h5 class="ForgetPwd">아이디와 비밀번호를 모르시나요?</h5>
                <p>*관리자에게 문의 바랍니다.<br>*문의: 000-1111-2222</p>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </section>
  <?php include "footer.php"; ?>
</body>
</html>
