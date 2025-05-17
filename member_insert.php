<?php
$student_id = $_POST["student_id"];  // 이제 id는 없고 student_id만 사용
$pass = $_POST["pass"];
$name = $_POST["name"];
$email = $_POST["email"];
$birthdate = $_POST["birthdate"];

$seoul = getdate(mktime(gmdate("G")+9, gmdate("i"), gmdate("s"),
                        gmdate("m"), gmdate("d"), gmdate("Y")));
$regist_day = $seoul['year']."-".$seoul['mon']."-".$seoul['mday']." ".
              $seoul['hours'].":".$seoul['minutes'].":".$seoul['seconds'];

$con = mysqli_connect("localhost", "root", "", "sample");
$sql = "INSERT INTO member_lab (student_id, pass, name, email, birthdate, regist_day)
        VALUES ('$student_id', '$pass', '$name', '$email', '$birthdate', '$regist_day')";
mysqli_query($con, $sql);
mysqli_close($con);

echo "<script> location.href ='../member/login.php'; </script>";
?>
