<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/project_nextLv/inc/dbcon.php";
?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>전세사기 커뮤니티</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .nav-top {
        border-bottom: 1px solid #dee2e6;
        padding: 10px 0;
      }
      .main-nav {
        font-weight: 500;
        background-color: white;
      }
      .main-nav a.active {
        color: #4A3AFF;
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <!-- 상단 헤더 -->
    <div class="container nav-top d-flex justify-content-between align-items-center">
      <!-- 좌측 로고 & 텍스트 (index.php로 이동) -->
      <a href="/project_nextLv/index.php" class="d-flex align-items-center text-decoration-none text-dark">
  <!-- 집 아이콘 추가 -->
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-fill me-2" viewBox="0 0 16 16">
    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
  </svg>
  <span class="fs-5 fw-bold">전세사기 커뮤니티</span>
</a>

      <!-- 우측 버튼 -->
      <div>
        <a href="#" class="btn btn-outline-primary btn-sm me-2">무료 법률 자문</a>
        <?php if (isset($_SESSION['UID'])): ?>
          <a href="#" class="btn btn-sm btn-secondary me-2">마이페이지</a>
          <a href="/project_nextLv/member/logout.php" class="btn btn-sm btn-danger">로그아웃</a>
        <?php else: ?>
          <a href="/project_nextLv/member/login.php" class="btn btn-sm btn-outline-secondary me-2">로그인</a>
          <a href="/project_nextLv/member/signup.php" class="btn btn-sm btn-primary">회원가입</a>
        <?php endif; ?>
      </div>
    </div>

    <!-- 네비게이션 메뉴 -->
    <div class="container main-nav border-bottom mb-4">
      <nav class="nav justify-content-center py-2">
        <a class="nav-link text-dark <?php echo basename($_SERVER['PHP_SELF']) == 'notice.php' ? 'active' : ''; ?>" href="/project_nextLv/notice.php">공지사항</a>
        <a class="nav-link text-dark <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="/project_nextLv/index.php">게시판</a>
        <a class="nav-link text-dark <?php echo basename($_SERVER['PHP_SELF']) == 'insurance.php' ? 'active' : ''; ?>" href="/project_nextLv/insurance.php">전세 보증</a>
        <a class="nav-link text-dark <?php echo basename($_SERVER['PHP_SELF']) == 'checklist.php' ? 'active' : ''; ?>" href="/project_nextLv/checklist.php">체크리스트</a>
      </nav>
    </div>

    <!-- 본문 컨테이너 시작 -->
    <div class="container mb-5">