<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이벤트 - FS은행</title>
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
                    <li><a href="notice.php">공지사항</a></li>
                    <li><a href="events.php" class="active">이벤트</a></li>
                    <li><a href="products.php">금융상품</a></li>
                    <li><a href="exchange.php">환율정보</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-header">
        <div class="container">
            <h1>이벤트</h1>
            <p>FS은행 고객을 위한 특별한 혜택과 이벤트</p>
        </div>
    </div>

    <main class="main-content">
        <div class="container">
            <div class="content-section">
                <h2 style="color: #e74c3c; margin-bottom: 2rem;">진행중인 이벤트</h2>
                <div class="services">
                    <?php
                    $current_events = [
                        [
                            'title' => '신규 고객 웰컴 이벤트',
                            'period' => '2025.09.01 ~ 2025.10.29',
                            'content' => '신규 가입 고객 대상 특별 금리 제공',
                            'icon' => '🎉',
                            'benefit' => '최대 50만원 상품권',
                            'status' => 'hot'
                        ],
                        [
                            'title' => '모바일뱅킹 출석체크',
                            'period' => '2025.09.15 ~ 2025.11.31',
                            'content' => '매일 모바일뱅킹 접속시 포인트 적립',
                            'icon' => '📱',
                            'benefit' => '일일 100P ~ 500P',
                            'status' => 'new'
                        ],
                        [
                            'title' => '정기예금 특별금리',
                            'period' => '2025.09.10 ~ 2025.09.31',
                            'content' => '12개월 정기예금 가입시 우대금리 적용',
                            'icon' => '💰',
                            'benefit' => '연 4.2% 특별금리',
                            'status' => 'limited'
                        ]
                    ];

                    foreach ($current_events as $event) {
                        $statusClass = '';
                        $statusText = '';
                        switch($event['status']) {
                            case 'hot':
                                $statusClass = 'event-hot';
                                $statusText = 'HOT';
                                break;
                            case 'new':
                                $statusClass = 'event-new';
                                $statusText = 'NEW';
                                break;
                            case 'limited':
                                $statusClass = 'event-limited';
                                $statusText = '한정';
                                break;
                            case 'ongoing':
                                $statusClass = 'event-ongoing';
                                $statusText = '상시';
                                break;
                        }

                        echo '<div class="service-card event-card ' . $statusClass . '">';
                        echo '<div class="event-status">' . $statusText . '</div>';
                        echo '<div class="service-icon">' . $event['icon'] . '</div>';
                        echo '<h3>' . $event['title'] . '</h3>';
                        echo '<div class="event-period">' . $event['period'] . '</div>';
                        echo '<p>' . $event['content'] . '</p>';
                        echo '<div class="event-benefit">' . $event['benefit'] . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="content-section">
                <h2 style="color: #666; margin-bottom: 2rem;">종료된 이벤트</h2>
                <div class="card-list">
                    <?php
                    $ended_events = [
                        [
                            'title' => '연말 감사 이벤트',
                            'period' => '2024.12.01 ~ 2024.12.31',
                            'content' => '2023년 한 해 동안 FS은행을 이용해주신 고객님들께 감사의 마음을 전하는 이벤트였습니다. 추첨을 통해 여행상품권과 생활용품을 증정했습니다.',
                            'winner_count' => '총 1,000명 당첨'
                        ],
                        [
                            'title' => '추석 명절 특별 적금',
                            'period' => '2024.09.15 ~ 2024.10.15',
                            'content' => '추석을 맞아 특별 적금 상품을 출시했습니다. 12개월 만기 기준 연 3.8%의 우대금리를 제공했습니다.',
                            'winner_count' => '가입 고객 모두 혜택'
                        ],
                        [
                            'title' => '여름휴가 대출 이벤트',
                            'period' => '2024.06.01 ~ 2024.08.31',
                            'content' => '여름휴가 자금 마련을 위한 저금리 대출 상품을 제공했습니다. 신용도에 따라 연 2.9%부터 적용되었습니다.',
                            'winner_count' => '총 5,000건 승인'
                        ]
                    ];

                    foreach ($ended_events as $event) {
                        echo '<div class="card-item ended-event">';
                        echo '<div class="card-date">' . $event['period'] . ' | 종료</div>';
                        echo '<div class="card-title">' . $event['title'] . '</div>';
                        echo '<div class="card-content">' . $event['content'] . '<br><strong>결과:</strong> ' . $event['winner_count'] . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="content-section">
                <h2>이벤트 참여 안내</h2>
                <div style="background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-top: 1rem; padding-bottom: 0.5rem;">
                    <h3 style="color: #1e3c72; margin-bottom: 1rem;">이벤트 참여 방법</h3>
                    <ul style="line-height: 1.8; color: #555; padding-left: 2rem;">
                        <li><strong>온라인:</strong> 인터넷뱅킹 또는 모바일뱅킹에서 이벤트 배너 클릭</li>
                        <li><strong>오프라인:</strong> 전국 FS은행 영업점 방문 후 직원에게 이벤트 참여 의사 전달</li>
                        <li><strong>전화:</strong> 고객센터(0000-0000)를 통한 전화 신청</li>
                    </ul>
                    
                    <h3 style="color: #1e3c72; margin: 2rem 0 1rem 0;">유의사항</h3>
                    <ul style="line-height: 1.8; color: #555; padding-left: 2rem;">
                        <li>이벤트별 참여 조건이 다를 수 있으니 자세한 내용을 확인해주세요</li>
                        <li>중복 참여가 제한되는 이벤트가 있습니다</li>
                        <li>당첨자 발표는 이벤트 종료 후 7일 이내에 개별 안내드립니다</li>
                        <li>제세공과금은 당첨자 부담입니다</li>
                    </ul>
                    
                    <div style="background: #2a5298; color: white; padding: 1rem; border-radius: 6px; margin-top: 2rem; text-align: center;">
                        <strong>문의사항이 있으시면 고객센터 0000-0000로 연락주세요!</strong>
                    </div>
                </div>
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
