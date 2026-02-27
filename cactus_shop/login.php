<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ | 🌵 Cactus Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .login-header.admin-mode {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .login-header i {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .login-header h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .login-body {
            padding: 2rem;
        }

        .role-selector {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .role-btn {
            flex: 1;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .role-btn:hover {
            border-color: #27ae60;
            background: #f0fff4;
        }

        .role-btn.active {
            border-color: #27ae60;
            background: #d1fae5;
        }

        .role-btn.admin-active {
            border-color: #e74c3c;
            background: #fee2e2;
        }

        .role-btn i {
            font-size: 2rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        .role-btn.active i {
            color: #27ae60;
        }

        .role-btn.admin-active i {
            color: #e74c3c;
        }

        .tab-buttons {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e0e0e0;
        }

        .tab-btn {
            flex: 1;
            padding: 1rem;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            color: #7f8c8d;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .tab-btn.active {
            color: #27ae60;
            border-bottom-color: #27ae60;
        }

        .tab-btn.admin-active {
            color: #e74c3c;
            border-bottom-color: #e74c3c;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 500;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            pointer-events: none;
        }

        .input-wrapper i.password-toggle {
            pointer-events: auto;
            left: unset;
            right: 15px;
            cursor: pointer;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .input-wrapper.has-toggle input {
            padding-right: 45px;
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #27ae60;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .submit-btn.admin-btn {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #229954, #1e8449);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 204, 113, 0.4);
        }

        .submit-btn.admin-btn:hover {
            background: linear-gradient(135deg, #c0392b, #a93226);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .back-home {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e0e0e0;
        }

        .back-home a {
            color: #27ae60;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
            animation: fadeIn 0.3s;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }

        .password-toggle:hover {
            color: #27ae60;
        }

        /* Admin Dashboard Styles */
        .admin-dashboard {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #f5f6fa;
            overflow: hidden;
        }

        .admin-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 1.5rem 0;
            overflow-y: auto;
        }

        .admin-logo {
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }

        .admin-logo h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.3rem;
        }

        .admin-logo .admin-name {
            font-size: 0.85rem;
            color: #95a5a6;
            margin-top: 0.5rem;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0.25rem 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 1rem 1.5rem;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255,255,255,0.1);
            border-left: 3px solid #e74c3c;
            padding-left: calc(1.5rem - 3px);
        }

        .sidebar-menu i {
            font-size: 1.2rem;
            width: 25px;
        }

        .admin-main {
            margin-left: 250px;
            padding: 2rem;
            height: 100vh;
            overflow-y: auto;
        }

        .admin-header {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .admin-header h1 {
            color: #2c3e50;
            font-size: 1.8rem;
        }

        .btn-logout {
            background: #e74c3c;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.blue { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .stat-icon.green { background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); color: white; }
        .stat-icon.red { background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); color: white; }
        .stat-icon.orange { background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); color: white; }

        .stat-info h3 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 0.25rem;
        }

        .stat-info p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .admin-section {
            display: none;
        }

        .admin-section.active {
            display: block;
        }

        .content-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #ecf0f1;
        }

        .content-header h2 {
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-add {
            background: #27ae60;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-add:hover {
            background: #229954;
            transform: translateY(-2px);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #e0e0e0;
        }

        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid #ecf0f1;
        }

        .data-table tr:hover {
            background: #f8f9fa;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 0.5rem;
            transition: all 0.3s;
        }

        .btn-edit {
            background: #3498db;
            color: white;
        }

        .btn-edit:hover {
            background: #2980b9;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        .btn-view {
            background: #9b59b6;
            color: white;
        }

        .btn-view:hover {
            background: #8e44ad;
        }

        .badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin {
            background: #fee2e2;
            color: #e74c3c;
        }

        .badge-user {
            background: #d1fae5;
            color: #10b981;
        }

        .badge-pending {
            background: #fef3c7;
            color: #f59e0b;
        }

        .badge-confirmed {
            background: #dbeafe;
            color: #3b82f6;
        }

        .badge-completed {
            background: #d1fae5;
            color: #10b981;
        }

        .badge-cancelled {
            background: #fee2e2;
            color: #ef4444;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #ecf0f1;
        }

        .modal-header h3 {
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #95a5a6;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: #e74c3c;
        }

        .product-image-preview {
            width: 100%;
            max-width: 300px;
            height: 200px;
            border: 2px dashed #e0e0e0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1rem 0;
            overflow: hidden;
        }

        .product-image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .product-image-preview .placeholder {
            color: #95a5a6;
            text-align: center;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #7f8c8d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .search-box {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
        }

        @media (max-width: 768px) {
            .admin-sidebar {
                width: 0;
                overflow: hidden;
            }

            .admin-main {
                margin-left: 0;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Login Container -->
    <div class="login-container" id="login-container">
        <div class="login-header" id="login-header">
            <i class="fas fa-seedling"></i>
            <h1>🌵 Cactus Shop</h1>
            <p id="header-subtitle">ยินดีต้อนรับ</p>
        </div>

        <div class="login-body">
            <!-- Alert Messages -->
            <div class="alert alert-success" id="alert-success">
                <i class="fas fa-check-circle"></i>
                <span id="success-message"></span>
            </div>
            <div class="alert alert-error" id="alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <span id="error-message"></span>
            </div>

            <!-- Role Selector -->
            <div class="role-selector">
                <div class="role-btn active" onclick="selectRole('user')">
                    <i class="fas fa-user"></i>
                    <div><strong>ผู้ใช้ทั่วไป</strong></div>
                </div>
                <div class="role-btn" onclick="selectRole('admin')">
                    <i class="fas fa-user-shield"></i>
                    <div><strong>ผู้ดูแลระบบ</strong></div>
                </div>
            </div>

            <!-- Tab Buttons -->
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="switchTab('login')">
                    <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
                </button>
                <button class="tab-btn" onclick="switchTab('register')" id="register-tab-btn">
                    <i class="fas fa-user-plus"></i> สมัครสมาชิก
                </button>
            </div>

            <!-- Login Tab -->
            <div class="tab-content active" id="login-tab">
                <form id="login-form">
                    <div class="form-group">
                        <label for="login-username">ชื่อผู้ใช้</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="login-username" placeholder="กรอกชื่อผู้ใช้" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="login-password">รหัสผ่าน</label>
                        <div class="input-wrapper has-toggle">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="login-password" placeholder="กรอกรหัสผ่าน" required>
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('login-password', event)"></i>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn" id="login-submit-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>เข้าสู่ระบบ</span>
                    </button>
                </form>
            </div>

            <!-- Register Tab -->
            <div class="tab-content" id="register-tab">
                <form id="register-form">
                    <div class="form-group">
                        <label for="register-username">ชื่อผู้ใช้</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="register-username" placeholder="กรอกชื่อผู้ใช้" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="register-email">อีเมล</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="register-email" placeholder="กรอกอีเมล" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="register-password">รหัสผ่าน</label>
                        <div class="input-wrapper has-toggle">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="register-password" placeholder="กรอกรหัสผ่าน" required>
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('register-password', event)"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="register-password-confirm">ยืนยันรหัสผ่าน</label>
                        <div class="input-wrapper has-toggle">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="register-password-confirm" placeholder="กรอกรหัสผ่านอีกครั้ง" required>
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('register-password-confirm', event)"></i>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-user-plus"></i>
                        <span>สมัครสมาชิก</span>
                    </button>
                </form>
            </div>

            <div class="back-home">
                <a href="index.php">
                    <i class="fas fa-home"></i>
                    กลับสู่หน้าหลัก
                </a>
            </div>
        </div>
    </div>

    <!-- Admin Dashboard -->
    <div class="admin-dashboard" id="admin-dashboard">
        <!-- Sidebar -->
        <div class="admin-sidebar">
            <div class="admin-logo">
                <h2><i class="fas fa-shield-alt"></i> Admin Panel</h2>
                <div class="admin-name">👋 สวัสดี, <span id="admin-username">Admin</span></div>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active" onclick="showSection('dashboard')"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                <li><a href="#" onclick="showSection('products')"><i class="fas fa-box"></i> จัดการสินค้า</a></li>
                <li><a href="#" onclick="showSection('orders')"><i class="fas fa-shopping-cart"></i> คำสั่งซื้อ</a></li>
                <li><a href="#" onclick="showSection('users')"><i class="fas fa-users"></i> จัดการผู้ใช้</a></li>
                <li><a href="#" onclick="showSection('settings')"><i class="fas fa-cog"></i> ตั้งค่า</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="admin-main">
            <div class="admin-header">
                <h1 id="page-title">Dashboard</h1>
                <button class="btn-logout" onclick="adminLogout()">
                    <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                </button>
            </div>

            <!-- Dashboard Section -->
            <div class="admin-section active" id="section-dashboard">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="stat-products">0</h3>
                            <p>สินค้าทั้งหมด</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="stat-orders">0</h3>
                            <p>คำสั่งซื้อ</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="stat-users">0</h3>
                            <p>ผู้ใช้ทั้งหมด</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon red">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-info">
                            <h3 id="stat-revenue">฿0</h3>
                            <p>ยอดขายทั้งหมด</p>
                        </div>
                    </div>
                </div>

                <div class="content-card">
                    <div class="content-header">
                        <h2><i class="fas fa-chart-bar"></i> สรุปภาพรวม</h2>
                    </div>
                    <p style="color: #7f8c8d; line-height: 1.8;">
                        ยินดีต้อนรับสู่ระบบจัดการร้านค้า Cactus Shop 🌵<br>
                        คุณสามารถจัดการสินค้า คำสั่งซื้อ และผู้ใช้ได้ทั้งหมดในระบบนี้<br>
                        <strong>สิทธิ์ของแอดมิน:</strong> เพิ่ม/แก้ไข/ลบสินค้า, จัดการคำสั่งซื้อ, จัดการผู้ใช้
                    </p>
                </div>
            </div>

            <!-- Products Section -->
            <div class="admin-section" id="section-products">
                <div class="content-card">
                    <div class="content-header">
                        <h2><i class="fas fa-box"></i> จัดการสินค้า</h2>
                        <button class="btn-add" onclick="openAddProductModal()">
                            <i class="fas fa-plus"></i> เพิ่มสินค้าใหม่
                        </button>
                    </div>

                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="product-search" placeholder="ค้นหาสินค้า..." onkeyup="searchProducts()">
                    </div>

                    <div id="products-table-container">
                        <!-- Dynamic content -->
                    </div>
                </div>
            </div>

            <!-- Orders Section -->
            <div class="admin-section" id="section-orders">
                <div class="content-card">
                    <div class="content-header">
                        <h2><i class="fas fa-shopping-cart"></i> คำสั่งซื้อทั้งหมด</h2>
                    </div>

                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="order-search" placeholder="ค้นหาคำสั่งซื้อ..." onkeyup="searchOrders()">
                    </div>

                    <div id="orders-table-container">
                        <!-- Dynamic content -->
                    </div>
                </div>
            </div>

            <!-- Users Section -->
            <div class="admin-section" id="section-users">
                <div class="content-card">
                    <div class="content-header">
                        <h2><i class="fas fa-users"></i> จัดการผู้ใช้</h2>
                    </div>

                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="user-search" placeholder="ค้นหาผู้ใช้..." onkeyup="searchUsers()">
                    </div>

                    <div id="users-table-container">
                        <!-- Dynamic content -->
                    </div>
                </div>
            </div>

            <!-- Settings Section -->
            <div class="admin-section" id="section-settings">
                <div class="content-card">
                    <div class="content-header">
                        <h2><i class="fas fa-cog"></i> ตั้งค่าระบบ</h2>
                    </div>
                    <div class="form-group">
                        <label>ชื่อร้านค้า</label>
                        <div class="input-wrapper">
                            <i class="fas fa-store"></i>
                            <input type="text" value="Cactus Shop" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>เวอร์ชั่นระบบ</label>
                        <div class="input-wrapper">
                            <i class="fas fa-code-branch"></i>
                            <input type="text" value="2.0.0" readonly>
                        </div>
                    </div>
                    <button class="submit-btn">
                        <i class="fas fa-save"></i> บันทึกการตั้งค่า
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Product Modal -->
    <div class="modal" id="product-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="product-modal-title"><i class="fas fa-plus"></i> เพิ่มสินค้าใหม่</h3>
                <button class="modal-close" onclick="closeProductModal()">×</button>
            </div>
            <form id="product-form">
                <input type="hidden" id="product-id">
                <div class="form-group">
                    <label>ชื่อสินค้า</label>
                    <div class="input-wrapper">
                        <i class="fas fa-tag"></i>
                        <input type="text" id="product-name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>ราคา (บาท)</label>
                    <div class="input-wrapper">
                        <i class="fas fa-dollar-sign"></i>
                        <input type="number" id="product-price" min="0" step="0.01" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>หมวดหมู่</label>
                    <div class="input-wrapper">
                        <i class="fas fa-folder"></i>
                        <input type="text" id="product-category" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>คำอธิบาย</label>
                    <div class="input-wrapper">
                        <i class="fas fa-align-left"></i>
                        <textarea id="product-description" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>URL รูปภาพ</label>
                    <div class="input-wrapper">
                        <i class="fas fa-image"></i>
                        <input type="url" id="product-image" placeholder="https://..." required>
                    </div>
                </div>
                <div class="product-image-preview" id="product-preview">
                    <div class="placeholder">
                        <i class="fas fa-image"></i><br>
                        ตัวอย่างรูปภาพ
                    </div>
                </div>
                <div class="form-group">
                    <label>จำนวนในสต็อก</label>
                    <div class="input-wrapper">
                        <i class="fas fa-boxes"></i>
                        <input type="number" id="product-stock" min="0" value="10" required>
                    </div>
                </div>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> บันทึกสินค้า
                </button>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal" id="user-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-user-edit"></i> แก้ไขข้อมูลผู้ใช้</h3>
                <button class="modal-close" onclick="closeUserModal()">×</button>
            </div>
            <form id="user-form">
                <input type="hidden" id="user-id">
                <div class="form-group">
                    <label>ชื่อผู้ใช้</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" id="user-username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>อีเมล</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="user-email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>รหัสผ่านใหม่ (เว้นว่างหากไม่ต้องการเปลี่ยน)</label>
                    <div class="input-wrapper has-toggle">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="user-password" placeholder="เว้นว่างไว้หากไม่ต้องการเปลี่ยน">
                        <i class="fas fa-eye password-toggle" onclick="togglePassword('user-password', event)"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>ประเภทผู้ใช้</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-tag"></i>
                        <select id="user-role">
                            <option value="user">ผู้ใช้ทั่วไป</option>
                            <option value="admin">ผู้ดูแลระบบ</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> บันทึกการแก้ไข
                </button>
            </form>
        </div>
    </div>

    <!-- Order Detail Modal -->
    <div class="modal" id="order-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-receipt"></i> รายละเอียดคำสั่งซื้อ</h3>
                <button class="modal-close" onclick="closeOrderModal()">×</button>
            </div>
            <div id="order-detail-content">
                <!-- Dynamic content -->
            </div>
        </div>
    </div>

    <script>
        // Initialize system with default data
        function initializeSystem() {
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const products = JSON.parse(localStorage.getItem('products')) || [];
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            
            // Create default admin if not exists
            const adminExists = users.some(u => u.role === 'admin');
            if (!adminExists) {
                users.push({
                    username: 'admin',
                    email: 'admin@cactusshop.com',
                    password: 'admin123',
                    role: 'admin',
                    registeredDate: new Date().toISOString()
                });
                localStorage.setItem('users', JSON.stringify(users));
            }

            // Create sample products if empty
            if (products.length === 0) {
                const sampleProducts = [
                    {
                        id: Date.now() + 1,
                        name: 'กระบองเพชร Golden Barrel',
                        price: 299,
                        category: 'กระบองเพชร',
                        description: 'กระบองเพชรรูปทรงกลม เจริญเติบโตช้า เหมาะสำหรับมือใหม่',
                        image: 'https://images.unsplash.com/photo-1509223197845-458d87525a57?w=400',
                        stock: 15,
                        createdDate: new Date().toISOString()
                    },
                    {
                        id: Date.now() + 2,
                        name: 'Succulent Mixed Set',
                        price: 450,
                        category: 'ไม้อวบน้ำ',
                        description: 'ชุดไม้อวบน้ำนานาชนิด บรรจุ 5 ต้น',
                        image: 'https://images.unsplash.com/photo-1459156212016-c812468e2115?w=400',
                        stock: 20,
                        createdDate: new Date().toISOString()
                    }
                ];
                localStorage.setItem('products', JSON.stringify(sampleProducts));
            }

            // Create sample orders if empty
            if (orders.length === 0 && users.length > 1) {
                const sampleOrders = [
                    {
                        id: 'ORD' + Date.now(),
                        username: users[1].username,
                        items: products.slice(0, 1).map(p => ({...p, quantity: 2})),
                        total: products[0] ? products[0].price * 2 : 0,
                        status: 'pending',
                        orderDate: new Date().toISOString()
                    }
                ];
                localStorage.setItem('orders', JSON.stringify(sampleOrders));
            }
        }

        initializeSystem();

        let currentRole = 'user';

        function selectRole(role) {
            currentRole = role;
            const roleBtns = document.querySelectorAll('.role-btn');
            const header = document.getElementById('login-header');
            const subtitle = document.getElementById('header-subtitle');
            const loginBtn = document.getElementById('login-submit-btn');
            const registerTabBtn = document.getElementById('register-tab-btn');
            
            roleBtns.forEach(btn => {
                btn.classList.remove('active', 'admin-active');
            });
            
            if (role === 'admin') {
                roleBtns[1].classList.add('admin-active');
                header.classList.add('admin-mode');
                subtitle.textContent = 'เข้าสู่ระบบผู้ดูแล';
                loginBtn.classList.add('admin-btn');
                registerTabBtn.style.display = 'none';
                switchTab('login');
            } else {
                roleBtns[0].classList.add('active');
                header.classList.remove('admin-mode');
                subtitle.textContent = 'ยินดีต้อนรับ';
                loginBtn.classList.remove('admin-btn');
                registerTabBtn.style.display = 'block';
            }
        }

        function switchTab(tab) {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active', 'admin-active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            if (tab === 'login') {
                const tabBtn = document.querySelector('.tab-btn:first-child');
                tabBtn.classList.add(currentRole === 'admin' ? 'admin-active' : 'active');
                document.getElementById('login-tab').classList.add('active');
            } else {
                document.querySelector('.tab-btn:last-child').classList.add('active');
                document.getElementById('register-tab').classList.add('active');
            }

            hideAlerts();
        }

        function togglePassword(inputId, event) {
            event.stopPropagation();
            const input = document.getElementById(inputId);
            const icon = event.target;
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function showAlert(type, message) {
            hideAlerts();
            const alertElement = document.getElementById(`alert-${type}`);
            const messageElement = document.getElementById(`${type}-message`);
            
            messageElement.textContent = message;
            alertElement.style.display = 'block';

            setTimeout(() => {
                alertElement.style.display = 'none';
            }, 5000);
        }

        function hideAlerts() {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.style.display = 'none';
            });
        }

        // Login Form
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const username = document.getElementById('login-username').value.trim();
            const password = document.getElementById('login-password').value;

            const users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users.find(u => u.username === username && u.password === password);

            if (user) {
                if (currentRole === 'admin' && user.role !== 'admin') {
                    showAlert('error', 'คุณไม่มีสิทธิ์เข้าถึงส่วนผู้ดูแลระบบ');
                    return;
                }

                if (currentRole === 'user' && user.role === 'admin') {
                    showAlert('error', 'กรุณาเข้าสู่ระบบในโหมดผู้ดูแล');
                    return;
                }

                if (user.role === 'admin') {
                    // Session แยกสำหรับ Admin
                    localStorage.setItem('admin_session', JSON.stringify({
                        isLoggedIn: true,
                        username: username,
                        email: user.email,
                        role: 'admin'
                    }));
                } else {
                    // Session แยกสำหรับ User
                    localStorage.setItem('user_session', JSON.stringify({
                        isLoggedIn: true,
                        username: username,
                        email: user.email,
                        role: 'user'
                    }));
                }

                showAlert('success', 'เข้าสู่ระบบสำเร็จ!');

                setTimeout(() => {
                    if (user.role === 'admin') {
                        showAdminDashboard();
                    } else {
                        window.location.href = 'index.php';
                    }
                }, 1000);
            } else {
                showAlert('error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
            }
        });

        // Register Form
        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const username = document.getElementById('register-username').value.trim();
            const email = document.getElementById('register-email').value.trim();
            const password = document.getElementById('register-password').value;
            const passwordConfirm = document.getElementById('register-password-confirm').value;

            if (password !== passwordConfirm) {
                showAlert('error', 'รหัสผ่านไม่ตรงกัน กรุณาลองใหม่');
                return;
            }

            if (password.length < 6) {
                showAlert('error', 'รหัสผ่านต้องมีความยาวอย่างน้อย 6 ตัวอักษร');
                return;
            }

            const users = JSON.parse(localStorage.getItem('users')) || [];
            const existingUser = users.find(u => u.username === username);

            if (existingUser) {
                showAlert('error', 'ชื่อผู้ใช้นี้ถูกใช้แล้ว กรุณาเลือกชื่ออื่น');
                return;
            }

            const newUser = {
                username: username,
                email: email,
                password: password,
                role: 'user',
                registeredDate: new Date().toISOString()
            };

            users.push(newUser);
            localStorage.setItem('users', JSON.stringify(users));

            showAlert('success', 'สมัครสมาชิกสำเร็จ! กรุณาเข้าสู่ระบบ');
            document.getElementById('register-form').reset();

            setTimeout(() => {
                switchTab('login');
                document.getElementById('login-username').value = username;
            }, 2000);
        });

        // Admin Dashboard Functions
        function showAdminDashboard() {
            document.getElementById('login-container').style.display = 'none';
            document.getElementById('admin-dashboard').style.display = 'block';
            const adminSession = JSON.parse(localStorage.getItem('admin_session') || '{}');
            document.getElementById('admin-username').textContent = adminSession.username || 'Admin';
            updateDashboardStats();
            loadProducts();
            loadOrders();
            loadUsers();
        }

        function showSection(section) {
            document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
            event.target.classList.add('active');
            
            document.querySelectorAll('.admin-section').forEach(s => s.classList.remove('active'));
            document.getElementById(`section-${section}`).classList.add('active');
            
            const titles = {
                'dashboard': 'Dashboard',
                'products': 'จัดการสินค้า',
                'orders': 'คำสั่งซื้อ',
                'users': 'จัดการผู้ใช้',
                'settings': 'ตั้งค่า'
            };
            document.getElementById('page-title').textContent = titles[section];

            if (section === 'products') loadProducts();
            if (section === 'orders') loadOrders();
            if (section === 'users') loadUsers();
        }

        function updateDashboardStats() {
            const products = JSON.parse(localStorage.getItem('products')) || [];
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const users = JSON.parse(localStorage.getItem('users')) || [];
            
            const totalRevenue = orders.reduce((sum, order) => sum + order.total, 0);
            
            document.getElementById('stat-products').textContent = products.length;
            document.getElementById('stat-orders').textContent = orders.length;
            document.getElementById('stat-users').textContent = users.length;
            document.getElementById('stat-revenue').textContent = '฿' + totalRevenue.toLocaleString();
        }

        // Product Management
        function loadProducts() {
            const products = JSON.parse(localStorage.getItem('products')) || [];
            const container = document.getElementById('products-table-container');
            
            if (products.length === 0) {
                container.innerHTML = '<div class="empty-state"><i class="fas fa-box-open"></i><p>ยังไม่มีสินค้าในระบบ</p></div>';
                return;
            }

            let html = '<table class="data-table"><thead><tr>';
            html += '<th>รูปภาพ</th><th>ชื่อสินค้า</th><th>ราคา</th><th>หมวดหมู่</th><th>สต็อก</th><th>จัดการ</th>';
            html += '</tr></thead><tbody>';

            products.forEach((product, index) => {
                html += `<tr>
                    <td><img src="${product.image}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;"></td>
                    <td><strong>${product.name}</strong></td>
                    <td>฿${product.price.toLocaleString()}</td>
                    <td>${product.category}</td>
                    <td>${product.stock}</td>
                    <td>
                        <button class="action-btn btn-edit" onclick="editProduct(${index})"><i class="fas fa-edit"></i> แก้ไข</button>
                        <button class="action-btn btn-delete" onclick="deleteProduct(${index})"><i class="fas fa-trash"></i> ลบ</button>
                    </td>
                </tr>`;
            });

            html += '</tbody></table>';
            container.innerHTML = html;
        }

        function searchProducts() {
            const searchTerm = document.getElementById('product-search').value.toLowerCase();
            const products = JSON.parse(localStorage.getItem('products')) || [];
            const filtered = products.filter(p => 
                p.name.toLowerCase().includes(searchTerm) || 
                p.category.toLowerCase().includes(searchTerm)
            );
            
            // Display filtered products (simplified for demo)
            loadProducts();
        }

        function openAddProductModal() {
            document.getElementById('product-modal-title').innerHTML = '<i class="fas fa-plus"></i> เพิ่มสินค้าใหม่';
            document.getElementById('product-form').reset();
            document.getElementById('product-id').value = '';
            document.getElementById('product-preview').innerHTML = '<div class="placeholder"><i class="fas fa-image"></i><br>ตัวอย่างรูปภาพ</div>';
            document.getElementById('product-modal').classList.add('active');
        }

        function editProduct(index) {
            const products = JSON.parse(localStorage.getItem('products')) || [];
            const product = products[index];
            
            document.getElementById('product-modal-title').innerHTML = '<i class="fas fa-edit"></i> แก้ไขสินค้า';
            document.getElementById('product-id').value = index;
            document.getElementById('product-name').value = product.name;
            document.getElementById('product-price').value = product.price;
            document.getElementById('product-category').value = product.category;
            document.getElementById('product-description').value = product.description;
            document.getElementById('product-image').value = product.image;
            document.getElementById('product-stock').value = product.stock;
            
            document.getElementById('product-preview').innerHTML = `<img src="${product.image}" alt="${product.name}">`;
            document.getElementById('product-modal').classList.add('active');
        }

        function deleteProduct(index) {
            if (!confirm('คุณแน่ใจหรือไม่ที่จะลบสินค้านี้?')) return;
            
            const products = JSON.parse(localStorage.getItem('products')) || [];
            products.splice(index, 1);
            localStorage.setItem('products', JSON.stringify(products));
            
            loadProducts();
            updateDashboardStats();
            alert('ลบสินค้าสำเร็จ');
        }

        function closeProductModal() {
            document.getElementById('product-modal').classList.remove('active');
        }

        document.getElementById('product-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const products = JSON.parse(localStorage.getItem('products')) || [];
            const index = document.getElementById('product-id').value;
            
            const productData = {
                id: index ? products[index].id : Date.now(),
                name: document.getElementById('product-name').value,
                price: parseFloat(document.getElementById('product-price').value),
                category: document.getElementById('product-category').value,
                description: document.getElementById('product-description').value,
                image: document.getElementById('product-image').value,
                stock: parseInt(document.getElementById('product-stock').value),
                createdDate: index ? products[index].createdDate : new Date().toISOString()
            };

            if (index) {
                products[index] = productData;
            } else {
                products.push(productData);
            }

            localStorage.setItem('products', JSON.stringify(products));
            closeProductModal();
            loadProducts();
            updateDashboardStats();
            alert(index ? 'แก้ไขสินค้าสำเร็จ' : 'เพิ่มสินค้าสำเร็จ');
        });

        // Preview image when URL changes
        document.getElementById('product-image').addEventListener('input', function() {
            const url = this.value;
            const preview = document.getElementById('product-preview');
            if (url) {
                preview.innerHTML = `<img src="${url}" onerror="this.parentElement.innerHTML='<div class=\\'placeholder\\'><i class=\\'fas fa-exclamation-triangle\\'></i><br>ไม่สามารถโหลดรูปภาพ</div>'">`;
            }
        });

        // Order Management
        function loadOrders() {
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const container = document.getElementById('orders-table-container');
            
            if (orders.length === 0) {
                container.innerHTML = '<div class="empty-state"><i class="fas fa-shopping-cart"></i><p>ยังไม่มีคำสั่งซื้อในระบบ</p></div>';
                return;
            }

            let html = '<table class="data-table"><thead><tr>';
            html += '<th>รหัสคำสั่งซื้อ</th><th>ผู้สั่งซื้อ</th><th>ยอดรวม</th><th>สถานะ</th><th>วันที่</th><th>จัดการ</th>';
            html += '</tr></thead><tbody>';

            orders.forEach((order, index) => {
                const statusBadge = {
                    'pending': 'badge-pending',
                    'confirmed': 'badge-confirmed',
                    'completed': 'badge-completed',
                    'cancelled': 'badge-cancelled'
                };
                const statusText = {
                    'pending': 'รอดำเนินการ',
                    'confirmed': 'ยืนยันแล้ว',
                    'completed': 'เสร็จสิ้น',
                    'cancelled': 'ยกเลิก'
                };

                html += `<tr>
                    <td><strong>${order.id}</strong></td>
                    <td>${order.username}</td>
                    <td>฿${order.total.toLocaleString()}</td>
                    <td><span class="badge ${statusBadge[order.status]}">${statusText[order.status]}</span></td>
                    <td>${new Date(order.orderDate).toLocaleDateString('th-TH')}</td>
                    <td>
                        <button class="action-btn btn-view" onclick="viewOrder(${index})"><i class="fas fa-eye"></i> ดู</button>
                        <button class="action-btn btn-delete" onclick="deleteOrder(${index})"><i class="fas fa-trash"></i> ลบ</button>
                    </td>
                </tr>`;
            });

            html += '</tbody></table>';
            container.innerHTML = html;
        }

        function searchOrders() {
            loadOrders(); // Simplified for demo
        }

        function viewOrder(index) {
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const order = orders[index];
            
            let html = '<div style="padding: 1rem;">';
            html += `<p><strong>รหัสคำสั่งซื้อ:</strong> ${order.id}</p>`;
            html += `<p><strong>ผู้สั่งซื้อ:</strong> ${order.username}</p>`;
            html += `<p><strong>วันที่:</strong> ${new Date(order.orderDate).toLocaleString('th-TH')}</p>`;
            html += '<hr style="margin: 1rem 0;"><h4>รายการสินค้า:</h4><ul style="list-style: none; padding: 0;">';
            
            order.items.forEach(item => {
                html += `<li style="margin: 0.5rem 0;">- ${item.name} x${item.quantity} = ฿${(item.price * item.quantity).toLocaleString()}</li>`;
            });
            
            html += `</ul><hr style="margin: 1rem 0;"><h3>ยอดรวม: ฿${order.total.toLocaleString()}</h3>`;
            html += '<div style="margin-top: 1.5rem;"><label>เปลี่ยนสถานะ:</label><select id="order-status-change" style="width: 100%; padding: 0.75rem; margin-top: 0.5rem; border: 2px solid #e0e0e0; border-radius: 8px;">';
            html += '<option value="pending">รอดำเนินการ</option>';
            html += '<option value="confirmed">ยืนยันแล้ว</option>';
            html += '<option value="completed">เสร็จสิ้น</option>';
            html += '<option value="cancelled">ยกเลิก</option>';
            html += '</select></div>';
            html += `<button class="submit-btn" style="margin-top: 1rem;" onclick="updateOrderStatus(${index})"><i class="fas fa-save"></i> อัปเดตสถานะ</button>`;
            html += '</div>';
            
            document.getElementById('order-detail-content').innerHTML = html;
            document.getElementById('order-status-change').value = order.status;
            document.getElementById('order-modal').classList.add('active');
        }

        function updateOrderStatus(index) {
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            const newStatus = document.getElementById('order-status-change').value;
            orders[index].status = newStatus;
            localStorage.setItem('orders', JSON.stringify(orders));
            closeOrderModal();
            loadOrders();
            alert('อัปเดตสถานะสำเร็จ');
        }

        function deleteOrder(index) {
            if (!confirm('คุณแน่ใจหรือไม่ที่จะลบคำสั่งซื้อนี้?')) return;
            
            const orders = JSON.parse(localStorage.getItem('orders')) || [];
            orders.splice(index, 1);
            localStorage.setItem('orders', JSON.stringify(orders));
            loadOrders();
            updateDashboardStats();
            alert('ลบคำสั่งซื้อสำเร็จ');
        }

        function closeOrderModal() {
            document.getElementById('order-modal').classList.remove('active');
        }

        // User Management
        function loadUsers() {
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const container = document.getElementById('users-table-container');
            
            let html = '<table class="data-table"><thead><tr>';
            html += '<th>ชื่อผู้ใช้</th><th>อีเมล</th><th>ประเภท</th><th>วันที่สมัคร</th><th>จัดการ</th>';
            html += '</tr></thead><tbody>';

            users.forEach((user, index) => {
                html += `<tr>
                    <td><strong>${user.username}</strong></td>
                    <td>${user.email}</td>
                    <td><span class="badge ${user.role === 'admin' ? 'badge-admin' : 'badge-user'}">${user.role === 'admin' ? 'ผู้ดูแล' : 'ผู้ใช้'}</span></td>
                    <td>${new Date(user.registeredDate).toLocaleDateString('th-TH')}</td>
                    <td>
                        <button class="action-btn btn-edit" onclick="editUser(${index})"><i class="fas fa-edit"></i> แก้ไข</button>
                        <button class="action-btn btn-delete" onclick="deleteUser(${index})"><i class="fas fa-trash"></i> ลบ</button>
                    </td>
                </tr>`;
            });

            html += '</tbody></table>';
            container.innerHTML = html;
        }

        function searchUsers() {
            loadUsers(); // Simplified for demo
        }

        function editUser(index) {
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const user = users[index];
            
            document.getElementById('user-id').value = index;
            document.getElementById('user-username').value = user.username;
            document.getElementById('user-email').value = user.email;
            document.getElementById('user-password').value = '';
            document.getElementById('user-role').value = user.role || 'user';
            
            document.getElementById('user-modal').classList.add('active');
        }

        function deleteUser(index) {
            if (!confirm('คุณแน่ใจหรือไม่ที่จะลบผู้ใช้นี้?')) return;
            
            const users = JSON.parse(localStorage.getItem('users')) || [];
            users.splice(index, 1);
            localStorage.setItem('users', JSON.stringify(users));
            loadUsers();
            updateDashboardStats();
            alert('ลบผู้ใช้สำเร็จ');
        }

        function closeUserModal() {
            document.getElementById('user-modal').classList.remove('active');
        }

        document.getElementById('user-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const users = JSON.parse(localStorage.getItem('users')) || [];
            const index = parseInt(document.getElementById('user-id').value);
            
            users[index].username = document.getElementById('user-username').value.trim();
            users[index].email = document.getElementById('user-email').value.trim();
            users[index].role = document.getElementById('user-role').value;
            
            const newPassword = document.getElementById('user-password').value;
            if (newPassword) {
                users[index].password = newPassword;
            }
            
            localStorage.setItem('users', JSON.stringify(users));
            closeUserModal();
            loadUsers();
            alert('แก้ไขข้อมูลผู้ใช้สำเร็จ');
        });

        function adminLogout() {
            localStorage.removeItem('admin_session');
            
            document.getElementById('admin-dashboard').style.display = 'none';
            document.getElementById('login-container').style.display = 'block';
            
            document.getElementById('login-form').reset();
            selectRole('user');
            switchTab('login');
        }

        // Check if already logged in as admin
        window.addEventListener('load', function() {
            const adminSession = JSON.parse(localStorage.getItem('admin_session') || 'null');
            if (adminSession && adminSession.isLoggedIn && adminSession.role === 'admin') {
                showAdminDashboard();
            }
        });

        // Close modals on backdrop click
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>