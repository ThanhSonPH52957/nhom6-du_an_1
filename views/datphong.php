<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<style>
    /* Reset CSS */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .booking-container {
        max-width: 650px;
        margin: 50px auto;
        padding: 25px;
        background-color: #ffffff;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .booking-container:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
    }

    .booking-container::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -30%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.8), rgba(0, 123, 255, 0.1));
        z-index: -1;
        transform: scale(1);
        transition: transform 0.6s ease-in-out;
    }

    .booking-container:hover::before {
        transform: scale(1.2);
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

<form action="?act=datphong" method="POST">
    <div class="booking-container">
        <h1>ĐẶT PHÒNG</h1>

        <div class="form-group">
            <div class="form-label">Họ tên*</div>
            <input type="text" placeholder="Nhập họ và tên" value="<?= $taikhoan['ho_ten'] ?>" name="hoten" readonly>

            <div class="form-label">Số điện thoại*</div>
            <input type="text" placeholder="Nhập số điện thoại" value="<?= $taikhoan['so_dien_thoai'] ?>" name="sdt" readonly>

            <div class="form-label">Tên phòng</div>
            <select name="phong_id" id="phong_id" required>
                <?php
                foreach ($phong as $row) {
                    if ((isset($old_data['phong_id']) && $row['id'] == $old_data['phong_id'])) {
                        $selected = "selected";
                    } elseif (!isset($old_data['phong_id']) && isset($id) && $row['id'] == $id) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo "<option value='{$row['id']}' $selected>{$row['ten_phong']}</option>";
                }
                ?>
            </select>

            <div class="form-label">Ngày check-in*</div>
            <input type="date" id="checkin" name="checkin" value="<?= $old_data['checkin'] ?? '' ?>" required>

            <div class="form-label">Ngày check-out*</div>
            <input type="date" id="checkout" name="checkout" value="<?= $old_data['checkout'] ?? '' ?>" required>

            <div class="form-label">Dịch vụ:</div> <br>
            <?php foreach ($dichvu as $dv): ?>
                <label>
                    <input type="checkbox" name="dichvu[]" value="<?= $dv['id'] ?>"
                        <?= isset($old_data['dichvu']) && in_array($dv['id'], $old_data['dichvu']) ? 'checked' : '' ?>>
                    <?= $dv['ten_dich_vu'] ?>
                </label>
            <?php endforeach; ?><br>
            <div class="form-label">Phương thức thanh toán</div>
            <select name="thanhtoan_id" id="" required>
                <?php
                foreach ($thanhtoan as $row) {
                    if (isset($old_data['thanhtoan_id']) && $row['id'] == $old_data['thanhtoan_id']) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }
                    echo "<option value='{$row['id']}' $selected>{$row['ten_phuong_thuc']}</option>";
                }
                ?>
            </select>
            <div class="form-label">Tổng tiền</div>
            <input type="hidden" id="tong_tien_raw" name="tongtien_raw">
            <input type="text" id="tong_tien" name="tongtien" readonly style="font-weight: bold; color: #d32f2f;">
        </div>
        <?php if (isset($errors['check'])): ?>
            <p class="text-danger"><?= $errors['check'] ?></p>
        <?php endif; ?>
        <button class="submit-btn" type="submit" style="background-color: yellow" name="check">Đặt phòng</button>
    </div>
</form>

<script>
    const rooms = <?= json_encode($phong); ?>;
    console.log(rooms);

    const services = <?= json_encode($dichvu); ?>;
    console.log(services);

    document.addEventListener("DOMContentLoaded", function() {
        const checkinField = document.getElementById("checkin");
        const checkoutField = document.getElementById("checkout");
        const roomField = document.getElementById("phong_id");
        const servicesField = document.querySelectorAll("input[name='dichvu[]']");
        const priceDisplay = document.createElement("p");
        priceDisplay.style.fontWeight = "bold";
        document.querySelector(".booking-container").appendChild(priceDisplay);

        const getRoomPrice = (roomId) => {
            const room = rooms.find(r => r.id == roomId);
            return room ? parseFloat(room.gia_tien) : 0;
        };

        const getServicePrices = (selectedServiceIds) => {
            return selectedServiceIds.reduce((total, serviceId) => {
                const service = services.find(s => s.id == serviceId);
                return total + (service ? parseFloat(service.gia_dich_vu) : 0);
            }, 0);
        };

        const calculatePrice = () => {
            const checkin = new Date(checkinField.value);
            const checkout = new Date(checkoutField.value);
            const roomId = roomField.value;

            const selectedServices = Array.from(servicesField)
                .filter(service => service.checked)
                .map(service => service.value);

            if (isNaN(checkin) || isNaN(checkout) || checkin >= checkout) {
                document.getElementById("tong_tien").value = ""; // Xóa giá trị nếu ngày không hợp lệ
                document.getElementById("tong_tien_raw").value = 0;
                return;
            }

            const days = Math.max(1, Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24)));
            const roomPrice = getRoomPrice(roomId);
            const servicePrice = getServicePrices(selectedServices);

            const totalPrice = days * (roomPrice + servicePrice);

            // Gán giá trị hiển thị có định dạng vào input
            document.getElementById("tong_tien").value = `${totalPrice.toLocaleString()} VND`;

            // Gán giá trị thực (không định dạng) vào hidden input
            document.getElementById("tong_tien_raw").value = totalPrice;
        };



        checkinField.addEventListener("change", calculatePrice);
        checkoutField.addEventListener("change", calculatePrice);
        roomField.addEventListener("change", calculatePrice);
        servicesField.forEach(service => service.addEventListener("change", calculatePrice));

        calculatePrice();
    });
    // });
</script>

<?php require_once 'layout/footer.php'; ?>