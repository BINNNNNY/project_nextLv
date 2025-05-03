<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>회원가입</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery.min.js"></script>
  <script>
    function check_id() {
      const studentId = document.member_form.student_id.value;
      if (!studentId) {
        alert("학번을 입력하세요.");
        return;
      }
      window.open("member_check_id.php?student_id=" + studentId,
                  "IDcheck",
                  "left=200,top=200,width=400,height=200,scrollbars=no,resizable=yes");
    }

    function check_input() {
      const form = document.member_form;
      if (form.pass.value !== form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.");
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
  <div class="container py-4">
    <h1 class="display-4 fw-bold">회원가입</h1>
    <form name="member_form" action="./member_insert.php" method="post">
      <div class="form-group row py-2">
        <label class="col-md-3">(*) 아이디 :</label>
        <div class="col-md-5">
          <input type="text" name="student_id" class="form-control" placeholder="학번을 입력하세요." required>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-success" onclick="check_id()">중복 체크</button>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">(*) 이름 :</label>
        <div class="col-md-5">
          <input type="text" name="name" class="form-control" required>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">(*) 비밀번호 :</label>
        <div class="col-md-5">
          <input type="password" name="pass" class="form-control" required>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">(*) 비밀번호 확인 :</label>
        <div class="col-md-5">
          <input type="password" name="pass_confirm" class="form-control" required>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">(*) 이메일 :</label>
        <div class="col-md-5">
          <input type="email" name="email" class="form-control" required>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">(*) 생년월일 :</label>
        <div class="col-md-5">
          <input type="date" name="birthdate" class="form-control" required>
        </div>
      </div>

      <div class="form-group row py-3">
        <label class="col-md-3"></label>
        <div class="col-md-5 d-grid gap-2 col-2">
          <input type="button" class="btn btn-primary" value="회원가입 신청하기" onclick="check_input()">
          <input type="reset" class="btn btn-dark" value="초기화하기">
        </div>
      </div>
    </form>
  </div>
</section>
<?php include "footer.php"; ?>
</body>
</html>
