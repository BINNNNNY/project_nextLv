<?php
  session_start();
  $userid = $_SESSION["userid"] ?? "";
  $username = $_SESSION["username"] ?? "";
?>

<style>
  .btn-pink {
    background-color: #ff69b4;
    color: white;
    border: none;
  }
  .btn-pink:hover {
    background-color: #ff85c1;
    color: white;
  }
  .carousel-item img {
    width: 100%;
    height: 300px;
    object-fit: cover;
  }
  .menu-font {
    font-weight: 500;
    font-size: 1.1rem;
  }
  .search {
    width: 300px;
    height: 100px;
    position: absolute;
    top: 0;
    right: 0;
    margin-top: 100px; 
    margin-right: 130px; 
  }
  .menu {
    margin-bottom: 20px; 
  }
  .products img {
    width: 250px; 
    height: auto; 
  }
</style>

<header class="p-3 bg-white text-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between">

      <!-- 메뉴 (왼쪽 정렬) -->
      <ul class="nav col-12 col-lg-auto mb-2 justify-content-start mb-md-0">
        <li><a href="./index.php" class="nav-link px-2 text-dark"><strong>전세사기 커뮤니티</strong></a></li>
    
      </ul>

      <!-- 로그인 상태별 버튼 (오른쪽 정렬) -->
      <div class="ms-auto text-end">
        <?php if (!$userid): ?>
          <button type="button" class="btn btn-pink me-2" onclick="location.href='./login.php'">로그인</button>
          <button type="button" class="btn btn-pink" onclick="location.href='./member_join.php'">회원가입</button>
        <?php else: ?>
          <?= htmlspecialchars($username) ?> (<?= htmlspecialchars($userid) ?>)님 환영합니다.
          <button type="button" class="btn btn-pink me-2" onclick="location.href='./logout.php'">로그아웃</button>
          <button type="button" class="btn btn-pink" onclick="location.href='./member_modify.php'">회원정보수정</button>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <section class="banner text-center mt-3">
    <a href="index.php">
      <img src="/PROJECT_NEXTLV/전세사기 로고.png" alt="main-image" width="600px;">
    </a>
  </section>
</header>

<!-- 메뉴 섹션 (링크 연결형태) -->
<nav class="menu d-flex align-items-center mt-3">
  <ul class="nav nav-fill w-100 d-flex">
    <li class="nav-item"><a href="/PROJECT_NEXTLV/notice.php" class="menu-font nav-link">공지사항</a></li>
    <li class="nav-item"><a href="=/PROJECT_NEXTLV/board.php" class="menu-font nav-link">게시판</a></li>
    <li class="nav-item"><a href="=	/PROJECT_NEXTLV/insurance.php" class="menu-font nav-link">전세보험</a></li>
    <li class="nav-item"><a href="/PROJECT_NEXTLV/checklist.php" class="menu-font nav-link">체크리스트</a></li>
  </ul>
</nav>

