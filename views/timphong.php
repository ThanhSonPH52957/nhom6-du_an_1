<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .phong {
            padding: 10px 10px;
            width: 1250px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            background-color: gainsboro;
            border-radius: 8px;
            margin: 25px 0;
        }

        .phong1 {
            display: flex;
            flex-direction: row;
        }

        .phong1 p {
            margin: 5px;
        }

        .room7 {
            background-color: rgba(243, 243, 243, 1);
        }

        .room2 {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        }

        .room3 img {
            width: 300px;
        }

        .room4 {
            width: 300px;
            text-align: center;
            background-color: #fff;
            padding-top: 2px;
            margin-top: -2px;
        }

        .room4 h3 {
            font-size: 18px;
            font-weight: 500;
            margin: 10px 0;
        }

        .room4 ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .room8 {
            margin: 10px 0px;
        }

        .room4 ul li img {
            min-width: 30px;
            max-width: 30px;
            display: inline-block;
        }

        .room4 ul {
            margin-left: -10px;
        }

        .room5 {
            display: flex;
            flex-direction: row;
            margin-left: 75px;
            margin-top: 10px
        }

        .room5 .room6 {
            color: red;
            margin-right: 10px;
        }

        .room2 .room4 button {
            width: 100%;
            background-color: red;
            border-style: none;
            padding: 10px;
            font-size: 16px;
            color: #fff;
        }

        .room1 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 20px 0;
        }

        .room {
            margin-bottom: 50px;
        }

        .room h2 {
            text-align: center;
            font-size: 38px;
            font-weight: 500;
        }

        .tim2 {
            background-color: rgba(243, 243, 243, 1);
        }

        .tim1 {
            margin: 30px 0;
        }
    </style>
    <?php if (!empty($products)): ?>
        <section>
            <div class="phong">
                <h3>
                    Trang chủ > Tìm kiếm
                </h3>
            </div>
        </section>
        <section class="room">
            <div>
                <h2>
                    Có <?= count($products) ?> kết quả tìm kiếm phù hợp
                </h2>
                <div class="room1">
                    <?php foreach ($products as $value) : ?>
                        <div class="room2">
                            <div class="room3">
                                <img src="<?= $value['hinh_anh'] ?>" alt="">
                            </div>
                            <div class="room4">
                                <h3><?= $value['ten_phong'] ?></h3>
                                <div class="room8">
                                    <ul>
                                        <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                        <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                        <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                    </ul>
                                </div>
                                <div class="room5">
                                    <p class="room6"><?= $value['gia_tien'] ?></p>
                                    <p>02 Khách</p>
                                </div>
                                <button>Đặt Phòng</button>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        </ul>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm nào.</p>
    <?php endif; ?>
</body>

</html>
<?php require_once 'layout/footer.php' ?>