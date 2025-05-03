<?php
  $con = mysqli_connect("localhost", "root", "", "sample");
  if ($conn->connect_errno) {
    printf("DB 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.");
    exit();
  }
  mysqli_set_charset($conn, "utf8");
?>
