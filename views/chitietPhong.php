<?php
// Bao gồm file kết nối cơ sở dữ liệu
require_once './commons/function.php';  // Thay 'path/to/db.php' bằng đường dẫn chính xác đến tệp chứa hàm connectDB

// Lấy ID phòng từ URL (ví dụ: ?act=room_details&id=1)
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Kết nối đến cơ sở dữ liệu
$conn = connectDB();

// Truy vấn lấy chi tiết phòng
$query = "SELECT * FROM phongs WHERE id = :id";  // Sử dụng prepared statement để tránh SQL injection
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$room = $stmt->fetch();

// Nếu không tìm thấy phòng, hiển thị thông báo lỗi
if (!$room) {
    echo "Không tìm thấy phòng!";
    exit;
}

// Truy vấn lấy phòng tốt nhất (ví dụ: phòng có giá cao nhất)
$bestRoomQuery = "SELECT * FROM phongs ORDER BY gia_tien DESC LIMIT 1";  // Lấy phòng có giá cao nhất
$bestRoomStmt = $conn->prepare($bestRoomQuery);
$bestRoomStmt->execute();
$bestRoom = $bestRoomStmt->fetch();

// Truy vấn lấy các phòng tương tự (giá gần với phòng hiện tại hoặc các phòng trong cùng danh mục)
$similarRoomsQuery = "SELECT * FROM phongs WHERE danh_muc_id = :danh_muc_id AND id != :id ORDER BY gia_tien DESC LIMIT 3";  // Lấy 3 phòng tương tự
$similarRoomsStmt = $conn->prepare($similarRoomsQuery);
$similarRoomsStmt->bindParam(':danh_muc_id', $room['danh_muc_id'], PDO::PARAM_INT);
$similarRoomsStmt->bindParam(':id', $id, PDO::PARAM_INT);
$similarRoomsStmt->execute();
$similarRooms = $similarRoomsStmt->fetchAll();
?>

<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<style>
.banner {
    width: 100%;
    height: 400px;
    overflow: hidden;
    margin-bottom: 20px;
}

.banner img {
    width: 1400px;
    height: 100%;
}

.container {
    max-width: 1200px;
    margin: auto;
}

.breadcrumb {
    padding: 10px;
    background-color: #eee;
    font-size: 14px;
}

.breadcrumb a {
    text-decoration: none;
}

.header {
    display: flex;
    gap: 20px;
}

.header img {
    width: 60%;
    border-radius: 10px;
    object-fit: cover;
}

.header .details {
    flex: 1;
}

.details p {
    margin: 10px 0;
}

.details .services {
    margin-top: 10px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.services span {
    background: #f4f4f4;
    border-radius: 5px;
    padding: 5px 10px;
    display: inline-block;
    font-size: 14px;
    color: #555;
}

.similar-rooms {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.similar-rooms .room,
.featured-rooms .room {
    flex: 1;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    text-align: center;
    background: #f9f9f9;
}

.room img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}

.room p {
    margin: 5px 0;
    font-size: 16px;
    color: #333;
}

.room a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.room a:hover {
    text-decoration: underline;
}

.booking-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    margin-top: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.booking-box h2 {
    font-size: 22px;
    margin-bottom: 20px;
}

.booking-box label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.booking-box input[type="date"],
.booking-box input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

.booking-box .btn {
    width: 100%;
    padding: 12px;
    background-color: #ffcc00;
    color: white;
    border: none;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.booking-box .btn:hover {
    background-color: #e6b800;
}

.total-price {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
    color: #333;
}
</style>

<main>
    <div class="breadcrumb">
        <a href="?act=home">Trang chủ</a> >
        <span>Chi tiết phòng</span>
    </div>

    <div class="container">
        <div class="banner">
            <img src="./assets/img/logo/banner.png" alt="Banner khách sạn">
        </div>

        <div class="header">
            <img src="<?= $room['hinh_anh']; ?>" alt="<?= $room['ten_phong']; ?>"> <!-- Hiển thị ảnh phòng -->
            <div class="details">
                <h1><?= $room['ten_phong']; ?></h1>
                <p><strong>Trạng thái:</strong> <?= $room['trang_thai']; ?></p>
                <p><strong>Mô tả:</strong> <?= $room['mo_ta']; ?></p>
                <p><strong>Giá:</strong> <?= number_format($room['gia_tien'], 0, ',', '.') ?> VND/đêm</p>
            </div>
        </div>

        <!-- Đặt phòng trong một ô -->
        <div class="booking-box">
            <h2>Đặt phòng</h2>
            <form action="" method="post">
                <label for="check_in">Ngày nhận:</label>
                <input type="date" id="check_in" name="check_in" required>

                <label for="check_out">Ngày trả:</label>
                <input type="date" id="check_out" name="check_out" required>

                <label for="adults">Người lớn:</label>
                <input type="number" id="adults" name="adults" value="1" min="1" required>

                <label for="children">Trẻ em:</label>
                <input type="number" id="children" name="children" value="0" min="0">

                <button type="submit" class="btn">Đặt phòng</button>
            </form>

            <div class="total-price">
                <strong>Tạm tính: </strong>
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $checkInDate = $_POST['check_in'];
                        $checkOutDate = $_POST['check_out'];
                        $adults = $_POST['adults'];
                        $children = $_POST['children'];

                        $checkInTimestamp = strtotime($checkInDate);
                        $checkOutTimestamp = strtotime($checkOutDate);
                        $nights = ($checkOutTimestamp - $checkInTimestamp) / 86400; // Số đêm

                        $totalPrice = $nights * $room['gia_tien'];
                        echo number_format($totalPrice, 0, ',', '.') . ' VND';
                    } else {
                        echo '0 VND';
                    }
                ?>
            </div>
        </div>

        <h2>Phòng tương tự</h2>
        <div class="similar-rooms">
            <?php foreach ($similarRooms as $similarRoom): ?>
            <div class="room">
                <img src="<?= $similarRoom['hinh_anh']; ?>" alt="<?= $similarRoom['ten_phong']; ?>">
                <p><?= $similarRoom['ten_phong']; ?></p>
                <p>Giá: <?= number_format($similarRoom['gia_tien'], 0, ',', '.') ?> VND/đêm</p>
                <a href="?act=chitietphong&id=<?= $similarRoom['id']; ?>">Xem chi tiết</a>
            </div>
            <?php endforeach; ?>
        </div>

        <h2>Phòng tốt nhất</h2>
        <div class="room">
            <img src="<?= $bestRoom['hinh_anh']; ?>" alt="<?= $bestRoom['ten_phong']; ?>">
            <p><?= $bestRoom['ten_phong']; ?></p>
            <p>Giá: <?= number_format($bestRoom['gia_tien'], 0, ',', '.') ?> VND/đêm</p>
            <a href="?act=chitietphong&id=<?= $bestRoom['id']; ?>">Xem chi tiết</a>
        </div>

    </div>
</main>

<?php require_once 'layout/footer.php'; ?>