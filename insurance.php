<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php"; ?>

<h3 class="fw-bold border-bottom pb-2 mb-4">📄 전세보증보험 추천</h3>

<form method="post">
  <!-- 무주택 여부 -->
  <div class="mb-3">
    <label class="form-label">무주택 여부 (본인 및 배우자 포함)</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="no_house" value="yes" required>
      <label class="form-check-label">예</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="no_house" value="no">
      <label class="form-check-label">아니오</label>
    </div>
  </div>

  <!-- 보증금 -->
  <div class="mb-3">
    <label class="form-label">전세보증금 (만원)</label>
    <input type="number" class="form-control" name="deposit" placeholder="예: 8500" required>
  </div>

  <!-- 대상 유형 -->
  <div class="mb-3">
    <label class="form-label">대상 유형</label>
    <select class="form-select" name="target_type" required>
      <option value="">선택하세요</option>
      <option value="청년">청년</option>
      <option value="신혼부부">신혼부부</option>
      <option value="일반">일반</option>
    </select>
  </div>

  <!-- 소득 수준 -->
  <div class="mb-3">
    <label class="form-label">소득 수준</label>
    <select class="form-select" name="income_level" required>
      <option value="">선택하세요</option>
      <option value="2000만원 이하">2000만원 이하</option>
      <option value="2000만원~4000만원">2000만원~4000만원</option>
      <option value="4000만원~6000만원">4000만원~6000만원</option>
      <option value="6000만원 초과">6000만원 초과</option>
    </select>
  </div>

  <!-- 주택 유형 -->
  <div class="mb-3">
    <label class="form-label">주택 유형</label>
    <select class="form-select" name="housing_type" required>
      <option value="">선택하세요</option>
      <option value="아파트">아파트</option>
      <option value="다세대주택">다세대주택</option>
      <option value="오피스텔">오피스텔</option>
    </select>
  </div>

  <!-- 거주 지역 -->
  <div class="mb-3">
    <label class="form-label">거주 지역 (지자체)</label>
    <input type="text" name="region" class="form-control" placeholder="예: 서울특별시, 수원시 등" required>
  </div>

  <!-- 지원 이력 -->
  <div class="mb-4">
    <label class="form-label">최근 2년 내 보증지원 이력 여부</label><br>
    <div class="form-check form-check-inline">
      <input type="radio" class="form-check-input" name="history" value="yes">
      <label class="form-check-label">있음</label>
    </div>
    <div class="form-check form-check-inline">
      <input type="radio" class="form-check-input" name="history" value="no" checked>
      <label class="form-check-label">없음</label>
    </div>
  </div>

  <!-- 제출 버튼 -->
  <div class="text-end">
    <button type="submit" class="btn btn-primary">추천 결과 보기</button>
  </div>
</form>

<!-- 결과 출력 -->
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $no_house = $_POST['no_house'];
  $deposit = (int)$_POST['deposit'];
  $target_type = $_POST['target_type'];
  $income_level = $_POST['income_level'];
  $housing_type = $_POST['housing_type'];
  $region = $_POST['region'];
  $history = $_POST['history'] ?? 'no';

  echo '<hr class="my-5"><h4 class="mb-3">📋 추천 결과</h4>';

  if ($no_house !== 'yes') {
    echo '<div class="alert alert-danger">무주택자만 가입 가능한 상품입니다.</div>';
  } elseif ($history === 'yes') {
    echo '<div class="alert alert-warning">최근 2년 내 지원 이력이 있어 가입이 제한될 수 있습니다.</div>';
  } else {
    echo '<div class="alert alert-success">';
    echo '<strong>추천 상품:</strong><br>';
    echo '✔ HUG 청년전세보증보험<br>';
    echo '✔ SGI 일반보증상품<br>';
    echo '</div>';

    $fee = $deposit * 0.01;
    echo "<div class='mt-3'>💰 예상 보증료: <strong>" . number_format($fee) . "</strong> 만원</div>";

    echo '<div class="mt-4">';
    echo '<h6>📄 제출 서류 목록</h6>';
    echo '<ul>
      <li>임차인 신분증</li>
      <li>전세계약서</li>
      <li>등기부등본 (발급일 1개월 이내)</li>
    </ul>';
    echo '</div>';

    echo '<div class="mt-3 d-flex gap-2">';
    echo '<a href="https://www.khug.or.kr" target="_blank" class="btn btn-outline-primary">HUG 신청</a>';
    echo '<a href="https://www.sgic.co.kr" target="_blank" class="btn btn-outline-secondary">SGI 신청</a>';
    echo '</div>';

    echo '<div class="mt-4">';
    echo '<h6>⚖ 피해 신고 및 법률상담</h6>';
    echo '<p>법률구조공단 등과 연계된 상담을 이용하실 수 있습니다.</p>';
    echo '<a href="https://www.lawhome.or.kr" target="_blank" class="btn btn-danger">법률상담 바로가기</a>';
    echo '</div>';
  }
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>