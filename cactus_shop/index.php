<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌵 Cactus Shop - ร้านกระบองเพชรคุณภาพ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #c8e6c9 0%, #81c784 50%, #66bb6a 100%);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #66bb6a 0%, #4caf50 50%, #388e3c 100%);
            color: white;
            padding: 2rem 5%;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
            position: relative;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.3;
        }

        header h1 {
            font-size: 2.5rem;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            position: relative;
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .social-icons {
            text-align: center;
            margin-top: 1rem;
            position: relative;
            z-index: 1;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 15px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .social-icons a:hover {
            transform: translateY(-5px) scale(1.2);
        }

        nav {
            background: rgba(255, 255, 255, 0.98);
            padding: 0;
            box-shadow: 0 2px 10px rgba(76, 175, 80, 0.2);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .nav-left, .nav-right {
            display: flex;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            display: inline-block;
            padding: 1.2rem 1.5rem;
            color: #388e3c;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: linear-gradient(135deg, #66bb6a 0%, #4caf50 100%);
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 80%;
        }

        .best-seller {
            max-width: 1400px;
            margin: 3rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .product {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.15);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 2px solid #e8f5e9;
        }

        .product:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(76, 175, 80, 0.25);
        }

        .product::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #66bb6a, #4caf50, #388e3c);
        }

        .badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #66bb6a 0%, #4caf50 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            z-index: 1;
        }

        .product img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .product:hover img {
            transform: scale(1.05);
        }

        .product h3 {
            color: #388e3c;
            font-size: 1.3rem;
            margin-bottom: 0.75rem;
            font-weight: 700;
        }

        .product p span {
            color: #4caf50;
            font-size: 1.3rem;
            font-weight: 700;
        }

        footer {
            background: linear-gradient(135deg, #388e3c 0%, #2e7d32 100%);
            color: white;
            padding: 3rem 5%;
            margin-top: 4rem;
        }

        .contact-info {
            text-align: center;
        }

        .contact-info p {
            margin: 1rem 0;
            font-size: 1.1rem;
        }

        .decorative-cactus {
            position: fixed;
            font-size: 4rem;
            opacity: 0.1;
            pointer-events: none;
            z-index: 0;
        }

        .decorative-cactus:nth-child(1) {
            top: 10%;
            left: 5%;
            animation: float 4s ease-in-out infinite;
        }

        .decorative-cactus:nth-child(2) {
            top: 60%;
            right: 8%;
            animation: float 5s ease-in-out infinite 1s;
        }

        .decorative-cactus:nth-child(3) {
            bottom: 15%;
            left: 10%;
            animation: float 6s ease-in-out infinite 2s;
        }
    </style>
</head>
<body>
    <div class="decorative-cactus">🌵</div>
    <div class="decorative-cactus">🌵</div>
    <div class="decorative-cactus">🌵</div>

    <header>
        <h1>🌵 Cactus Shop</h1>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-line"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </header>

    <nav>
        <ul class="nav-container">
            <div class="nav-left">
                <li><a href="index.php">หน้าแรก</a></li>
                <li><a href="knowledge.html">ข้อมูล-เนื้อหา</a></li>
                <li><a href="products.html">สินค้า</a></li>
                <li><a href="order.html">สั่งซื้อ</a></li>
                <li><a href="contact.html">ที่อยู่ติดต่อ</a></li>
            </div>
            <div class="nav-right" id="nav-auth"></div>
        </ul>
    </nav>

    <section class="best-seller">
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/1.jpg" alt="แม่มขนนกขาว">
            <h3>แม่มขนนกขาว</h3>
            <p>ราคา: <span>40 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/2.jpg" alt="หูกระต่าย">
            <h3>หูกระต่าย</h3>
            <p>ราคา: <span>25 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/3.jpg" alt="ฮาโวเทีย">
            <h3>ฮาโวเทีย คูเปอไร</h3>
            <p>ราคา: <span>40 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/4.jpg" alt="แม่มปุยหิมะ">
            <h3>แม่มปุยหิมะ</h3>
            <p>ราคา: <span>65 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/5.jpg" alt="กระบองเพชร ถังทอง">
            <h3>กระบองเพชร ถังทอง</h3>
            <p>ราคา: <span>105 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/6.jpg" alt="เปโยตี">
            <h3>เปโยตี</h3>
            <p>ราคา: <span>80 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/7.jpg" alt="ยิมโนด่าง">
            <h3>ยิมโนด่าง</h3>
            <p>ราคา: <span>75 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/8.jpg" alt="แอสโตรไฟตัม">
            <h3>แอสโตรไฟตัม</h3>
            <p>ราคา: <span>50 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/9.jpg" alt="ยิมโนคาไลเซียม">
            <h3>ยิมโนคาไลเซียม มิฮาโนวิชชิอาย</h3>
            <p>ราคา: <span>35 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/10.jpg" alt="ต้นกุหลาบหิน">
            <h3>ต้นกุหลาบหิน</h3>
            <p>ราคา: <span>25 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/11.jpg" alt="แม่มตุ๊กตากี่ปุ่น">
            <h3>แม่มตุ๊กตากี่ปุ่น</h3>
            <p>ราคา: <span>25 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/12.jpg" alt="ยิมโนจานบิน">
            <h3>ยิมโนจานบิน</h3>
            <p>ราคา: <span>55 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/13.jpg" alt="แม่มเข็มทอง">
            <h3>แม่มเข็มทอง</h3>
            <p>ราคา: <span>65 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/14.jpg" alt="หมวกสังฆราช">
            <h3>หมวกสังฆราช</h3>
            <p>ราคา: <span>95 บาท</span></p>
        </div>
        <div class="product">
            <div class="badge">ขายดี</div>
            <img src="img/15.jpg" alt="แม่มขนนกเหลือง">
            <h3>แม่มขนนกเหลือง</h3>
            <p>ราคา: <span>70 บาท</span></p>
        </div>
    </section>

    <footer>
        <div class="contact-info">
            <p><i class="fas fa-phone-alt"></i> โทร: 096-184-5747</p> 
            <p><i class="fab fa-line"></i> Line ID: tanggamer0987</p>
            <p><i class="fas fa-map-marker-alt"></i> ตำบลปางิ้ว อำเภอเวียงป่าเป้า จ.เชียงราย</p>
        </div>
    </footer>

    <script>
        (function() {
            var navAuth = document.getElementById('nav-auth');
            var isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
            var username = localStorage.getItem('username');
            if (isLoggedIn && username) {
                navAuth.innerHTML = '<li><a href="#">สวัสดี, ' + username + '</a></li><li><a href="#" onclick="logout(); return false;" style="color:#e74c3c;">ออกจากระบบ</a></li>';
            } else {
                navAuth.innerHTML = '<li><a href="login.php">เข้าสู่ระบบ</a></li>';
            }
        })();
        function logout() {
            localStorage.clear();
            window.location.href = 'login.php';
        }
    </script>
</body>
</html>