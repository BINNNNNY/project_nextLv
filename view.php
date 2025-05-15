<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
$pid = $_GET['pid'] ?? 0;

if (!$pid) {
  echo "<script>alert('잘못된 접근입니다.'); location.href='index.php';</script>";
  exit;
}

// 조회수 증가
$mysqli->query("UPDATE post SET views = views + 1 WHERE post_id = $pid");

// 게시글 조회
$result = $mysqli->query("SELECT * FROM post WHERE post_id = $pid") or die($mysqli->error);
$post = $result->fetch_assoc();

if (!$post) {
  echo "<script>alert('해당 글을 찾을 수 없습니다.'); location.href='index.php';</script>";
  exit;
}
?>
<h3 class="mb-3"><?= htmlspecialchars($post['title']) ?></h3>
<div class="mb-2 text-muted">
  작성자: <?= htmlspecialchars($post['author_id']) ?> |
  <?= $post['created_at'] ?> |
  👁 조회수: <?= $post['views'] ?>
</div>
<div class="border p-3 mb-3" style="white-space:pre-line;">
  <?= htmlspecialchars($post['content']) ?>
</div>
<div class="text-end">
  <a href="index.php" class="btn btn-outline-secondary">목록</a>
  <?php if (isset($_SESSION['UID']) && $_SESSION['UID'] === $post['author_id']): ?>
    <a href="write.php?pid=<?= $post['post_id'] ?>" class="btn btn-outline-primary">수정</a>
    <a href="delete.php?pid=<?= $post['post_id'] ?>" class="btn btn-outline-danger" onclick="return confirm('정말 삭제하시겠습니까?')">삭제</a>
  <?php endif; ?>
  <!-- 댓글 입력 -->
<?php if (isset($_SESSION['UID'])): ?>
  <form action="/project_nextLv/comment_ok.php" method="post" class="mt-4">
    <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
    <div class="mb-2">
      <textarea name="content" class="form-control" rows="3" placeholder="댓글을 입력하세요" required></textarea>
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-sm btn-primary">댓글 등록</button>
    </div>
  </form>
<?php endif; ?>

<!-- 댓글 목록 -->
<?php
$comment_result = $mysqli->query("SELECT * FROM comment WHERE post_id = {$post['post_id']} ORDER BY created_at ASC");
while ($cmt = $comment_result->fetch_assoc()):
?>
  <div class="border p-2 mt-3">
    <strong><?= htmlspecialchars($cmt['author_id']) ?></strong> | <?= $cmt['created_at'] ?><br>
    <div><?= nl2br(htmlspecialchars($cmt['content'])) ?></div>
  </div>
<?php endwhile; ?>

</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>