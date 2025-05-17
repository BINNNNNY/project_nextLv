-- 관리자 및 사용자 생성
INSERT INTO users (user_id, name, password, email, birth_date, role)
VALUES 
('admin', '관리자', 'admin1234', 'admin@test.com', '1990-01-01', 'admin'),
('user1', '홍길동', 'pass1234', 'user1@test.com', '1995-05-05', 'user');

-- 공지사항 3개
INSERT INTO notice (title, content, admin_id)
VALUES 
('전세사기 예방 관련 개정법 안내', '2025년부터 시행되는 개정법률을 참고하세요.', 'admin'),
('법률상담 예약 기능 추가', '이제 피해자가 직접 법률상담을 예약할 수 있습니다.', 'admin'),
('데이터 보안 강화 안내', '사용자 개인정보 보호를 위한 보안정책을 강화했습니다.', 'admin');

-- 게시글 5개
INSERT INTO post (author_id, title, content, region, fraud_type, contract_stage, views)
VALUES 
('user1', '보증금 사기 사례 공유', '임대인이 전세보증금을 돌려주지 않고 잠적했습니다.', '서울 강서구', '보증금 미반환', 'after', 15),
('user1', '가짜 등기부등본에 속았습니다', '등기부등본이 진짜처럼 보였지만 허위였습니다.', '경기도 성남시', '허위서류 제공', 'before', 28),
('user1', '계약서 작성 시 유의사항', '사기를 피하기 위한 계약서 작성 팁을 공유합니다.', '부산 해운대구', '계약서 위조', 'during', 35),
('user1', '피해 후 대처법', '사기 피해 후 신고 및 법적 대응 절차를 설명합니다.', '대전 유성구', '보증금 편취', 'after', 19),
('user1', '사기 의심 시 대응법', '사기 의심 정황 시 즉시 확인해야 할 체크리스트입니다.', '서울 중구', '의심거래', 'before', 42);