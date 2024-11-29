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

        .img1 {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            object-position: center;
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

        .room2:hover {
            transform: scale(1.05);
            transition: transform 0.5s ease-in-out;
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

        .room2 button:hover {
            outline: 2px solid red;
            background-color: white;
            color: red;

        }

        .room1 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
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

        .w3-content {
            max-width: 100%;
            height: auto;
            overflow: hidden;
        }

        .mySlides {
            width: 100vw;
            height: 300px;
            object-fit: cover;
            object-position: center;
            display: block;
            margin: 0 auto;
        }
    </style>
    <div class="w3-content w3-section">
        <img class="mySlides" src="https://onetouchmedia.vn/wp-content/uploads/2019/10/N.NT-31.jpg" style="width:100%; height:450px; ">
        <img class="mySlides" src="https://images.pexels.com/photos/2507010/pexels-photo-2507010.jpeg" style="width:100%; height:450px; ">
        <img class="mySlides" src="https://parisdelihotel.com/images/banner.jpg" style="width:100%; height:450px; ">
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 5000);
        }
    </script>
    <section>
        <div class="phong">
            <h3>
                PHÒNG
            </h3>
            <div class="phong1">
                <p>Sắp xếp</p>
                <p>Mặc định</p>
            </div>
        </div>
    </section>
    <section>
        <div class="room">
            <div class="room1">
                <?php foreach ($newphong as $key => $phong) { ?>
                    <div class="room2">
                        <a href="?act=chitietphong&id=<?= $phong['id'] ?>">
                            <div class="room3">
                                <img src="<?= $phong['hinh_anh'] ?>" alt="">
                            </div>
                            <div class="room4">
                                <h3><?= $phong['ten_phong'] ?></h3>
                                <div class="room8">
                                    <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                    <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                    <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                </div>
                                <div class="room5">
                                    <p class="room6"><?= number_format($phong['gia_tien']) ?> đ</p>
                                    <p><?= $phong['ten_danh_muc'] ?></p>
                                </div>
                        </a>
                        <button>Đặt Phòng</button>
                    </div>
            </div>
        <?php } ?>
        </div>
        </div>
    </section>
</body>

</html>
<?php require_once 'layout/footer.php' ?>