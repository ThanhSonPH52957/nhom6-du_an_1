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
    select {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        padding: 10px 18px;
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

<form action="?act=datdichvu" method="POST">
    <div class="booking-container">
        <h1>ĐẶT DỊCH VỤ</h1> <br>

        <div class="form-group">
            <input type="text" name="datphongid" value="<?= $datphong['id'] ?>" hidden>

            <div class="form-label">Phòng đã đặt:</div>
            <input type="text" value="<?= $datphong['ten_phong'] ?>" name="" readonly>

            <div class="form-label">Chọn ngày sử dụng dịch vụ:</div> <br>
            <?php foreach ($danhSachNgay as $ngay): ?>
                <label>
                    <input type="checkbox" name="ngay_sd[]" value="<?= $ngay ?>">
                    <?= formatDate($ngay) ?>
                </label>
            <?php endforeach; ?>

            <?php if (count($danhSachNgay) % 2 != 0 || count($danhSachNgay) == 1): ?>
                <br>
            <?php endif; ?>    
            <div class="form-label">Dịch vụ:</div> <br>
            <?php foreach ($dichvu as $dv): ?>
                <label>
                    <input type="checkbox" name="dichvu[]" value="<?= $dv['id'] ?>">
                    <?= $dv['ten_dich_vu'] ?>: <?= number_format($dv['gia_dich_vu']) ?> VNĐ/ngày
                </label>
            <?php endforeach; ?>
            <?php if (count($dichvu) % 2 != 0): ?>
                <label>
                    <input type="checkbox" name="" style="display: none";>
                </label>
            <?php endif; ?>
            
            <div class="form-label">Phương thức thanh toán:</div>
            <input type="text" value="<?= $datphong['ten_phuong_thuc'] ?>" name="" readonly>

            <div class="form-label">Tổng tiền</div>
            <input type="hidden" id="tong_tien_raw" name="tongtien_raw">
            <input type="text" id="tong_tien" name="tongtien" readonly style="font-weight: bold; color: #d32f2f;">
        </div>
        <?php if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])): ?>
    <div class="alert alert-danger">
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p class="text-danger"><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
    <?php unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị ?>
<?php endif; ?>
<button class="submit-btn" type="submit" style="background-color: yellow" name="check">ĐẶT DỊCH VỤ</button>

    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const servicesCheckboxes = document.querySelectorAll("input[name='dichvu[]']");
    const dayCheckboxes = document.querySelectorAll("input[name='ngay_sd[]']");
    const totalPriceField = document.getElementById("tong_tien");
    const totalPriceRawField = document.getElementById("tong_tien_raw");

    // Danh sách dịch vụ và giá dịch vụ
    const services = <?= json_encode($dichvu); ?>;
    const servicePrices = services.reduce((map, service) => {
        map[service.id] = parseFloat(service.gia_dich_vu);
        return map;
    }, {});

    // Hàm tính toán tổng tiền
    const calculateTotalPrice = () => {
        let totalServicePrice = 0;

        // Tính giá dịch vụ đã chọn
        servicesCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                totalServicePrice += servicePrices[checkbox.value] || 0;
            }
        });

        // Tính số ngày đã chọn
        let appliedDays = 0;

        // Kiểm tra các checkbox ngày đã chọn
        dayCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                appliedDays++;
            }
        });

        // Tính tổng tiền = Giá dịch vụ * Số ngày
        const totalPrice = totalServicePrice * appliedDays;

        // Cập nhật giá trị vào các trường nhập liệu
        totalPriceRawField.value = totalPrice; // Giá trị thực
        totalPriceField.value = totalPrice.toLocaleString() + " VND"; // Hiển thị có định dạng VNĐ
    };

    // Gắn sự kiện thay đổi cho các checkbox
    servicesCheckboxes.forEach(checkbox => checkbox.addEventListener("change", calculateTotalPrice));
    dayCheckboxes.forEach(checkbox => checkbox.addEventListener("change", calculateTotalPrice));

    // Tính toán ngay khi tải trang
    calculateTotalPrice();
});


</script>

<?php require_once 'layout/footer.php'; ?>