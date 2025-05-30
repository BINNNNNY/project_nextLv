<?php
session_start();
require_once 'config.php';
require_once '../inc/dbcon.php';

if (isset($_GET['code'])) {
    // state 파라미터에서 소셜 로그인 타입 추출
    $social_type = $_GET['state'] ?? '';
    
    if ($social_type === 'naver') {
        // 네이버 로그인 처리
        $naver_code = $_GET['code'];
        $naver_token_url = "https://nid.naver.com/oauth2.0/token?"
                        . "grant_type=authorization_code"   
                        . "&client_id=" . NAVER_CLIENT_ID
                        . "&client_secret=" . NAVER_CLIENT_SECRET
                        . "&code=" . $naver_code
                        . "&state=" . $social_type;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $naver_token_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code !== 200) {
            die('Failed to get access token from Naver. HTTP Code: ' . $http_code);
        }

        $token_data = json_decode($response, true);
        if (!isset($token_data['access_token'])) {
            die('Failed to get access token from Naver response');
        }

        // 네이버 사용자 정보 가져오기
        $naver_user_url = "https://openapi.naver.com/v1/nid/me";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $naver_user_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $token_data['access_token']
        ]);
        $user_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code !== 200) {
            die('Failed to get user info from Naver. HTTP Code: ' . $http_code);
        }

        $user_data = json_decode($user_response, true);
        if (!isset($user_data['response'])) {
            die('Invalid response from Naver user info API');
        }

        $social_user = $user_data['response'];
        $social_id = $social_user['id'];
        $email = $social_user['email'];
        $name = $social_user['name'];
        $birth_date = $social_user['birthyear'] . '-' . $social_user['birthday'];

    } elseif ($social_type === 'google') {
        // 구글 로그인 처리
        $google_code = $_GET['code'];
        $google_token_url = "https://oauth2.googleapis.com/token";
        $post_data = [
            'code' => $google_code,
            'client_id' => GOOGLE_CLIENT_ID,
            'client_secret' => GOOGLE_CLIENT_SECRET,
            'redirect_uri' => REDIRECT_URI,
            'grant_type' => 'authorization_code'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $google_token_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        // 디버깅을 위한 정보 출력
        if ($http_code !== 200) {
            $error = curl_error($ch);
            $info = curl_getinfo($ch);
            die('Failed to get access token from Google. HTTP Code: ' . $http_code . 
                '<br>Error: ' . $error . 
                '<br>Response: ' . $response . 
                '<br>Request URL: ' . $google_token_url . 
                '<br>Post Data: ' . print_r($post_data, true));
        }
        
        curl_close($ch);

        $token_data = json_decode($response, true);
        if (!isset($token_data['access_token'])) {
            die('Failed to get access token from Google response. Response: ' . $response);
        }

        // 구글 사용자 정보 가져오기
        $google_user_url = "https://www.googleapis.com/oauth2/v2/userinfo";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $google_user_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $token_data['access_token']
        ]);
        $user_response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code !== 200) {
            die('Failed to get user info from Google. HTTP Code: ' . $http_code);
        }

        $social_user = json_decode($user_response, true);
        $social_id = $social_user['id'];
        $email = $social_user['email'];
        $name = $social_user['name'];
        $birth_date = ''; // 구글은 생년월일을 제공하지 않으므로 현재 날짜로 설정
    } else {
        die('Invalid social login type: ' . $social_type);  // 디버깅을 위해 타입 출력
    }

    // 사용자 존재 여부 확인
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $social_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        // 새 사용자 등록
        $stmt = $mysqli->prepare("INSERT INTO users (user_id, name, password, email, birth_date, social_login_type, role) VALUES (?, ?, '', ?, ?, ?, 'user')");
        $stmt->bind_param("sssss", $social_id, $name, $email, $birth_date, $social_type);
        
        if (!$stmt->execute()) {
            die('Failed to register new user: ' . $stmt->error);
        }
    } else {
        // 기존 사용자 정보 업데이트
        $stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ?, birth_date = ? WHERE user_id = ?");
        $stmt->bind_param("ssss", $name, $email, $birth_date, $social_id);
        $stmt->execute();
    }

    // 세션에 사용자 정보 저장
    $_SESSION['UID'] = $social_id;
    $_SESSION['UNAME'] = $name;
    $_SESSION['ROLE'] = 'user';

    // 메인 페이지로 리다이렉트
    header('Location: ../index.php');
    exit;
} else {
    die('No authorization code received');
}
?>
