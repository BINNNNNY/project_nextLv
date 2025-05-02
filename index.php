<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";

$result = $mysqli->query("select * from board") or die("query error => " . $mysqli->error);
while ($rs = $result->fetch_object()) {
	$rsc[] = $rs;
}
?>
<p style="text-align:right;">
	<?php
	if (isset($_SESSION['UID'])) { //세션값이 있는지 여부를 확인해서 로그인 했는지를 체크한다.
	?>
		<a href="/project_nextLv/write.php"><button type="button" class="btn btn-primary">등록</button><a>
		<a href="/project_nextLv/member/logout.php"><button type="button" class="btn btn-primary">로그아웃</button><a>
	<?php
	} else {
	?>
		<a href="/project_nextLv/member/login.php"><button type="button" class="btn btn-primary">로그인</button><a>
		<a href="/project_nextLv/member/signup.php"><button type="button" class="btn btn-primary">회원가입</button><a>
	<?php
	}
	?>
</p>
<table class="table">
	<thead>
		<tr>
			<th scope="col">번호</th>
			<th scope="col">글쓴이</th>
			<th scope="col">제목</th>
			<th scope="col">등록일</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach ($rsc ?? [] as $r) {
		?>
			<tr>
				<th scope="row"><?php echo $i++; ?></th>
				<td><?php echo $r->userId ?></td>
				<td><a href="/project_nextLv/view.php?bid=<?php echo $r->bid; ?>"><?php echo $r->title ?></a></td>
				<td><?php echo $r->date ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<p style="text-align:right;">

<?php
if($_SESSION['UID']){
?>
<a href="write.php"><button type="button" class="btn btn-primary">등록</button><a>
<a href="/member/logout.php"><button type="button" class="btn btn-primary">로그아웃</button><a>
<?php
}else{
?>
<a href="/member/login.php"><button type="button" class="btn btn-primary">로그인</button><a>
<a href="/member/signup.php"><button type="button" class="btn btn-primary">회원가입</button><a>
<?php
}
?>
</p>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php";
?>