<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phòng đã đặt</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f6f9;
        }

        /* Container */
        .container {
            width: 90%;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #222;
            text-align: center;
            font-weight: 600;
        }

        /* Form styles */
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            width: 300px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 16px;
            margin-right: 10px;
        }

        form button {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        /* Hover effect */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button styles in table */
        .btn {
            padding: 8px 12px;
            border: none;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .btn-info {
            background-color: #2196F3;
        }

        .btn-info:hover {
            background-color: #1976D2;
        }

        .btn-success {
            background-color: #4CAF50;
        }

        .btn-success:hover {
            background-color: #388E3C;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px;
            }

            form input[type="text"] {
                width: 70%;
                font-size: 14px;
            }
        }

        /* Messages */
        p {
            text-align: center;
            font-size: 16px;
            padding: 10px;
        }

        p[style="color: green;"] {
            color: #28a745;
        }

        p[style="color: red;"] {
            color: #dc3545;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Danh sách phòng đã đặt</h2>

        <form method="Post" action="?act=phongdat">
            <input type="text" name="search_trang_thai" placeholder="Nhập tên trạng thái" value="<?= htmlspecialchars($_GET['search_trang_thai'] ?? '') ?>">
            <button type="submit">Tìm kiếm</button>
        </form>
        <?php if (!empty($_SESSION['success'])): ?>
            <p style="color: green;"><?= $_SESSION['success'] ?></p>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <p style="color: red;"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên phòng</th>
                    <th>Ngày check-in</th>
                    <th>Ngày check-out</th>
                    <th>Trạng thái</th>
                    <th>Chi Tiet Phong</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) : ?>
                    <?php foreach ($data as $index => $phong) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($phong['ten_phong']) ?></td>
                            <td><?= formatDate($phong['check_in']) ?></td>
                            <td><?= formatDate($phong['check_out']) ?></td>
                            <td><?= htmlspecialchars($phong['ten_trang_thai']) ?></td>
                            <td> <a href="?act=chitiethoadon&id=<?= $phong['id'] ?>"><button class="btn btn-info">Chi tiết</button></a></td><!-- Hiển thị tên trạng thái -->
                            <td>
                                <?php if ($phong['trang_thai_id'] == 3 || $phong['trang_thai_id'] == 4): ?>
                                    <button class="btn btn-success" disabled>Đặt dịch vụ</button>
                                    <button class="btn btn-danger" disabled>Hủy</button>
                                <?php else: ?>
                                    <a href="?act=formdatdichvu&id=<?= $phong['id'] ?>"><button class="btn btn-success">Đặt dịch vụ</button></a>
                                    <a href="?act=capnhatdonhang&id=<?= $phong['id'] ?>"><button class="btn btn-danger">Hủy</button></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Không có phòng nào được đặt.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>



</body>

</html>

<?php require_once 'layout/footer.php'; ?>