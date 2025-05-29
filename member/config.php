<?php
define('REDIRECT_URI', 'http://localhost/project_nextLv/member/callback.php');
// 구글 OAuth 설정
define('GOOGLE_CLIENT_ID', '78045084398-t01vti2fci0js1n8ec14imtpj7rm1lcn.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
// 네이버 API 설정
define('NAVER_CLIENT_ID', 'WgbHLnzndKMviUfawavC');
define('NAVER_CLIENT_SECRET', 'E05WRiT8Wq');

// 구글 로그인 URL 생성
$google_auth_url = "https://accounts.google.com/o/oauth2/v2/auth?"
                . "client_id=" . GOOGLE_CLIENT_ID
                . "&redirect_uri=" . urlencode(REDIRECT_URI)
                . "&response_type=code"
                . "&scope=" . urlencode("email profile")
                . "&access_type=offline"
                . "&prompt=consent"
                . "&state=google";

// 네이버 로그인 URL
$naver_auth_url = "https://nid.naver.com/oauth2.0/authorize?"
                . "response_type=code"
                . "&client_id=" . NAVER_CLIENT_ID
                . "&redirect_uri=" . urlencode(REDIRECT_URI)
                . "&state=naver";
?> 