<?php
if (isset($_GET['download']) && !empty($_GET['download'])) {
    $filename = $_GET['download'];
    $file_path = __DIR__ . '/attachments/' . $filename;
    
    if (file_exists($file_path)) {
        $file_size = filesize($file_path);
        
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . $file_size);
        
        readfile($file_path);
        exit();
    } else {
        http_response_code(404);
        die('파일을 찾을 수 없습니다.');
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 - FS은행</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-top">
                <a href="index.php" class="logo">FS은행</a>
                <div class="user-menu">
                    <a href="#">인터넷뱅킹</a>
                    <a href="#">모바일뱅킹</a>
                    <a href="#">고객센터</a>
                </div>
            </div>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="index.php">홈</a></li>
                    <li><a href="notice.php" class="active">공지사항</a></li>
                    <li><a href="events.php">이벤트</a></li>
                    <li><a href="products.php">금융상품</a></li>
                    <li><a href="exchange.php">환율정보</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-header">
        <div class="container">
            <h1>공지사항</h1>
            <p>FS은행의 중요한 공지사항을 확인하세요</p>
        </div>
    </div>

    <main class="main-content">
        <div class="container">
            <div class="content-section">
                <div class="card-list">
                    <?php
                    $notices = [
                        [
                            'date' => '2025.01.15',
                            'category' => '시스템',
                            'title' => '인터넷뱅킹 시스템 점검 안내',
                            'content' => '고객 여러분께 더 나은 서비스를 제공하기 위해 시스템 점검을 실시합니다.<br><br><strong>점검일시:</strong> 2025년 1월 20일(토) 02:00 ~ 06:00<br><strong>점검내용:</strong> 인터넷뱅킹 서버 업그레이드<br><strong>영향범위:</strong> 인터넷뱅킹, 모바일뱅킹 일시 중단<br><br>점검 시간 동안 일시적으로 서비스 이용이 제한될 수 있으니 양해 부탁드립니다.',
                            'important' => true
                        ],
                        [
                            'date' => '2025.01.12',
                            'category' => '금리',
                            'title' => '2025년 1월 예금 금리 인상 안내',
                            'content' => '경제 상황 변화에 따라 주요 예금 상품의 금리를 인상합니다.<br><br><strong>적용일:</strong> 2025년 1월 15일부터<br><strong>대상상품:</strong><br>• 정기예금: 연 3.5% → 3.8%<br>• 적금: 연 3.2% → 3.5%<br>• 자유적금: 연 3.0% → 3.3%<br><br>자세한 내용은 영업점 또는 고객센터로 문의해주세요.',
                            'important' => false
                        ],
                        [
                            'date' => '2025.01.10',
                            'category' => '보안',
                            'title' => '피싱 사기 주의 안내',
                            'content' => '최근 FS은행을 사칭한 피싱 사기가 증가하고 있습니다.<br><br><strong>주의사항:</strong><br>• 은행에서는 전화로 비밀번호를 요구하지 않습니다<br>• 문자나 이메일의 링크를 통한 로그인 금지<br>• 의심스러운 연락 시 고객센터(0000-0000) 확인<br><br>고객님의 소중한 자산 보호를 위해 각별히 주의해주시기 바랍니다.',
                            'important' => true
                        ],
                        [
                            'date' => '2024.01.08',
                            'category' => '서비스',
                            'title' => '모바일뱅킹 새로운 기능 추가',
                            'content' => '고객 편의를 위해 모바일뱅킹에 새로운 기능이 추가되었습니다.<br><br><strong>새로운 기능:</strong><br>• 생체인증 로그인 (지문, 얼굴인식)<br>• 간편송금 기능 강화<br>• 가계부 연동 서비스<br>• 알림 설정 세분화<br><br>앱 업데이트 후 이용 가능합니다.',
                            'important' => false
                        ],
                        [
                            'date' => '2024.01.03',
                            'category' => '약관',
                            'title' => '개인정보 처리방침 변경 안내',
                            'content' => '개인정보보호법 개정에 따라 개인정보 처리방침이 변경됩니다.<br><br><strong>변경일:</strong> 2024년 1월 10일<br><strong>주요 변경사항:</strong><br>• 개인정보 보관기간 명시 강화<br>• 제3자 제공 동의 절차 개선<br>• 개인정보 파기 방법 구체화<br><br>변경된 처리방침은 홈페이지에서 확인하실 수 있습니다.',
                            'important' => false
                        ]
                    ];

                    foreach ($notices as $notice) {
                        echo '<div class="card-item' . ($notice['important'] ? ' important-notice' : '') . '">';
                        echo '<div class="card-date">' . $notice['date'] . ' | ' . $notice['category'] . ($notice['important'] ? ' | <span style="color: #e74c3c; font-weight: bold;">중요</span>' : '') . '</div>';
                        echo '<div class="card-title">' . $notice['title'] . '</div>';
                        echo '<div class="card-content">' . $notice['content'] . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="content-section">
                <h2>공지사항 검색</h2>
                <form style="display: flex; gap: 10px; align-items: center; margin-top: 1rem;">
                    <select style="padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px;">
                        <option value="all">전체</option>
                        <option value="system">시스템</option>
                        <option value="rate">금리</option>
                        <option value="security">보안</option>
                        <option value="service">서비스</option>
                        <option value="branch">영업</option>
                        <option value="policy">약관</option>
                    </select>
                    <input type="text" placeholder="검색어를 입력하세요" style="flex: 1; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px;">
                    <button type="submit" style="padding: 0.5rem 1.5rem; background: #2a5298; color: white; border: none; border-radius: 4px; cursor: pointer;">검색</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 FS은행. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
