<?php
$student_id = $_POST["student_id"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email = $_POST["email"];
$birthdate = $_POST["birthdate"];

$con = mysqli_connect("localhost", "root", "", "sample");
$sql = "UPDATE member_lab 
        SET pass='$pass', name='$name', email='$email', birthdate='$birthdate' 
        WHERE student_id='$student_id'";
mysqli_query($con, $sql);
mysqli_close($con);

session_start();
$_SESSION["username"] = $name;

echo "<script>location.href='index.php';</script>";
?>
