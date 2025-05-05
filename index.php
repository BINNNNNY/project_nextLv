<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";

$result = $mysqli->query("SELECT * FROM board") or die("query error => " . $mysqli->error);
while ($rs = $result->fetch_object()) {
    $rsc[] = $rs;
}

// 공통 글쓰기 버튼 HTML
function printWriteButton() {
    if (isset($_SESSION['UID'])) {
        echo '<a href="/project_nextLv/write.php" class="btn btn-primary">글쓰기</a>';
    } else {
        echo '<a href="/project_nextLv/member/login.php" class="btn btn-outline-secondary">로그인 후 글쓰기</a>';
    }
}
?>

<!-- 글쓰기 버튼 (상단) -->
<div class="d-flex justify-content-end mb-3">
  <?php printWriteButton(); ?>
</div>

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
    foreach ($rsc ?? [] as $r):
    ?>
      <tr>
        <th scope="row"><?php echo $i++; ?></th>
        <td><?php echo htmlspecialchars($r->userId); ?></td>
        <td>
          <a href="/project_nextLv/view.php?bid=<?php echo $r->bid; ?>">
            <?php echo htmlspecialchars($r->title); ?>
          </a>
        </td>
        <td><?php echo $r->date; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- 글쓰기 버튼 (하단) -->
<div class="d-flex justify-content-end mt-3">
  <?php printWriteButton(); ?>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>