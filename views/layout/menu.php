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
            <div class="dropdown">
                <?php if (isset($_SESSION['user_client'])) : ?>
                    <div class="header-4">
                        <svg width="24" height="24" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5 0C6.50896 0 0 6.50896 0 14.5C0 22.491 6.50896 29 14.5 29C22.491 29 29 22.491 29 14.5C29 6.50896 22.5063 0 14.5 0ZM14.5 1.06955C21.9104 1.06955 27.9305 7.08957 27.9305 14.5C27.9305 17.7392 26.7845 20.7034 24.8746 23.0258C24.3093 21.1006 23.148 19.3588 21.4979 18.0448C20.2908 17.0669 18.8699 16.3641 17.3419 15.9821C19.2366 14.9737 20.52 12.9721 20.52 10.6802C20.52 7.36459 17.8156 4.66017 14.5 4.66017C11.1844 4.66017 8.47998 7.33404 8.47998 10.6649C8.47998 12.9568 9.76344 14.9584 11.6581 15.9668C10.1301 16.3488 8.70917 17.0516 7.50211 18.0295C5.86723 19.3435 4.69073 21.0854 4.12539 23.0105C2.21549 20.6881 1.06955 17.7239 1.06955 14.4847C1.08483 7.08957 7.10485 1.06955 14.5 1.06955ZM14.5 15.6154C11.765 15.6154 9.54952 13.3999 9.54952 10.6649C9.54952 7.92993 11.765 5.71444 14.5 5.71444C17.235 5.71444 19.4505 7.92993 19.4505 10.6649C19.4505 13.3999 17.235 15.6154 14.5 15.6154ZM14.5 27.9152C10.7871 27.9152 7.42571 26.4025 4.99631 23.9578C5.40885 21.9868 6.52423 20.1839 8.17439 18.8546C9.9315 17.4489 12.1776 16.6697 14.5 16.6697C16.8224 16.6697 19.0685 17.4489 20.8256 18.8546C22.4758 20.1839 23.5911 21.9868 24.0037 23.9578C21.5743 26.4025 18.2129 27.9152 14.5 27.9152Z" fill="black"></path>
                        </svg>
                        <b><?php echo $_SESSION['user_client'] ?></b>
                        <div class="dropdown-content">
                            <a href="">Tài khoản</a>
                            <a href="">Phòng đã đặt</a>
                            <a href="?act=logout">Đăng xuất</a>
                        </div>
                    </div>
            </div> <?php else : ?>
            <button class="header-button"><a href="?act=dangky">Đăng ký</a></button>
            <button class="header-button"><a href="?act=dangnhap">Đăng nhập</a></button>

        <?php endif ?>
        </div>
    </div>
</header>