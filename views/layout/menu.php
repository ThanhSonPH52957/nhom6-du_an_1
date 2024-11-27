<!-- Start Header Area -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        background-color: #fff;
        max-width: 1200px;
        margin: 0 auto;
        padding: 10px;
        font-size: 14px;

    }

    .logo img {
        width: 60px;
        height: auto;
    }

    .main-nav {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .main-nav a {
        text-decoration: none;
        color: #000;
        font-size: 16px;
        position: relative;
        transition: color 0.3s;
    }

    .main-nav a:hover {
        color: #ffc107;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        z-index: 1000;
        min-width: 150px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        display: block;
        padding: 10px;
        color: #000;
        text-decoration: none;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-box {
        padding: 5px;
        border: 1px solid #d1b536;
        border-radius: 3px;
        font-size: 14px;
    }

    .header-button {
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
        background-color: #ffc107;
        color: #000;
        font-size: 14px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .header-button:hover {
        background-color: #e0a800;
        color: #fff;
    }

    .header-button a {
        text-decoration: none;
        color: inherit;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<header class="header-area header-wide">
    <div class="header-container">
        <a href="?act=/" class="logo">
            <img src="./assets/img/logo/LOGO.png" alt="PH Management Logo">
        </a>
        <nav class="main-nav">
            <a href="?act=/">Trang chủ</a>
            <div class="dropdown">
                <a href="?act=phong">Phòng</a>
                <div class="dropdown-content">
                    <a href="?act=danhmucphong&danh_muc_id=1">Phòng đơn</a>
                    <a href="?act=danhmucphong&danh_muc_id=2">Phòng đôi</a>
                    <a href="?act=danhmucphong&danh_muc_id=4">Phòng VIP</a>
                </div>
            </div>
            <a href="?act=dichvu">Dịch vụ</a>
            <a href="?act=lienhe">Liên hệ</a>
            <a href="?act=gioithieu">Giới thiệu</a>
        </nav>
        <div class="header-actions">
            <form action="?act=timphong" method="POST" style="display: flex; align-items: center;">
                <input type="text" placeholder="Tìm kiếm" name="search" class="search-box">
                <button type="submit" class="header-button">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button class="header-button"><a href="?act=datphong">Đặt phòng</a></button>
            <button class="header-button"><a href="?act=dangky">Đăng ký</a></button>
            <button class="header-button"><a href="?act=dangnhap">Đăng nhập</a></button>
        </div>
    </div>
</header>