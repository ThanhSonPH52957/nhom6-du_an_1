<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .breadcrumb-wrapper {
        width: 100%;
        /* Nền breadcrumb phủ toàn bộ chiều ngang */
        background-color: #eee;
        /* Màu nền */
    }

    .breadcrumb {
        max-width: auto;
        /* Giới hạn chiều rộng nội dung */
        margin: 0 auto;
        /* Căn giữa nội dung */
        padding: 10px;
        font-size: 14px;
        background-color: #eee;
        width: 100%;
    }

    .breadcrumb a {
        text-decoration: none;
        margin-right: 1px;
        /* Thêm màu chữ nếu cần */
    }

    .breadcrumb span {
        margin-left: 155px;
    }

    .contact {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 0;
        background-color: #f9f9f9;
    }

    .contact-container {
        display: flex;
        width: 80%;
        max-width: 1200px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-form {
        flex: 1;
        padding: 30px;
        border-right: 2px solid #e5e5e5;
    }

    .contact-form h2 {
        margin-bottom: 20px;
        font-size: 20px;
    }

    .contact-form p {
        margin-bottom: 20px;
        color: #666;
    }

    .contact-form,
    .contact-info {
        width: 48%;
    }

    .contact-form form {
        display: flex;
        flex-direction: column;
    }

    .contact-form label {
        margin-top: 10px;
        font-weight: bold;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .contact-form textarea {
        resize: vertical;
        height: 100px;
    }

    .contact-form button {
        width: 100%;
        padding: 10px;
        background-color: #000;
        color: #fff;
        border: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .contact-info {
        flex: 1;
        background-color: #000;
        color: #fff;
        padding: 30px;
        position: relative;
    }

    .contact-info h2 {
        font-size: 20px;
        margin-bottom: 20px;
        color: #fff;
    }

    .contact-info p {
        margin-bottom: 15px;
        font-size: 14px;
    }

    .map iframe {
        max-width: 1200px;
        margin: 0 auto;
        padding: 10px;
        font-size: 14px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .contact-form button:hover {
        background-color: #444;
    }

    .contact-info::before {
        content: "";
        position: absolute;
        top: 0;
        left: -10px;
        width: 10px;
        height: 100%;
        background-color: #caa653;
    }
</style>
<main>
    <div class="breadcrumb">
        <span><a href="?act=/">Trang chủ</a> > Liên hệ</span>
    </div>

    <section class="contact">
        <div class="contact-container">
            <div class="contact-form">
                <h2>Thông tin liên hệ</h2>
                <p>Hãy điền nội dung tin nhắn vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi
                    nhận được.</p>
                <form action="function/process_lienhe.php" method="POST">
                    <label for="name">Họ và tên *</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Nội dung *</label>
                    <textarea id="message" name="message" required></textarea>

                    <button type="submit">Gửi liên hệ</button>
                </form>
            </div>
            <div class="contact-info">
                <h2>Thông tin</h2>
                <p>75 P. Nguyễn Đình Chiểu, Lê Đại Hành, Hai Bà Trưng, Hà Nội</p>
                <p>1900 6750</p>
                <p>support@sapo.com</p>
                <p>Mở cửa 24/24</p>
            </div>
        </div>
    </section>

    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9206.230740806255!2d105.84498048640776!3d21.011813786366496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abac801ded7f%3A0x40c83151f5546b14!2sHOME%20Hanoi%20-%20HOME%20Vietnamese%20Restaurant!5e0!3m2!1sen!2s!4v1732684593409!5m2!1sen!2s"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
</main>

<?php require_once 'layout/footer.php'; ?>
