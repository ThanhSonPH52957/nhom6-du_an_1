<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<style>
    /* Reset CSS */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .booking-container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .form-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 20px;
    }

    .form-label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="datetime-local"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    .full-width {
        grid-column: span 2;
    }

    .room-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-bottom: 20px;
    }

    .room-info div {
        padding: 10px;
        background-color: #e0e0e0;
        border-radius: 4px;
        text-align: center;
    }

    .room-images {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-bottom: 20px;
    }

    .room-images img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 4px;
    }

    .total-price {
        text-align: center;
        font-size: 18px;
        margin-bottom: 20px;
    }

    .total-price span {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #d32f2f;
    }

    .submit-btn {
        width: 100%;
        padding: 15px;
        font-size: 16px;
    }
</style>

<form action="" method="POST">
    <div class="booking-container">
        <h1>ĐẶT PHÒNG</h1>

        <div class="form-group">
            <div class="form-label">Họ và tên*</div>
            <input type="text" placeholder="Nhập họ và tên" name="hoten" required>

            <div class="form-label">Số điện thoại*</div>
            <input type="text" placeholder="Nhập số điện thoại" name="sdt" required>

            <div class="form-label">Ngày/giờ check-in*</div>
            <input type="date" id="checkin" name="checkin" required>

            <div class="form-label">Ngày/giờ check-out*</div>
            <input type="date" id="checkout" name="checkout" required>

            <div class="form-label">Tên phòng</div>
            <select name="loaiphong" required>
                <option></option>
            </select>

            <div class="form-label full-width">Ghi chú cho tiếp tân</div>
            <input type="text" class="full-width" placeholder="Nhập ghi chú" name="note">
        </div>

        <div class="form-group">
            <div class="form-label">Tổng số giờ ở:</div>
            <input type="text" id="totalHours" placeholder="0 giờ" name="total" disabled>
        </div>

        <div class="room-info">
            <div>
                <label>
                    <input type="checkbox" name="dich_vu" value="co" checked>
                </label>
            </div>


        </div>



        <div class="total-price">
            <label><input type="checkbox" required> Tôi xác nhận đã đọc và xác thực thông tin đặt phòng</label>
            <span>950.000đ</span>
        </div>

        <button class="submit-btn" type="submit" style="background-color: yellow">ĐẶT PHÒNG</button>
    </div>
</form>

<script>
    document.getElementById('checkin').addEventListener('change', calculateHours);
    document.getElementById('checkout').addEventListener('change', calculateHours);

    function calculateHours() {
        const checkin = new Date(document.getElementById('checkin').value);
        const checkout = new Date(document.getElementById('checkout').value);

        if (checkin && checkout && checkout > checkin) {
            const diffMs = checkout - checkin; // milliseconds
            const diffHours = Math.floor(diffMs / (1000 * 60 * 60)); // hours
            document.getElementById('totalHours').value = `${diffHours} giờ`;
        } else {
            document.getElementById('totalHours').value = '0 giờ';
        }
    }
</script>
<?php require_once 'layout/footer.php'; ?>