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
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        /* Container */
        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Row hover effect */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button styles */
        button {
            padding: 8px 15px;
            border: none;
            background-color: #f44336;
            color: white;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #d32f2f;
        }

        /* Warning text */
        .warning {
            color: #f44336;
            font-size: 14px;
            text-align: center;
        }

        /* Responsive table */
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 14px;
            }

            th,
            td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Danh sách phòng đã đặt</h2>

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