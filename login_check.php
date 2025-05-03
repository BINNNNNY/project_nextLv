<?php
$student_id = trim($_POST["student_id"]);
$pass = $_POST["pass"];

$con = mysqli_connect("localhost", "root", "", "sample");

$sql = "SELECT * FROM member_lab WHERE student_id='$student_id'";
$res = mysqli_query($con, $sql);
$num = mysqli_num_rows($res);

if (!$num) {
  echo "<script>
          alert('아이디가 존재하지 않습니다.');
          history.go(-1);
        </script>";
  exit;
}

$row = mysqli_fetch_array($res);
$db_pass = $row["pass"];
mysqli_close($con);

if ($pass != $db_pass) {
  echo "<script>
          alert('비밀번호가 틀립니다.');
          history.go(-1);
        </script>";
} else {
  session_start();
  $_SESSION["userid"] = $row["student_id"];
  $_SESSION["username"] = $row["name"];
  echo "<script> location.href='index.php'; </script>";
}
?>
