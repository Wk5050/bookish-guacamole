<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>환율정보 - FS은행</title>
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
                    <li><a href="products.php">금융상품</a></li>
                    <li><a href="exchange.php" class="active">환율정보</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="page-header">
        <div class="container">
            <h1>환율정보</h1>
            <p>실시간 환율 정보를 확인하세요</p>
            <div style="margin-top: 1rem; color: rgba(255,255,255,0.9); font-size: 0.95rem;">
                최종 업데이트: <?php echo date('Y-m-d H:i:s'); ?>
            </div>
        </div>
    </div>

    <main class="main-content">
        <div class="container">
            <div class="content-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2>주요국 환율</h2>
                    <button class="refresh-btn" onclick="refreshExchangeRates()">
                        새로고침
                    </button>
                </div>
                
                <div class="exchange-board">
                    <?php
                    $major_currencies = [
                        [
                            'flag' => '🇺🇸',
                            'code' => 'USD',
                            'name' => '미국 달러',
                            'buy_rate' => '1,334.50',
                            'sell_rate' => '1,346.50',
                            'change' => '+2.50',
                            'change_type' => 'up'
                        ],
                        [
                            'flag' => '🇯🇵',
                            'code' => 'JPY',
                            'name' => '일본 엔',
                            'buy_rate' => '898.25',
                            'sell_rate' => '908.75',
                            'change' => '-1.25',
                            'change_type' => 'down'
                        ],
                        [
                            'flag' => '🇪🇺',
                            'code' => 'EUR',
                            'name' => '유로',
                            'buy_rate' => '1,456.80',
                            'sell_rate' => '1,471.20',
                            'change' => '+3.20',
                            'change_type' => 'up'
                        ],
                        [
                            'flag' => '🇬🇧',
                            'code' => 'GBP',
                            'name' => '영국 파운드',
                            'buy_rate' => '1,687.90',
                            'sell_rate' => '1,705.10',
                            'change' => '+4.50',
                            'change_type' => 'up'
                        ],
                        [
                            'flag' => '🇨🇭',
                            'code' => 'CHF',
                            'name' => '스위스 프랑',
                            'buy_rate' => '1,498.30',
                            'sell_rate' => '1,513.70',
                            'change' => '-0.80',
                            'change_type' => 'down'
                        ]
                    ];

                    foreach ($major_currencies as $currency) {
                        echo '<div class="currency-item">';
                        echo '<div class="currency-flag">' . $currency['flag'] . '</div>';
                        echo '<div class="currency-code">' . $currency['code'] . '</div>';
                        echo '<div class="currency-name">' . $currency['name'] . '</div>';
                        echo '<div class="currency-rates">';
                        echo '<div class="rate-item">';
                        echo '<span class="rate-label">살 때</span>';
                        echo '<span class="rate-value">' . $currency['buy_rate'] . '</span>';
                        echo '</div>';
                        echo '<div class="rate-item">';
                        echo '<span class="rate-label">팔 때</span>';
                        echo '<span class="rate-value">' . $currency['sell_rate'] . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="currency-change ' . $currency['change_type'] . '">';
                        echo ($currency['change_type'] == 'up' ? '▲' : '▼') . ' ' . abs(floatval($currency['change']));
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="content-section">
                <h2>환율 계산기</h2>
                <div class="calculator-container">
                    <div class="calculator">
                        <div class="calc-row">
                            <div class="calc-input">
                                <input type="number" id="fromAmount" placeholder="금액 입력" value="1000">
                                <select id="fromCurrency">
                                    <option value="KRW" selected>KRW (원)</option>
                                    <option value="USD">USD (달러)</option>
                                    <option value="JPY">JPY (엔)</option>
                                    <option value="EUR">EUR (유로)</option>
                                    <option value="GBP">GBP (파운드)</option>
                                </select>
                            </div>
                            <div class="exchange-icon">⇄</div>
                            <div class="calc-input">
                                <input type="number" id="toAmount" placeholder="변환 금액" readonly>
                                <select id="toCurrency">
                                    <option value="USD" selected>USD (달러)</option>
                                    <option value="KRW">KRW (원)</option>
                                    <option value="JPY">JPY (엔)</option>
                                    <option value="EUR">EUR (유로)</option>
                                    <option value="GBP">GBP (파운드)</option>
                                </select>
                            </div>
                        </div>
                        <button class="calc-btn" onclick="calculateExchange()">환율 계산</button>
                        <div id="calcResult" class="calc-result"></div>
                    </div>
                </div>
            </div>

            <div class="content-section">
                <h2>기타 통화 환율표</h2>
                <div class="exchange-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>통화</th>
                                <th>통화명</th>
                                <th>살 때</th>
                                <th>팔 때</th>
                                <th>기준율</th>
                                <th>변동</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $other_currencies = [
                                ['AUD', '호주 달러', '882.50', '894.50', '888.50', '+1.20', 'up'],
                                ['CNY', '중국 위안', '184.25', '189.75', '187.00', '-0.35', 'down'],
                                ['HKD', '홍콩 달러', '170.80', '175.20', '173.00', '+0.50', 'up'],
                                ['SGD', '싱가포르 달러', '994.30', '1,006.70', '1,000.50', '+2.10', 'up'],
                                ['NZD', '뉴질랜드 달러', '824.15', '835.85', '830.00', '-1.45', 'down'],
                                ['SEK', '스웨덴 크로나', '126.45', '131.55', '129.00', '+0.85', 'up'],
                                ['NOK', '노르웨이 크로네', '123.80', '128.20', '126.00', '-0.60', 'down'],
                                ['DKK', '덴마크 크로네', '195.25', '201.75', '198.50', '+1.35', 'up']
                            ];

                            foreach ($other_currencies as $currency) {
                                echo '<tr>';
                                echo '<td><strong>' . $currency[0] . '</strong></td>';
                                echo '<td>' . $currency[1] . '</td>';
                                echo '<td>' . $currency[2] . '</td>';
                                echo '<td>' . $currency[3] . '</td>';
                                echo '<td>' . $currency[4] . '</td>';
                                echo '<td class="' . $currency[6] . '">';
                                echo ($currency[6] == 'up' ? '▲' : '▼') . ' ' . abs(floatval($currency[5]));
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-section">
                <h2>환율 안내</h2>
                <div style="background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-top: 1rem;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                        <div>
                            <h3 style="color: #1e3c72; margin-bottom: 1rem;">환율 안내사항</h3>
                            <ul style="line-height: 1.8; color: #555;">
                                <li>환율은 매 영업일 오전 9시 30분에 고시됩니다</li>
                                <li>실시간 환율은 국제 금융시장 상황에 따라 변동됩니다</li>
                                <li>외환거래시 별도의 수수료가 발생할 수 있습니다</li>
                                <li>대량거래의 경우 별도 우대환율이 적용됩니다</li>
                            </ul>
                        </div>
                        <div>
                            <h3 style="color: #1e3c72; margin-bottom: 1rem;">환전 문의</h3>
                            <ul style="line-height: 1.8; color: #555;">
                                <li><strong>고객센터:</strong> 0000-0000</li>
                                <li><strong>외환센터:</strong> 0000-0000</li>
                                <li><strong>영업시간:</strong> 평일 09:00 ~ 16:00</li>
                                <li><strong>온라인:</strong> 인터넷뱅킹에서 확인</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div style="background: #2a5298; color: white; padding: 1rem; border-radius: 6px; margin-top: 2rem; text-align: center;">
                        <strong>환율 변동에 따른 손실 위험이 있으니 신중히 거래하시기 바랍니다.</strong>
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

    <style>
        .refresh-btn {
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .refresh-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .currency-item {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-top: 4px solid #2a5298;
            transition: transform 0.3s;
        }
        
        .currency-item:hover {
            transform: translateY(-3px);
        }
        
        .currency-flag {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .currency-code {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1e3c72;
            margin-bottom: 0.3rem;
        }
        
        .currency-name {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }
        
        .currency-rates {
            margin-bottom: 1rem;
        }
        
        .rate-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            padding: 0.3rem 0;
        }
        
        .rate-label {
            font-size: 0.9rem;
            color: #666;
        }
        
        .rate-value {
            font-weight: bold;
            color: #2a5298;
        }
        
        .currency-change {
            font-weight: bold;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.9rem;
        }
        
        .currency-change.up {
            background: #ffe6e6;
            color: #e74c3c;
        }
        
        .currency-change.down {
            background: #e6f7e6;
            color: #27ae60;
        }
        
        .calculator-container {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
            margin-top: 1rem;
        }
        
        .calculator {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .calc-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .calc-input {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .calc-input input,
        .calc-input select {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }
        
        .exchange-icon {
            font-size: 1.5rem;
            color: #2a5298;
            font-weight: bold;
        }
        
        .calc-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .calc-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .calc-result {
            margin-top: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
            color: #1e3c72;
            display: none;
        }
        
        .exchange-table {
            overflow-x: auto;
            margin-top: 1rem;
        }
        
        @media (max-width: 768px) {
            .calc-row {
                flex-direction: column;
            }
            
            .exchange-icon {
                transform: rotate(90deg);
            }
        }
    </style>

    <script>
        function refreshExchangeRates() {
            alert('환율 정보를 업데이트했습니다.');
            location.reload();
        }
        
        function calculateExchange() {
            const fromAmount = parseFloat(document.getElementById('fromAmount').value);
            const fromCurrency = document.getElementById('fromCurrency').value;
            const toCurrency = document.getElementById('toCurrency').value;
            
            if (!fromAmount || fromAmount <= 0) {
                alert('올바른 금액을 입력해주세요.');
                return;
            }
            
            const rates = {
                'KRW': 1,
                'USD': 1340.50,
                'JPY': 903.5,
                'EUR': 1464,
                'GBP': 1696.5
            };
            
            let result;
            if (fromCurrency === 'KRW') {
                result = fromAmount / rates[toCurrency];
            } else if (toCurrency === 'KRW') {
                result = fromAmount * rates[fromCurrency];
            } else {
                const krwAmount = fromAmount * rates[fromCurrency];
                result = krwAmount / rates[toCurrency];
            }
            
            document.getElementById('toAmount').value = result.toFixed(2);
            
            const resultDiv = document.getElementById('calcResult');
            resultDiv.innerHTML = `${fromAmount.toLocaleString()} ${fromCurrency} = ${result.toFixed(2)} ${toCurrency}`;
            resultDiv.style.display = 'block';
        }
        
        window.onload = function() {
            calculateExchange();
        }
        
        document.getElementById('fromAmount').addEventListener('input', calculateExchange);
        document.getElementById('fromCurrency').addEventListener('change', calculateExchange);
        document.getElementById('toCurrency').addEventListener('change', calculateExchange);
    </script>
</body>
</html>
