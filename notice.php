<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";

// 관리자 여부 판단
$is_admin = isset($_SESSION['UID']) && $_SESSION['UID'] === 'admin';

// 공지사항 목록 불러오기
$result = $mysqli->query("SELECT * FROM notice ORDER BY notice_id DESC") or die($mysqli->error);
$notices = [];
while ($row = $result->fetch_object()) {
    $notices[] = $row;
}
?>

<h3 class="mb-4">📢 공지사항</h3>

<!-- 관리자만 글쓰기 버튼 -->
<div class="d-flex justify-content-end mb-3">
  <?php if ($is_admin): ?>
    <a href="/project_nextLv/notice_write.php" class="btn btn-primary">공지 작성</a>
  <?php endif; ?>
</div>

<table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">번호</th>
      <th scope="col">제목</th>
      <th scope="col">작성자</th>
      <th scope="col">조회수</th>
      <th scope="col">작성일</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($notices)): $i = 1; foreach ($notices as $n): ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><a href="/project_nextLv/notice_view.php?id=<?php echo $n->notice_id; ?>"><?php echo htmlspecialchars($n->title); ?></a></td>
        <td><?php echo $n->writer ?? $n->admin_id ?? '-'; ?></td>
        <td><?php echo $n->views ?? 0; ?></td>
        <td><?php echo $n->created_at; ?></td>
      </tr>
    <?php endforeach; else: ?>
      <tr><td colspan="5" class="text-center">공지사항이 없습니다.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>