<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
?>

<h3 class="mb-4">📝 회원가입</h3>

<form class="row g-3 needs-validation" method="post" action="signup_ok.php" onsubmit="return validateForm();">
  <div class="col-12">
    <label for="userId" class="form-label">아이디</label>
    <div class="input-group">
      <input type="text" class="form-control" id="userId" name="userId" required>
      <button type="button" class="btn btn-outline-primary" onclick="checkDuplicate()">중복확인</button>
    </div>
    <div id="idCheckResult" class="form-text"></div>
  </div>

  <div class="col-12">
    <label for="userName" class="form-label">이름</label>
    <input type="text" class="form-control" id="userName" name="userName" required>
  </div>

  <div class="col-12">
    <label for="passwd" class="form-label">비밀번호</label>
    <input type="password" class="form-control" id="passwd" name="passwd" required>
  </div>

  <div class="col-12">
    <label for="email" class="form-label">이메일</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <div class="col-12 text-end">
    <button class="btn btn-primary" type="submit">가입하기</button>
  </div>
</form>

<script>
let idChecked = false;

function checkDuplicate() {
  const userId = document.getElementById("userId").value;
  if (!userId) {
    alert("아이디를 입력하세요.");
    return;
  }

  fetch(`/project_nextLv/member/check_userid.php?userId=${encodeURIComponent(userId)}`)
    .then(res => res.text())
    .then(result => {
      const resultDiv = document.getElementById("idCheckResult");
      if (result.trim() === "available") {
        resultDiv.innerText = "사용 가능한 아이디입니다.";
        resultDiv.style.color = "green";
        idChecked = true;
      } else {
        resultDiv.innerText = "이미 사용 중인 아이디입니다.";
        resultDiv.style.color = "red";
        idChecked = false;
      }
    });
}

function validateForm() {
  if (!idChecked) {
    alert("아이디 중복 확인을 해주세요.");
    return false;
  }
  return true;
}
</script>

<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php";
?>