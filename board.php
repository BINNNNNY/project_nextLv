<?php
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php";
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/dbcon.php";

$region_data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/region_data_kr.json"), true);
$region_options = array_keys($region_data);
$fraud_options = [
  '이중계약', '허위 정보 제공', '가짜 임대인',
  '보증금 미반환', '명의 도용', '기타'
];

$selected_region = $_GET['region'] ?? '';
$selected_sub_region = $_GET['sub_region'] ?? '';
$selected_fraud = $_GET['fraud_type'] ?? '';
$search = $_GET['search'] ?? '';

$order = $_GET['order'] ?? 'post_id';
$allowed = ['post_id', 'title', 'author_id', 'created_at', 'views'];
$order_by = in_array($order, $allowed) ? $order : 'post_id';

$where_clauses = [];
if ($search) {
  $escaped = $mysqli->real_escape_string($search);
  $where_clauses[] = "(title LIKE '%$escaped%' OR author_id LIKE '%$escaped%')";
}
if ($selected_region) {
  $where_clauses[] = "region = '{$mysqli->real_escape_string($selected_region)}'";
}
if ($selected_sub_region) {
  $where_clauses[] = "sub_region = '{$mysqli->real_escape_string($selected_sub_region)}'";
}
if ($selected_fraud) {
  $where_clauses[] = "fraud_type = '{$mysqli->real_escape_string($selected_fraud)}'";
}
$where = count($where_clauses) ? "WHERE " . implode(' AND ', $where_clauses) : '';

$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 5;
$offset = ($page - 1) * $limit;

$count_result = $mysqli->query("SELECT COUNT(*) AS cnt FROM post $where") or die($mysqli->error);
$total_posts = $count_result->fetch_object()->cnt;
$total_pages = ceil($total_posts / $limit);

$btn_count = 5;
$start_page = max(1, $page - floor($btn_count / 2));
$end_page = min($total_pages, $start_page + $btn_count - 1);
if ($end_page - $start_page < $btn_count - 1) {
  $start_page = max(1, $end_page - $btn_count + 1);
}

$result = $mysqli->query("SELECT * FROM post $where ORDER BY $order_by DESC LIMIT $offset, $limit") or die($mysqli->error);
$rsc = [];
while ($rs = $result->fetch_object()) {
  $rsc[] = $rs;
}
function printWriteButton() {
  if (isset($_SESSION['UID'])) {
    echo '<a href="/project_nextLv/write.php" class="btn btn-primary">글쓰기</a>';
  } else {
    echo '<a href="/project_nextLv/member/login.php" class="btn btn-outline-secondary">로그인 후 글쓰기</a>';
  }
}
?>

<div class="page-title-bar text-center fw-bold fs-4">게시판</div>

<div class="d-flex justify-content-between align-items-center mb-4">
  <div class="btn-group">
    <a href="?<?= http_build_query(array_merge($_GET, ['order' => 'views'])) ?>" class="btn <?= $order === 'views' ? 'btn-primary' : 'btn-outline-secondary' ?>">조회순</a>
    <a href="?<?= http_build_query(array_merge($_GET, ['order' => 'post_id'])) ?>" class="btn <?= $order === 'post_id' ? 'btn-primary' : 'btn-outline-secondary' ?>">최신순</a>
  </div>
  <?php printWriteButton(); ?>
</div>

<div class="d-flex justify-content-center align-items-center gap-3 mb-4">
  <select id="region" class="form-select w-auto">
    <option value="">시/도 선택</option>
    <?php foreach ($region_options as $r): ?>
      <option value="<?= $r ?>" <?= $selected_region === $r ? 'selected' : '' ?>><?= $r ?></option>
    <?php endforeach; ?>
  </select>

  <select id="sub_region" class="form-select w-auto">
    <option value="">시/군/구 선택</option>
  </select>

  <select id="fraud_type" class="form-select w-auto" onchange="location.href='?<?= http_build_query($_GET) ?>&fraud_type=' + this.value">
    <option value="">사기유형</option>
    <?php foreach ($fraud_options as $f): ?>
      <option value="<?= $f ?>" <?= $selected_fraud === $f ? 'selected' : '' ?>><?= $f ?></option>
    <?php endforeach; ?>
  </select>
</div>

<script>
  const regionData = <?= json_encode($region_data, JSON_UNESCAPED_UNICODE) ?>;
  const regionSelect = document.getElementById('region');
  const subRegionSelect = document.getElementById('sub_region');

  function updateSubRegions() {
    const selected = regionSelect.value;
    subRegionSelect.innerHTML = '<option value="">시/군/구 선택</option>';
    if (regionData[selected]) {
      regionData[selected].forEach(sr => {
        const opt = document.createElement('option');
        opt.value = sr;
        opt.textContent = sr;
        if ("<?= $selected_sub_region ?>" === sr) opt.selected = true;
        subRegionSelect.appendChild(opt);
      });
    }
  }
  regionSelect.addEventListener("change", () => {
    updateSubRegions();
    const query = new URLSearchParams(window.location.search);
    query.set('region', regionSelect.value);
    query.delete('page');
    location.href = '?' + query.toString();
  });
  subRegionSelect.addEventListener("change", () => {
    const query = new URLSearchParams(window.location.search);
    query.set('sub_region', subRegionSelect.value);
    query.delete('page');
    location.href = '?' + query.toString();
  });
  window.addEventListener("DOMContentLoaded", updateSubRegions);
</script>

<form method="get" class="row g-2 mb-3">
  <div class="col-md-10">
    <input type="text" name="search" class="form-control" placeholder="제목 또는 작성자 검색" value="<?= htmlspecialchars($search) ?>">
    <input type="hidden" name="region" value="<?= htmlspecialchars($selected_region) ?>">
    <input type="hidden" name="sub_region" value="<?= htmlspecialchars($selected_sub_region) ?>">
    <input type="hidden" name="fraud_type" value="<?= htmlspecialchars($selected_fraud) ?>">
    <input type="hidden" name="order" value="<?= htmlspecialchars($order) ?>">
  </div>
  <div class="col-md-2 text-end">
    <button type="submit" class="btn btn-outline-secondary w-100">검색</button>
  </div>
</form>

<table class="table table-striped">
  <thead class="table-light">
    <tr>
      <th>번호</th>
      <th>제목</th>
      <th>작성자</th>
      <th>지역</th>
      <th>사기유형</th>
      <th>조회수</th>
      <th>작성일</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($rsc)):
      $num = $total_posts - $offset;
      foreach ($rsc as $r): ?>
        <tr>
          <td><?= $num-- ?></td>
          <td><a href="/project_nextLv/view.php?pid=<?= $r->post_id ?>"><?= htmlspecialchars($r->title) ?></a></td>
          <td><?= htmlspecialchars($r->author_id) ?></td>
          <td><?= htmlspecialchars(($r->region ?? '-') . ' ' . ($r->sub_region ?? '')) ?></td>
          <td><?= htmlspecialchars($r->fraud_type ?? '-') ?></td>
          <td><?= $r->views ?? 0 ?></td>
          <td><?= $r->created_at ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr><td colspan="7" class="text-center">작성된 게시글이 없습니다.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php if ($total_pages > 1): ?>
  <nav class="mt-4">
    <ul class="pagination justify-content-center">
      <?php if ($page > 1): ?>
        <li class="page-item"><a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>">이전</a></li>
      <?php endif; ?>
      <?php for ($p = $start_page; $p <= $end_page; $p++): ?>
        <li class="page-item <?= $p == $page ? 'active' : '' ?>">
          <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $p])) ?>"><?= $p ?></a>
        </li>
      <?php endfor; ?>
      <?php if ($page < $total_pages): ?>
        <li class="page-item"><a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>">다음</a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ Bootstrap dropdown script loaded.");
  });
</script>
