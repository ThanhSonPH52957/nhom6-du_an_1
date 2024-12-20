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

        .chitiet {
            width: 100%;
            height: 100%;
        }

        .chitiet img {
            width: 1250px;
            height: 500px;
            object-fit: cover;
            object-position: center;
        }

        .chitiet7 {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }

        .chitiet7 p {
            font-size: 30px;
        }

        .chitiet7 button {
            padding: 5px 40px;
            font-size: 20px;
            color: black;
            margin: 0;
            background-color: #FFCC66;
            margin-top: -12px;
        }

        .chi {
            width: 100%;
            height: 2px;
            background-color: #FFCC66;
            margin-top: -10px;
        }

        .chitiet3 {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .chitiet9 {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .chitiet3 img {
            width: 30px;
        }

        .chitiet3 p {
            font-size: 20px;
            margin-left: 5px;
        }

        .chitiet10 {
            display: flex;
            justify-content: center;
            align-items: start;
        }

        .chitiet8 {
            text-align: start;
            height: 180px;
            width: 860px;
            line-height: 27px;
            overflow: auto;
        }

        .chi3 {
            display: flex;
            flex-direction: row;
            padding: 5px 0;
            border-bottom: 1px solid #FFCC66;
        }


        .chi1 img {
            width: 170px;
        }

        .chitiet5 {
            width: 70%;
            margin-right: 10px;
        }

        .chitiet11 {
            width: 30%;
            padding: 10px;
            border: 1px solid #FFCC66;
            border-radius: 10px;
        }

        .chitiet11 a {
            text-decoration: none;
        }

        .chitiet11 .chi6 {
            text-align: center;
            color: #fff;
            font-weight: 500;
            font-size: 18px;
            padding: 0 15px;
            border-radius: 10px 10px 0px 0px;
            line-height: 40px;
            background: #cd9a2b;
        }

        .chi2 {
            margin-left: 10px;
        }

        .chi2 p {
            margin: 0;
            font-size: 14px;
        }

        .chi2 span {
            color: red;
        }

        .chitiet10 {
            margin-top: 10px;
        }

        .chi7 p span {

            color: red;
        }

        .chi7 p {
            font-size: 20px;
        }

        .chi9 p {
            font-size: 20px;
        }


        .pi {
            display: flex;
            flex-direction: row;
            margin: 45px 0;
        }

        .pi textarea {
            width: 80%;
            background-color: #dddddd;
            color: #666666;
            padding: 5px;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;

            font-family: 'Heebo', sans-serif;
            font-weight: 500;
            font-size: 15px;
            line-height: 1.4;
            transition: all 0.2s;
        }

        .pi textarea::placeholder {
            padding: 5px 2px;
            font-size: 20px;
        }

        .pi textarea:hover {
            cursor: pointer;
            background-color: #eeeeee;
        }

        .pi textarea:focus {
            cursor: text;
            color: #333333;
            background-color: white;
            border-color: #333333;
        }

        .pi button {
            width: 20%;
            margin-left: 10px;
            background-color: #dddddd;
            color: #666666;
            border-radius: 10px;
            border: 2px solid transparent;
            font-family: 'Heebo', sans-serif;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.2s;
        }

        .pi button:hover {
            cursor: pointer;
            background-color: #eeeeee;
        }

        .cmt {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            border: 1px solid #ddd;
            width: 100%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cmt h3 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        .comment {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment .name {
            font-weight: bold;
            color: #007BFF;
            margin-right: 10px;
        }

        .comment .content {
            color: #555;
        }

        .cmt {
            margin-top: 20px;
        }

        .cmt span {
            display: block;
            padding: 10px 20px;
            margin: 0 100px;
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
            margin: 15px 0px;
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
            height: 170px;
        }

        .room8 {
            width: 300px;
            margin: 10px auto;
        }

        .room8 li {
            display: inline-block;
            flex-direction: row;
            justify-content: center;
            align-items: baseline;
            margin: 5px;
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

        .room5 {
            text-align: center;
            margin-bottom: 10px;
        }

        .room5 p {
            display: inline-block;
            margin: 0 5px;
        }

        .room5 .room6 {
            color: red;
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
            gap: 10px;

        }

        .chi00 {
            padding: 10px;
            border: 1px solid #FFCC66;
            border-radius: 10px;
            margin-top: 10px;
        }

        .chi00 h2 {
            text-align: center;
            color: #fff;
            font-weight: 500;
            font-size: 18px;
            padding: 0 15px;
            border-radius: 10px 10px 0px 0px;
            line-height: 40px;
            background: #cd9a2b;
        }

        .room {
            margin-bottom: 50px;
        }

        .room h2 {
            text-align: center;
            font-size: 38px;
            font-weight: 500;
        }

        a {
            text-decoration: none;
        }

        .slider {
            position: relative;
            max-width: 1250px;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            /* Tính tổng chiều rộng theo số nhóm */
        }

        .slides img {
            width: 50%;
            flex: 0 0 50%;
            height: auto;
        }

        .nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .nav button {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
    <section>
        <div class="phong">
            <h5>
                CHI TIẾT PHÒNG
                </h3>

        </div>
    </section>
    <section>
        <div class="">
            <div class="slider">
                <div class="slides">
                    <?php foreach ($image as $images): ?>
                        <img src="<?php echo $images['link_hinh_anh']; ?>" alt="Image">
                    <?php endforeach; ?>
                </div>
                <div class="nav">
                    <button id="prev">❮</button>
                    <button id="next">❯</button>
                </div>
            </div>
            <div class="chitiet1">
                <div class="chitiet2">
                    <div class="chitiet7">
                        <p> <?= $data['ten_phong'] ?></p>
                        <a href="?act=formdatphong&id=<?= $data['id'] ?> "><button>Ðặt phòng</button></a>
                    </div>
                    <div class="chi">
                    </div>
                    <div class="chitiet10">
                        <div class="chitiet5">
                            <div class="chitiet9">
                                <div class="chitiet3">
                                    <img src="https://bizweb.dktcdn.net/100/472/947/themes/888072/assets/people.png?1724559260757" alt="">
                                    <p><?= $data['songuoi'] ?></p>
                                </div>
                                <div class="chi7">
                                    <p>Giá:<span><?= number_format($data['gia_tien']) ?> đ</span></p>
                                </div>
                                <div class="chi9">
                                    <p>Phòng: <span class="chi8"><?= $data['ten_danh_muc'] ?></span></p>
                                </div>
                            </div>
                            <p class="chitiet8"><?= $data['mo_ta'] ?></p>
                            <div class="add-comment">
                                <form class="pi" method="POST" action="?act=binhluan">
                                    <input type="hidden" name="id_phong" value="<?= $data['id'] ?>">
                                    <textarea name="nguoidung" placeholder="Nhập bình luận..." required></textarea>
                                    <button type="submit">Gửi</button>
                                </form>
                                <div class="cmt">
                                    <h3>Bình luận</h3>
                                    <?php foreach ($binhluans as $binhluan): ?>
                                        <div class="comment">
                                            <span class="name"><?= $binhluan['ho_ten'] ?>:</span>
                                            <span class="content"><?= htmlspecialchars($binhluan['noidung']) ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="chitiet11">
                            <a href="#">
                                <div class="chi6">
                                    Phòng tốt nhất
                                </div>
                            </a>
                            <?php foreach ($data2 as $item) : ?>
                                <div class="chi3">
                                    <div class="chi1">
                                        <img src="<?= $item['hinh_anh'] ?>" alt="">
                                    </div>
                                    <div class="chi2">
                                        <p><?= $item['ten_phong'] ?></p>
                                        <span><?= number_format($data['gia_tien']) ?> đ</span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chi00">
                <h2>Phong Liên Quan</h2>
                <div class="room1">

                    <?php foreach ($data1 as $key => $phong) : ?>
                        <div class="room2">
                            <a href="?act=chitietphong&id=<?= $phong['id'] ?>">
                                <div class="room3">
                                    <img src="<?= $phong['hinh_anh'] ?>" alt="">
                                </div>
                                <div class="room4">
                                    <h3><?= $phong['ten_phong'] ?></h3>
                                    <div class="room8">
                                        <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC"
                                                alt=""></li>
                                        <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC"
                                                alt=""></li>
                                        <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC"
                                                alt=""></li>
                                    </div>
                                    <div class="room5">
                                        <p class="room6"><?= number_format($phong['gia_tien']) ?> đ</p>
                                        <p><?= $phong['ten_danh_muc'] ?></p>
                                    </div>
                            </a>
                            <a href="?act=datphong&id=<?= $phong['id'] ?>"><button>Đặt Phòng</button></a>
                        </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </section>
    <script>
        let currentIndex = 0; // gia tri bang 0
        const slides = document.querySelector('.slides');
        const totalGroups = Math.ceil(slides.querySelectorAll('img').length / 2); // Số nhóm ảnh (2 ảnh mỗi nhóm)

        document.getElementById('next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalGroups;
            updateSlider();
        });

        document.getElementById('prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalGroups) % totalGroups;
            updateSlider();
        });

        function updateSlider() {
            if (slides.querySelectorAll('img').length % 2 === 0) {
                slides.style.transform = `translateX(-${currentIndex * 100}%)`;
            } else if (slides.querySelectorAll('img').length % 2 !== 0) {
                slides.style.transform = `translateX(-${currentIndex * 50}%)`;
            }
        }
    </script>

</body>

</html>
<?php require_once 'layout/footer.php'; ?>