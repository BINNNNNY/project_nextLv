<?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/header.php"; ?>

<h3 class="fw-bold border-bottom pb-2 mb-4">✅ 전세계약 단계별 체크리스트</h3>

<form method="post">

  <!-- 계약 전 -->
  <h5 class="mt-4">📝 계약 전</h5>
  <table class="table table-bordered align-middle text-center">
    <thead class="table-light">
      <tr>
        <th class="text-start" style="width: 50%;">항목</th>
        <th style="width: 20%;">예</th>
        <th style="width: 20%;">아니오</th>
        <th style="width: 10%;">링크</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-start">주변 시세 확인 및 전세가율 계산<br><small class="text-muted">전세가율(전세금/매매가) 80~90% 이상은 위험</small></td>
        <td><input type="radio" name="q_sise" value="yes" required></td>
        <td><input type="radio" name="q_sise" value="no"></td>
        <td><a href="https://rt.molit.go.kr" target="_blank" class="btn btn-sm btn-outline-secondary">실거래가</a></td>
      </tr>
      <tr>
        <td class="text-start">등기부등본 확인<br><small class="text-muted">근저당권, 가압류 등 확인</small></td>
        <td><input type="radio" name="q_deung" value="yes" required></td>
        <td><input type="radio" name="q_deung" value="no"></td>
        <td><a href="https://www.iros.go.kr" target="_blank" class="btn btn-sm btn-outline-secondary">등기소</a></td>
      </tr>
      <tr>
        <td class="text-start">임대인의 전세보증보험 가입 여부 확인</td>
        <td><input type="radio" name="q_hugcheck" value="yes" required></td>
        <td><input type="radio" name="q_hugcheck" value="no"></td>
        <td><a href="https://www.khug.or.kr" target="_blank" class="btn btn-sm btn-outline-secondary">HUG</a></td>
      </tr>
      <tr>
        <td class="text-start">건축물대장 확인<br><small class="text-muted">위반건축물 여부</small></td>
        <td><input type="radio" name="q_building" value="yes" required></td>
        <td><input type="radio" name="q_building" value="no"></td>
        <td><a href="https://www.gov.kr" target="_blank" class="btn btn-sm btn-outline-secondary">정부24</a></td>
      </tr>
    </tbody>
  </table>

  <!-- 계약 중 -->
  <h5 class="mt-4">✍️ 계약 중</h5>
  <table class="table table-bordered align-middle text-center">
    <thead class="table-light">
      <tr>
        <th class="text-start" style="width: 50%;">항목</th>
        <th style="width: 20%;">예</th>
        <th style="width: 20%;">아니오</th>
        <th style="width: 10%;">링크</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-start">임대인과 등기부등본 상 소유주 일치 여부</td>
        <td><input type="radio" name="q_owner_match" value="yes" required></td>
        <td><input type="radio" name="q_owner_match" value="no"></td>
        <td><a href="https://www.gov.kr" target="_blank" class="btn btn-sm btn-outline-secondary">진위확인</a></td>
      </tr>
      <tr>
        <td class="text-start">계약 해제 조건 명시 여부</td>
        <td><input type="radio" name="q_cancel_clause" value="yes" required></td>
        <td><input type="radio" name="q_cancel_clause" value="no"></td>
        <td></td>
      </tr>
      <tr>
        <td class="text-start">계약금/잔금 등 지급 조건 확인</td>
        <td><input type="radio" name="q_payment" value="yes" required></td>
        <td><input type="radio" name="q_payment" value="no"></td>
        <td></td>
      </tr>
      <tr>
        <td class="text-start">계약 시작 및 종료일 명확히 기재</td>
        <td><input type="radio" name="q_dates" value="yes" required></td>
        <td><input type="radio" name="q_dates" value="no"></td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <!-- 계약 후 -->
  <h5 class="mt-4">🔒 계약 후</h5>
  <table class="table table-bordered align-middle text-center">
    <thead class="table-light">
      <tr>
        <th class="text-start" style="width: 50%;">항목</th>
        <th style="width: 20%;">예</th>
        <th style="width: 20%;">아니오</th>
        <th style="width: 10%;">링크</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-start">전입세대 열람 확인</td>
        <td><input type="radio" name="q_resident_check" value="yes" required></td>
        <td><input type="radio" name="q_resident_check" value="no"></td>
        <td><a href="https://www.gov.kr" target="_blank" class="btn btn-sm btn-outline-secondary">정부24</a></td>
      </tr>
      <tr>
        <td class="text-start">전입신고 및 확정일자 받기</td>
        <td><input type="radio" name="q_report" value="yes" required></td>
        <td><input type="radio" name="q_report" value="no"></td>
        <td><a href="https://www.gov.kr" target="_blank" class="btn btn-sm btn-outline-secondary">정부24</a></td>
      </tr>
      <tr>
        <td class="text-start">등기부등본 재확인<br><small class="text-muted">압류, 경매 등 위험 확인</small></td>
        <td><input type="radio" name="q_recheck" value="yes" required></td>
        <td><input type="radio" name="q_recheck" value="no"></td>
        <td><a href="https://www.iros.go.kr" target="_blank" class="btn btn-sm btn-outline-secondary">등기소</a></td>
      </tr>
      <tr>
        <td class="text-start">전세보증보험 가입</td>
        <td><input type="radio" name="q_join_hug" value="yes" required></td>
        <td><input type="radio" name="q_join_hug" value="no"></td>
        <td><a href="https://www.khug.or.kr" target="_blank" class="btn btn-sm btn-outline-secondary">HUG</a></td>
      </tr>
      <tr>
        <td class="text-start">미납국세 열람 (임대인 동의 필요)</td>
        <td><input type="radio" name="q_tax_check" value="yes" required></td>
        <td><input type="radio" name="q_tax_check" value="no"></td>
        <td><a href="https://www.gov.kr" target="_blank" class="btn btn-sm btn-outline-secondary">정부24</a></td>
      </tr>
    </tbody>
  </table>
<!-- 계약 후 테이블 끝 -->
</tbody>
  </table>

  <div class="text-end mt-4">
    <button type="submit" class="btn btn-primary">체크 완료</button>
  </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $questions = [
    'q_sise', 'q_deung', 'q_hugcheck', 'q_building',
    'q_owner_match', 'q_cancel_clause', 'q_payment', 'q_dates',
    'q_resident_check', 'q_report', 'q_recheck', 'q_join_hug', 'q_tax_check'
  ];
  $score = 0;
  $total = count($questions);

  foreach ($questions as $q) {
    if (isset($_POST[$q]) && $_POST[$q] === 'yes') {
      $score++;
    }
  }

  echo '<div class="mt-5">';
  echo '<h4 class="mb-3">🔍 체크리스트 결과</h4>';

  if ($score === $total) {
    echo '<div class="alert alert-success">✅ 모든 항목을 점검하셨습니다. 전세계약 준비가 매우 잘 되어 있습니다!</div>';
  } elseif ($score >= $total * 0.7) {
    echo '<div class="alert alert-warning">⚠ 대부분 점검하셨지만 몇 가지 항목을 다시 확인해 보세요.</div>';
  } else {
    echo '<div class="alert alert-danger">❗ 점검이 충분하지 않습니다. 계약 전 반드시 모든 항목을 확인하세요.</div>';
  }

  echo "<p>총 <strong>{$total}</strong>개 항목 중 <strong>{$score}</strong>개를 체크하셨습니다.</p>";
   // 다시하기 버튼
   echo '<div class="text-end mt-3">';
   echo '<a href="' . $_SERVER['PHP_SELF'] . '" class="btn btn-outline-secondary">다시하기</a>';
   echo '</div>';
 
   echo '</div>';
 }
 ?>
 
 <?php include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/footer.php"; ?>