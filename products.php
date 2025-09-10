<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>금융상품 - FS은행</title>
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
                    <li><a href="events.php">이벤트</a></li>
                    <li><a href="products.php" class="active">금융상품</a></li>
                    <li><a href="exchange.php">환율정보</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-header">
        <div class="container">
            <h1>금융상품</h1>
            <p>고객의 다양한 금융 니즈를 충족하는 FS은행의 상품을 만나보세요</p>
        </div>
    </div>

    <main class="main-content">
        <div class="container">
            <div class="product-tabs">
                <button class="tab-btn active" onclick="showCategory('deposit')">예금</button>
                <button class="tab-btn" onclick="showCategory('savings')">적금</button>
                <button class="tab-btn" onclick="showCategory('loan')">대출</button>
                <button class="tab-btn" onclick="showCategory('card')">카드</button>
            </div>

            <div id="deposit" class="category-section active">
                <h2>예금 상품</h2>
                <div class="product-grid">
                    <?php
                    $deposit_products = [
                        [
                            'name' => 'FS 정기예금',
                            'rate' => '연 3.8%',
                            'period' => '1개월 ~ 36개월',
                            'minimum' => '1만원 이상',
                            'features' => ['중도해지 가능', '자동연장 선택', '우대금리 적용'],
                            'icon' => '🏛️',
                            'popular' => true
                        ],
                        [
                            'name' => 'FS 자유예금',
                            'rate' => '연 1.2%',
                            'period' => '무기한',
                            'minimum' => '1원 이상',
                            'features' => ['수시입출금', '예금자보호', '인터넷뱅킹'],
                            'icon' => '💳',
                            'popular' => false
                        ],
                        [
                            'name' => 'FS 특판예금',
                            'rate' => '연 4.2%',
                            'period' => '12개월',
                            'minimum' => '100만원 이상',
                            'features' => ['한정판매', '고금리', '세제혜택'],
                            'icon' => '⭐',
                            'popular' => true
                        ]
                    ];

                    foreach ($deposit_products as $product) {
                        echo '<div class="product-card' . ($product['popular'] ? ' popular' : '') . '">';
                        if ($product['popular']) echo '<div class="popular-badge">인기</div>';
                        echo '<div class="product-icon">' . $product['icon'] . '</div>';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<div class="product-rate">' . $product['rate'] . '</div>';
                        echo '<div class="product-info">';
                        echo '<p><strong>기간:</strong> ' . $product['period'] . '</p>';
                        echo '<p><strong>최소금액:</strong> ' . $product['minimum'] . '</p>';
                        echo '</div>';
                        echo '<div class="product-features">';
                        foreach ($product['features'] as $feature) {
                            echo '<span class="feature-tag">' . $feature . '</span>';
                        }
                        echo '</div>';
                        echo '<button class="product-btn">상품 가입</button>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div id="savings" class="category-section">
                <h2>적금 상품</h2>
                <div class="product-grid">
                    <?php
                    $savings_products = [
                        [
                            'name' => 'FS 정기적금',
                            'rate' => '연 3.5%',
                            'period' => '6개월 ~ 36개월',
                            'minimum' => '1만원 이상',
                            'features' => ['월 납입', '만기일시지급', '우대금리'],
                            'icon' => '📈',
                            'popular' => true
                        ],
                        [
                            'name' => 'FS 자유적금',
                            'rate' => '연 3.3%',
                            'period' => '1년 ~ 3년',
                            'minimum' => '1만원 이상',
                            'features' => ['자유납입', '중도인출', '금리우대'],
                            'icon' => '🎈',
                            'popular' => false
                        ],
                        [
                            'name' => 'FS 청년적금',
                            'rate' => '연 4.0%',
                            'period' => '2년',
                            'minimum' => '10만원 이상',
                            'features' => ['청년전용', '세제혜택', '만기보너스'],
                            'icon' => '🎓',
                            'popular' => true
                        ]
                    ];

                    foreach ($savings_products as $product) {
                        echo '<div class="product-card' . ($product['popular'] ? ' popular' : '') . '">';
                        if ($product['popular']) echo '<div class="popular-badge">인기</div>';
                        echo '<div class="product-icon">' . $product['icon'] . '</div>';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<div class="product-rate">' . $product['rate'] . '</div>';
                        echo '<div class="product-info">';
                        echo '<p><strong>기간:</strong> ' . $product['period'] . '</p>';
                        echo '<p><strong>최소금액:</strong> ' . $product['minimum'] . '</p>';
                        echo '</div>';
                        echo '<div class="product-features">';
                        foreach ($product['features'] as $feature) {
                            echo '<span class="feature-tag">' . $feature . '</span>';
                        }
                        echo '</div>';
                        echo '<button class="product-btn">상품 가입</button>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div id="loan" class="category-section">
                <h2>대출 상품</h2>
                <div class="product-grid">
                    <?php
                    $loan_products = [
                        [
                            'name' => 'FS 주택담보대출',
                            'rate' => '연 2.9% ~',
                            'period' => '최대 30년',
                            'minimum' => '최대 10억원',
                            'features' => ['변동/고정금리', '중도상환수수료 면제', '온라인신청'],
                            'icon' => '🏠',
                            'popular' => true
                        ],
                        [
                            'name' => 'FS 신용대출',
                            'rate' => '연 4.5% ~',
                            'period' => '최대 7년',
                            'minimum' => '최대 1억원',
                            'features' => ['간편심사', '당일승인', '모바일신청'],
                            'icon' => '💼',
                            'popular' => false
                        ],
                        [
                            'name' => 'FS 전세자금대출',
                            'rate' => '연 3.2% ~',
                            'period' => '최대 2년',
                            'minimum' => '최대 5억원',
                            'features' => ['전세전용', '보증금 80%', '금리우대'],
                            'icon' => '🔑',
                            'popular' => true
                        ]
                    ];

                    foreach ($loan_products as $product) {
                        echo '<div class="product-card' . ($product['popular'] ? ' popular' : '') . '">';
                        if ($product['popular']) echo '<div class="popular-badge">인기</div>';
                        echo '<div class="product-icon">' . $product['icon'] . '</div>';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<div class="product-rate">' . $product['rate'] . '</div>';
                        echo '<div class="product-info">';
                        echo '<p><strong>기간:</strong> ' . $product['period'] . '</p>';
                        echo '<p><strong>한도:</strong> ' . $product['minimum'] . '</p>';
                        echo '</div>';
                        echo '<div class="product-features">';
                        foreach ($product['features'] as $feature) {
                            echo '<span class="feature-tag">' . $feature . '</span>';
                        }
                        echo '</div>';
                        echo '<button class="product-btn">대출 신청</button>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div id="card" class="category-section">
                <h2>카드 상품</h2>
                <div class="product-grid">
                    <?php
                    $card_products = [
                        [
                            'name' => 'FS 골든카드',
                            'rate' => '적립률 1.5%',
                            'period' => '연회비 무료',
                            'minimum' => '신용평가 적용',
                            'features' => ['해외수수료 면제', 'VIP 라운지', '보험혜택'],
                            'icon' => '✨',
                            'popular' => true
                        ],
                        [
                            'name' => 'FS 청춘카드',
                            'rate' => '적립률 2.0%',
                            'period' => '연회비 1만원',
                            'minimum' => '만 18세 이상',
                            'features' => ['온라인쇼핑', '카페할인', '교통비할인'],
                            'icon' => '🌟',
                            'popular' => true
                        ],
                        [
                            'name' => 'FS 패밀리카드',
                            'rate' => '적립률 1.2%',
                            'period' => '연회비 무료',
                            'minimum' => '가족카드 발급',
                            'features' => ['마트할인', '주유할인', '통신비할인'],
                            'icon' => '👨‍👩‍👧‍👦',
                            'popular' => false
                        ]
                    ];

                    foreach ($card_products as $product) {
                        echo '<div class="product-card' . ($product['popular'] ? ' popular' : '') . '">';
                        if ($product['popular']) echo '<div class="popular-badge">인기</div>';
                        echo '<div class="product-icon">' . $product['icon'] . '</div>';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<div class="product-rate">' . $product['rate'] . '</div>';
                        echo '<div class="product-info">';
                        echo '<p><strong>연회비:</strong> ' . $product['period'] . '</p>';
                        echo '<p><strong>조건:</strong> ' . $product['minimum'] . '</p>';
                        echo '</div>';
                        echo '<div class="product-features">';
                        foreach ($product['features'] as $feature) {
                            echo '<span class="feature-tag">' . $feature . '</span>';
                        }
                        echo '</div>';
                        echo '<button class="product-btn">카드 신청</button>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="content-section">
                <h2>상품 가입 안내</h2>
                <div style="background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-top: 1rem;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                        <div>
                            <h3 style="color: #1e3c72; margin-bottom: 1rem;">온라인 가입</h3>
                            <ul style="line-height: 1.8; color: #555;">
                                <li>인터넷뱅킹 로그인</li>
                                <li>상품 선택 및 신청</li>
                                <li>본인인증 완료</li>
                                <li>가입 완료 알림</li>
                            </ul>
                        </div>
                        <div>
                            <h3 style="color: #1e3c72; margin-bottom: 1rem;">영업점 가입</h3>
                            <ul style="line-height: 1.8; color: #555;">
                                <li>가까운 영업점 방문</li>
                                <li>신분증 지참</li>
                                <li>상담 후 상품 선택</li>
                                <li>서류 작성 및 가입</li>
                            </ul>
                        </div>
                        <div>
                            <h3 style="color: #1e3c72; margin-bottom: 1rem;">모바일 가입</h3>
                            <ul style="line-height: 1.8; color: #555;">
                                <li>KB모바일뱅킹 앱</li>
                                <li>상품 메뉴 선택</li>
                                <li>간편 신청 진행</li>
                                <li>SMS 인증 완료</li>
                            </ul>
                        </div>
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


    <script>
        function showCategory(category) {
            document.querySelectorAll('.category-section').forEach(section => {
                section.classList.remove('active');
            });
            
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            document.getElementById(category).classList.add('active');
            
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
