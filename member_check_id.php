<?php
$student_id = $_GET["student_id"];

if (!$student_id) {
  echo "<p><font color='red'>학번을 입력하세요.</font></p>";
} else {
  $con = mysqli_connect("localhost", "root", "", "sample");
  $sql = "SELECT * FROM member_lab WHERE student_id='$student_id'";
  $res = mysqli_query($con, $sql);
  $num = mysqli_num_rows($res);

  if ($num) {
    echo "<p><font color='red'>$student_id 는 이미 사용 중입니다.</font></p>";
  } else {
    echo "<p><font color='blue'>$student_id 는 사용 가능합니다.</font></p>";
  }
  mysqli_close($con);
}
?>
