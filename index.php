<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";

// 정렬 처리
$order = $_GET['order'] ?? 'idx';
$allowed = ['idx', 'title', 'userId', 'date', 'likes', 'views'];
$order_by = in_array($order, $allowed) ? $order : 'idx';

// 검색 처리
$search = $_GET['search'] ?? '';
$where = $search ? "WHERE title LIKE '%$search%' OR userId LIKE '%$search%'" : '';

// 페이지네이션 처리
$page = $_GET['page'] ?? 1;
$page = max(1, (int)$page);
$limit = 10;
$offset = ($page - 1) * $limit;

$count_result = $mysqli->query("SELECT COUNT(*) as cnt FROM board $where") or die($mysqli->error);
$count_row = $count_result->fetch_object();
$total_posts = $count_row->cnt;
$total_pages = ceil($total_posts / $limit);

// 페이지네이션 범위 계산
$btn_count = 5;
$start_page = max(1, $page - floor($btn_count / 2));
$end_page = min($total_pages, $start_page + $btn_count - 1);
if ($end_page - $start_page < $btn_count - 1) {
  $start_page = max(1, $end_page - $btn_count + 1);
}

$result = $mysqli->query("SELECT * FROM board $where ORDER BY $order_by DESC LIMIT $offset, $limit") or die("query error => " . $mysqli->error);
$rsc = [];
while ($rs = $result->fetch_object()) {
    $rsc[] = $rs;
}

// 글쓰기 버튼 공통 출력 함수
function printWriteButton() {
    if (isset($_SESSION['UID'])) {
        echo '<a href="/project_nextLv/write.php" class="btn btn-primary">글쓰기</a>';
    } else {
        echo '<a href="/project_nextLv/member/login.php" class="btn btn-outline-secondary">로그인 후 글쓰기</a>';
    }
}
?>

<h3 class="mb-4">🗂 게시판</h3>

<!-- 정렬 버튼 -->
<div class="d-flex justify-content-between mb-3">
  <div class="btn-group" role="group">
    <a href="?order=likes&search=<?php echo urlencode($search); ?>" class="btn <?php echo $order === 'likes' ? 'btn-primary' : 'btn-outline-secondary'; ?>">추천순</a>
    <a href="?order=views&search=<?php echo urlencode($search); ?>" class="btn <?php echo $order === 'views' ? 'btn-primary' : 'btn-outline-secondary'; ?>">조회순</a>
    <a href="?order=idx&search=<?php echo urlencode($search); ?>" class="btn <?php echo $order === 'idx' ? 'btn-primary' : 'btn-outline-secondary'; ?>">최신순</a>
  </div>
  <?php printWriteButton(); ?>
</div>

<table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">번호</th>
      <th scope="col">제목</th>
      <th scope="col">작성자</th>
      <th scope="col">추천수</th>
      <th scope="col">조회수</th>
      <th scope="col">작성일</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($rsc)): ?>
      <?php $i = $offset + 1; foreach ($rsc as $r): ?>
        <tr>
          <th scope="row"><?php echo $i++; ?></th>
          <td>
            <a href="/project_nextLv/view.php?bid=<?php echo $r->bid; ?>">
              <?php echo htmlspecialchars($r->title); ?>
            </a>
          </td>
          <td><?php echo htmlspecialchars($r->userId); ?></td>
          <td><?php echo $r->likes ?? 0; ?></td>
          <td><?php echo $r->views ?? 0; ?></td>
          <td><?php echo $r->date; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6" class="text-center">작성된 게시글이 없습니다.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<!-- 페이지네이션 -->
<?php if ($total_pages > 1): ?>
  <nav class="mt-4">
    <ul class="pagination justify-content-center">
      <?php if ($start_page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?page=1&order=<?php echo $order; ?>&search=<?php echo urlencode($search); ?>">처음</a>
        </li>
      <?php endif; ?>
      <?php for ($p = $start_page; $p <= $end_page; $p++): ?>
        <li class="page-item <?php echo $p == $page ? 'active' : ''; ?>">
          <a class="page-link" href="?page=<?php echo $p; ?>&order=<?php echo $order; ?>&search=<?php echo urlencode($search); ?>"><?php echo $p; ?></a>
        </li>
      <?php endfor; ?>
      <?php if ($end_page < $total_pages): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $total_pages; ?>&order=<?php echo $order; ?>&search=<?php echo urlencode($search); ?>">끝</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>

<!-- 검색창 (하단 배치) -->
<form class="row mt-4" method="get">
  <div class="col-md-10">
    <input type="text" name="search" class="form-control" placeholder="제목 또는 작성자 검색" value="<?php echo htmlspecialchars($search); ?>">
  </div>
  <div class="col-md-2 text-end">
    <button type="submit" class="btn btn-outline-secondary w-100">검색</button>
  </div>
</form>

<!-- 하단 글쓰기 버튼 -->
<div class="text-end mt-3">
  <?php printWriteButton(); ?>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>