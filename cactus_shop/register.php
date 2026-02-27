<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // แก้ SQL - ลบ $id ออก
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('สมัครสมาชิกสำเร็จ!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก | 🌵 Cactus Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Kanit', sans-serif; }
        
        body { 
            background: linear-gradient(135deg, #e0f2f1 0%, #b2dfdb 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
            padding: 20px;
        }
        
        .box { 
            background: white; 
            padding: 30px 40px; 
            border-radius: 20px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
            width: 100%; 
            max-width: 450px; 
            position: relative;
        }

        #backButton {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            font-size: 18px;
            padding: 5px;
            transition: 0.3s;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        #backButton:hover { color: #333; transform: translateX(-3px); }
        
        h2 { 
            text-align: center; 
            color: #2c3e50; 
            margin-top: 10px;
            margin-bottom: 25px; 
            font-weight: 500;
        }

        .field { margin-bottom: 18px; }
        .field label { display: block; margin-bottom: 8px; color: #555; font-size: 14px; }
        
        .input-group { position: relative; }
        
        .field input { 
            width: 100%; 
            padding: 12px 15px; 
            padding-right: 45px;
            border: 1px solid #ddd; 
            border-radius: 10px; 
            outline: none; 
            font-size: 15px;
            transition: 0.3s;
        }
        .field input:focus { border-color: #4db6ac; box-shadow: 0 0 8px rgba(77, 182, 172, 0.2); }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa;
            transition: 0.3s;
        }
        .toggle-password:hover { color: #4db6ac; }

        .btn { 
            width: 100%; 
            padding: 12px; 
            background-color: #28a745; 
            color: white; 
            border: none; 
            border-radius: 10px; 
            font-size: 16px; 
            font-weight: 500;
            cursor: pointer; 
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn:hover { background-color: #218838; transform: translateY(-2px); }

        .footer-link { text-align: center; margin-top: 25px; font-size: 14px; color: #777; }
        .footer-link a { color: #4db6ac; text-decoration: none; font-weight: 500; }
        .footer-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="box">
    <button id="backButton" onclick="window.location.href='index.php'">
        <i class="fas fa-arrow-left"></i>
    </button>

    <h2>สมัครสมาชิก</h2>
    
    <form action="register.php" method="POST" id="registerForm">
        <div class="field">
            <label>ชื่อ-นามสกุล</label>
            <input type="text" name="name" placeholder="ระบุชื่อของคุณ" required>
        </div>

        <div class="field">
            <label>อีเมล</label>
            <input type="email" name="email" placeholder="example@email.com" required>
        </div>
        
        <div class="field">
            <label>รหัสผ่าน</label>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="กรอกรหัสผ่าน" required minlength="6">
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
        </div>

        <div class="field">
            <label>ยืนยันรหัสผ่าน</label>
            <div class="input-group">
                <input type="password" id="confirm_password" placeholder="กรอกรหัสผ่านอีกครั้ง" required minlength="6">
                <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
            </div>
        </div>

        <button type="submit" class="btn">สร้างบัญชีผู้ใช้</button>
        
        <div class="footer-link">
            มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a>
        </div>
    </form>
</div>

<script>
    // ฟังก์ชันเปิด-ปิดตา
    function setupPasswordToggle(iconId, inputName) {
        const icon = document.getElementById(iconId);
        const input = document.querySelector(`input[name="${inputName}"], #${inputName}`);
        
        if (icon && input) {
            icon.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    }

    setupPasswordToggle('togglePassword', 'password');
    setupPasswordToggle('toggleConfirmPassword', 'confirm_password');

    // ตรวจสอบรหัสผ่านก่อนส่งฟอร์ม
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            e.preventDefault();
            alert("รหัสผ่านไม่ตรงกัน! กรุณาตรวจสอบอีกครั้ง");
            return false;
        }

        if (password.length < 6) {
            e.preventDefault();
            alert("รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร");
            return false;
        }
    });
</script>

</body>
</html>