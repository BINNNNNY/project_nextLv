<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";

// 공지사항 최근 3개
$notice_result = $mysqli->query("SELECT * FROM notice ORDER BY notice_id DESC LIMIT 3");

// 게시글 최근 5개
$post_result = $mysqli->query("SELECT * FROM post ORDER BY post_id DESC LIMIT 5");
?>

<div class="container py-5">
  <h2 class="mb-4">📢 최근 공지사항</h2>
  <ul class="list-group mb-5">
    <?php while($n = $notice_result->fetch_object()): ?>
      <li class="list-group-item d-flex justify-content-between">
        <a href="/project_nextLv/notice_view.php?nid=<?= $n->id ?>" class="text-decoration-none"><?= htmlspecialchars($n->title) ?></a>
        <small class="text-muted"><?= substr($n->created_at, 0, 10) ?></small>
      </li>
    <?php endwhile; ?>
    <?php if ($notice_result->num_rows === 0): ?>
      <li class="list-group-item text-center text-muted">공지사항이 없습니다.</li>
    <?php endif; ?>
  </ul>

  <h2 class="mb-4">🗂 피해 사례 게시판</h2>
  <table class="table table-hover">
    <thead class="table-light">
      <tr>
        <th>제목</th>
        <th>작성자</th>
        <th>지역</th>
        <th>사기유형</th>
        <th>작성일</th>
      </tr>
    </thead>
    <tbody>
      <?php while($p = $post_result->fetch_object()): ?>


        <tr>
          <td><a href="/project_nextLv/view.php?pid=<?= $p->post_id ?>"><?= htmlspecialchars($p->title) ?></a></td>
          <td><?= htmlspecialchars($p->author_id) ?></td>
          <td><?= htmlspecialchars($p->region ?? '-') ?></td>
          <td><?= htmlspecialchars($p->fraud_type ?? '-') ?></td>
          <td><?= substr($p->created_at, 0, 10) ?></td>


        </tr>
      <?php endwhile; ?>
      <?php if ($post_result->num_rows === 0): ?>
        <tr><td colspan="5" class="text-center text-muted">게시글이 없습니다.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>


  <div class="mt-5 d-flex justify-content-between">
    <div>
      <h4>✅ 전세 계약 체크리스트</h4>
      <p>계약 단계별 체크리스트로 안전한 계약을 확인하세요.</p>
      <a href="/project_nextLv/checklist.php" class="btn btn-outline-primary btn-sm">체크리스트 확인하기</a>
    </div>




    <div>
      <h4>🛡️ 전세보증보험 추천</h4>
      <p>내게 맞는 보증보험을 비교하고 추천받으세요.</p>
      <a href="/project_nextLv/insurance.php" class="btn btn-outline-success btn-sm">보험 추천 받기</a>
    </div>
  </div>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>