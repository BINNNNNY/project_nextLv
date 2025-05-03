<?php include "header.php"; ?>
<?php
$con = mysqli_connect("localhost", "root", "", "sample");
$sql = "SELECT * FROM member_lab WHERE student_id='$userid';";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_array($res);

$pass = $row["pass"];
$name = $row["name"];
$email = $row["email"];
$birthdate = $row["birthdate"];
$regist_day = $row["regist_day"];
?>

<section>
  <div class="container py-4">
    <h1 class="display-4 fw-bold">회원정보 수정</h1>

    <form name="member_form" action="./member_update.php" method="post">
      <div class="form-group row py-2">
        <label class="col-md-3">아이디:</label>
        <div class="col-md-6">
          <input type="text" name="student_id" class="form-control" value="<?=$userid?>" readonly/>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">이름:</label>
        <div class="col-md-6">
          <input type="text" name="name" class="form-control" value="<?=$name?>" required/>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">비밀번호:</label>
        <div class="col-md-6">
          <input type="password" name="pass" class="form-control" value="<?=$pass?>" required/>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">이메일:</label>
        <div class="col-md-6">
          <input type="text" name="email" class="form-control" value="<?=$email?>" required/>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">생년월일:</label>
        <div class="col-md-6">
          <input type="date" name="birthdate" class="form-control" value="<?=$birthdate?>" required/>
        </div>
      </div>

      <div class="form-group row py-2">
        <label class="col-md-3">가입일:</label>
        <div class="col-md-6">
          <input type="text" name="date" class="form-control" value="<?=$regist_day?>" readonly/>
        </div>
      </div>

      <div class="form-group row py-3">
        <label class="col-md-3"></label>
        <div class="col-md-6">
          <input type="submit" class="btn btn-primary" value="회원정보 수정하기"/>
        </div>
      </div>
    </form>
  </div>
</section>

<?php include "footer.php"; ?>
