<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FS은행</title>
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
                    <li><a href="index.php" class="active">홈</a></li>
                    <li><a href="notice.php">공지사항</a></li>
                    <li><a href="events.php">이벤트</a></li>
                    <li><a href="products.php">금융상품</a></li>
                    <li><a href="exchange.php">환율정보</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="main-banner">
        <div class="container">
            <div class="banner-content">
                <h1>금융의 새로운 경험</h1>
                <p>혁신적인 디지털 서비스로 만나는 FS은행</p>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <section class="services">
                <div class="service-card" onclick="location.href='products.php'">
                    <div class="service-icon">💳</div>
                    <h3>금융상품</h3>
                    <p>다양한 예금, 적금, 대출 상품을<br>만나보세요</p>
                </div>
                <div class="service-card" onclick="location.href='exchange.php'">
                    <div class="service-icon">💱</div>
                    <h3>환율정보</h3>
                    <p>실시간 환율 정보를<br>확인하실 수 있습니다</p>
                </div>
                <div class="service-card" onclick="location.href='events.php'">
                    <div class="service-icon">🎁</div>
                    <h3>이벤트</h3>
                    <p>고객을 위한 다양한<br>이벤트와 혜택</p>
                </div>
            </section>

            <section class="content-section">
                <h2>최신 소식</h2>
                <div class="card-list">
                    <div class="card-item">
                        <div class="card-date"><?php echo date('Y.m.d'); ?></div>
                        <div class="card-title">2025년 금융상품 금리 인상 안내</div>
                        <div class="card-content">고객 여러분의 성원에 감사드리며, 2025년 새해를 맞아 주요 금융상품의 금리를 인상합니다.</div>
                    </div>
                    <div class="card-item">
                        <div class="card-date"><?php echo date('Y.m.d', strtotime('-2 days')); ?></div>
                        <div class="card-title">모바일뱅킹 새로운 기능 업데이트</div>
                        <div class="card-content">더욱 편리해진 모바일뱅킹 서비스를 경험해보세요. 생체인증, 간편송금 기능이 추가되었습니다.</div>
                    </div>
                    <div class="card-item">
                        <div class="card-date"><?php echo date('Y.m.d', strtotime('-5 days')); ?></div>
                        <div class="card-title">신규 고객 대상 특별 혜택 안내</div>
                        <div class="card-content">신규 가입 고객을 위한 특별한 혜택을 준비했습니다. 자세한 내용은 이벤트 페이지를 확인해주세요.</div>
                    </div>
                </div>
            </section>

            <section class="content-section">
                <h2>빠른 서비스</h2>
                <div class="services">
                    <div class="service-card">
                        <div class="service-icon">🏪</div>
                        <h3>영업점 찾기</h3>
                        <p>가까운 영업점과<br>ATM 위치 안내</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">📞</div>
                        <h3>전화상담</h3>
                        <p>0000-0000<br>24시간 고객상담</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">📱</div>
                        <h3>앱 다운로드</h3>
                        <p>FS모바일뱅킹<br>앱을 다운로드하세요</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 FS은행. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
