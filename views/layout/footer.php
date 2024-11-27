<!-- Scroll to top start -->
<!-- Scroll to Top End -->

<!-- footer area start -->
<style>
    footer {
        background-image: url("./assets/img/logo/footer.png");
        background-size: cover;
        background-position: center;
        background-color: #333;
        color: #ffffff;
        padding: 40px 0;
        font-size: 14px;
        font-family: Arial, sans-serif;
        position: relative;
    }

    footer::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
        z-index: 0;
    }

    .footer-container {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        flex-wrap: wrap;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    .footer-info,
    .footer-subscribe,
    .footer-payment {
        text-align: left;
        flex: 1 1 30%;
    }

    .footer-info strong,
    .footer-subscribe strong,
    .footer-payment strong {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .footer-info h3 {
        line-height: 1.6;
        color: #ffffff;

    }

    .footer-subscribe {
        margin-top: 10px;
    }

    .footer-subscribe form {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .footer-subscribe input[type="email"] {
        padding: 10px;
        border: none;
        border-radius: 5px 0 0 5px;
        outline: none;
        width: 200px;
    }

    .footer-subscribe button {
        padding: 10px 20px;
        background-color: #bfa14c;
        color: #333;
        border: none;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        font-weight: bold;
    }

    .footer-payment img {
        margin: 5px 10px 5px 5;
        width: 40px;
        vertical-align: middle;
    }

    .footer-about,
    .footer-news,
    .footer-policies {
        flex: 1 1 30%;

        max-width: 375px;
    }

    .footer-about h3,
    .footer-news h3,
    .footer-policies h3 {
        color: #ffffff;
    }

    .footer-about p,
    .footer-news p,
    .footer-policies ul {
        line-height: 1.5;
        margin: 10px 0;
    }

    .footer-about {
        max-width: 300px;
    }


    .footer-about p {
        text-align: center;
        line-height: 1.6;
        color: #ffffff;
    }

    .footer-about ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        color: white;

    }

    .footer-about li {
        color: white;
        font-weight: bold;
        margin-bottom: 5px;

    }

    .footer-about p {
        font-style: italic;
        color: #ffffff;
        margin-top: -5px;

    }
    .footer-news {
        margin-left: 50px;
    }

    .footer-news ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .footer-news li {
        color: white;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .footer-news p {
        font-style: italic;
        color: #ffffff;
        margin-top: 1px;
    }

    .footer-policies {
        text-align: center;
        margin-top: 40px;
    }

    .footer-payment {
        text-align: center;
        margin: 20px 0;
        margin-top: 5px;
    }

    .footer-payment p {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .payment-logos {
        display: grid;
        justify-items: center;
    }

    .payment-logos img {
        width: 500px;
        /* Đặt chiều rộng cố định */
        height: 200px;
        /* Đặt chiều cao cố định để đảm bảo kích thước bằng nhau */
        object-fit: contain;
        /* Đảm bảo hình ảnh không bị méo */
        transition: transform 0.3s ease;
        /* Hiệu ứng hover */
    }
</style>
<footer>

    <div class="footer-container">
        <div class="footer-info">
            <h3>PH Management</h3>
            <p>Nằm ở trung tâm thành phố và nhiều thành phố khác. Chúng tôi cung cấp chỗ nghỉ thanh lịch và đầy
                phong
                cách với truy cập Wifi miễn phí trong các khu vực chung. Khách sạn có lễ tân 24 giờ, hồ bơi
                trong nhà,
                trung tâm thể dục và bãi đỗ xe miễn phí trong khuôn viên.</p>

        </div>

        <div class="footer-subscribe">
            <p><strong>Đăng ký nhận tin</strong></p>
            <form action="subscribe.php" method="post">
                <input type="email" name="email" placeholder="Email của bạn" required>
                <button type="submit">ĐĂNG KÝ</button>
            </form>
        </div>

        <div class="footer-payment">
            <p><strong>Hình thức thanh toán</strong></p>
            <div class="payment-logos">
                <img src="./assets/img/logo/icon.png" alt="Icon">
            </div>
        </div>
        <div class="footer-about">
            <h3>Chính sách</h3>
            <ul>
                <li><a href="#">Chính sách nhận phòng</a></li>
                <li><a href="#">Chính sách trả phòng</a></li>
                <li><a href="#">Chính sách thanh toán</a></li>
                <li><a href="#">Chính sách bảo mật</a></li>
            </ul>

        </div>

        <div class="footer-news">
            <h3>Bài viết mới</h3>
            <ul>
                <li>10 xu hướng thịnh hành trong ngành khách sạn 2022</li>
                <p>Ngày đăng 06/12/2022</p>
                <li>Những điều kiêng kị khi ở khách sạn mà bạn nên biết</li>
                <p>Ngày đăng 06/12/2022</p>
                <li>Ý nghĩa việc khách sạn để chocolate lên vối khi dọn phòng</li>
                <p>Ngày đăng 06/12/2022</p>
            </ul>
        </div>

        <div class="footer-policies">
            <p><strong>Hotline hỗ trợ</strong> 0793962005</p>
            <p><strong>Email hỗ trợ</strong> <a href="mailto:support@sapo.vn"
                    style="color: #ffffff;">support@sapo.vn</a></p>

        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<!-- slick Slider JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Countdown JS -->
<script src="assets/js/plugins/countdown.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/plugins/nice-select.min.js"></script>
<!-- jquery UI JS -->
<script src="assets/js/plugins/jqueryui.min.js"></script>
<!-- Image zoom JS -->
<script src="assets/js/plugins/image-zoom.min.js"></script>
<!-- Images loaded JS -->
<script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- mail-chimp active js -->
<script src="assets/js/plugins/ajaxchimp.js"></script>
<!-- contact form dynamic js -->
<script src="assets/js/plugins/ajax-mail.js"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="assets/js/plugins/google-map.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->

</html>