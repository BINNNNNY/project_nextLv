<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
if (!isset($_SESSION['UID'])) {
  echo "<script>alert('로그인이 필요합니다.'); location.href='login.php';</script>";
  exit;
}
$pid = $_GET['pid'] ?? null;
$edit = false;
$title = $content = $region = $fraud_type = '';

if ($pid) {
  $result = $mysqli->query("SELECT * FROM post WHERE post_id = $pid") or die($mysqli->error);
  $row = $result->fetch_assoc();
  if ($row['author_id'] !== $_SESSION['UID']) {
    echo "<script>alert('본인 글만 수정할 수 있습니다.'); history.back();</script>";
    exit;
  }
  $edit = true;
  extract($row);
}
?>
<h3 class="mb-4"><?= $edit ? "✏ 글 수정" : "✍ 글쓰기" ?></h3>
<form method="post" action="write_ok.php">
  <?php if ($edit): ?><input type="hidden" name="pid" value="<?= $post_id ?>"><?php endif; ?>
  <div class="mb-3">
    <label class="form-label">제목</label>
    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($title) ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">내용</label>
    <textarea name="content" class="form-control" rows="5" required><?= htmlspecialchars($content) ?></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">지역</label>
    <input type="text" name="region" class="form-control" value="<?= htmlspecialchars($region) ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">사기유형</label>
    <input type="text" name="fraud_type" class="form-control" value="<?= htmlspecialchars($fraud_type) ?>">
  </div>
  <div class="text-end">
    <button type="submit" class="btn btn-primary"><?= $edit ? "수정" : "등록" ?></button>
  </div>
</form>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>