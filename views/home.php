<?php
include_once "layout/header.php";
?>
<?php
include_once "layout/menu.php";
?>
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
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .title {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
    }

    .title1 {
        width: 50%;
    }

    .title1 img {
        width: 600px;
        height: 350px;
        object-fit: cover;
        object-position: center;
    }

    .title2 {
        width: 50%;
        margin-left: 50px;
    }

    .title2 p {
        width: 600px;
        line-height: 25px;
    }

    .title2 h2 {
        font-size: 36px;
        font-weight: 500;
    }

    .title2 button {
        padding: 10px;
        border-style: none;
        background-color: orange;
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

    .title {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px 0;
    }

    .title1 {
        width: 50%;
    }

    .title1 img {
        width: 600px;
        height: 350px;
        object-fit: cover;
        object-position: center;
    }

    .title2 {
        width: 50%;
        margin-left: 50px;
    }

    .title2 p {
        width: 600px;
        line-height: 25px;
    }

    .title2 h2 {
        font-size: 36px;
        font-weight: 500;
    }

    .title2 button {
        padding: 10px;
        border-style: none;
        background-color: orange;
    }

    .title2 button:hover {
        background-color: #e0a800;
        color: #fff;

    }


    a {
        text-decoration: none;
    }

    .room7 {
        background-color: rgba(243, 243, 243, 1);
    }

    .room7 .room2 button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .room7 .room2 button:hover {
        outline: 2px solid red;
        background-color: white;
        color: red;
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
        margin: 0;
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
        gap: 20px;
    }

    .room {
        margin: 50px 0;
    }

    .room h2 {
        text-align: center;
        font-size: 38px;
        font-weight: 500;
    }

    .vip2 .vip3 img {
        width: 620px;
        height: 300px;
        object-fit: cover;
        object-position: center;
    }

    .vip2 .vip4 {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        align-items: center;
        margin-top: -60px;
        padding: 0 10px;
    }


    .vip4 h3 {
        font-size: 20px;
        font-weight: 400;
        color: #fff;
    }

    .vip4 button {
        border-style: none;
        padding: 7px 7px;
        background-color: red;
        color: #fff;
    }

    .vip4 button:hover {
        outline: 2px solid red;
        background-color: white;
        color: red;

    }

    .vip1 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .vip2 {
        margin-top: 20px;
    }

    .vip {
        margin: 50px 0;
    }


    .vip h2 {
        text-align: center;
        font-size: 38px;
        font-weight: 500;
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

    .dat3 {
        display: flex;
        flex-direction: row;
        background: #fff;
        border-radius: 8px;
        padding: 24px 14px;
    }

    .dat1 .form-label1 {
        padding: 2px;
        margin-right: 5px;
    }

    .dat .form-label1 {
        padding: 2px;
        margin-right: 5px;
    }

    .dat1 {
        display: flex;
        flex-direction: row;
    }

    .dat {
        display: flex;
        flex-direction: row;
    }

    .dat2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 5px;
        background-color: #fff;
        border: 2px solid gainsboro;
        margin: 0 20px;
    }

    .dat2 img {
        margin: 0 20px;
    }

    .dat3 button {
        width: 100px;
    }

    .dat3 .search-box {
        width: 250px;

    }

    .dat4 {
        margin-top: -100px;
        margin-bottom: 10px;
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
<section class="dat4">
    <form action="?act=timphong" method="POST" class="dat3">
        <div class="dat2">
            <div class="dat1">
                <div class="form-label1">Check-in:</div>
                <input type="date" id="check_in" name="check_in" value="<?= $_POST['check_in'] ?? '' ?>" required>
            </div>
            <img src="./uploads/anh49.png" width="15px" alt="">
            <div class="dat">
                <div class="form-label1">Check-out:</div>
                <input type="date" id="check_out" name="check_out" value="<?= $_POST['check_out'] ?? '' ?>" required>
            </div>
        </div>
        <button type="submit" class="header-button">
            Tìm Kiếm
        </button>
    </form>
</section>
<section>
    <div class="title">
        <div class="title1">
            <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/432346891.jpg?k=76795ac93d8a3fd23a4fd5993e74b9c7d0651465c331fca2c65580b8d0ff8889&o=&hp=1"
                alt="">
        </div>
        <div class="title2">
            <h2>PH Management</h2>
            <p>Là khách sạn 5 sao đẳng cấp quốc tế, tọa lạc tại giao điểm của bốn quận chính, nơi được xem như trái tim
                và trung tâm của TP. Hà Nội. Với hệ thống phòng tiêu chuẩn và phòng hạng sang thiết kế đẹp mắt và
                trang nhã được chú trọng tới từng chi tiết sẽ đem lại sự tiện nghi và thoải mái tối đa cho quý khách dù
                là thời gian nghỉ ngơi thư giãn hay trong chuyến công tác...</p>
            <a href="?act=gioithieu"><button>Xem thêm</button></a>
        </div>
    </div>
</section>
<section class="room7">
    <div>
        <div class="room">
            <h2>PHÒNG ĐƠN</h2>
            <div class="room1">
                <?php foreach ($newphong as $key => $phong) : ?>
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
                        <a href="?act=formdatphong&id=<?= $phong['id'] ?>"><button>Đặt Phòng</button></a>
                    </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <div class="room">
        <h2>PHÒNG ĐÔI</h2>
        <div class="room1">
            <?php foreach ($newphong1 as $key => $phong) : ?>
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
                    <a href="?act=formdatphong&id=<?= $phong['id'] ?>"><button>Đặt Phòng</button></a>
                </div>
        </div>
    <?php endforeach; ?>
    </div>
    </div>
    </div>
</section>
<section>
    <div class="vip">
        <h2>PHÒNG VIP</h2>
        <div class="vip1">
            <?php foreach ($newphong2 as $phong) : ?>
                <div class="vip2">
                    <div class="vip3"><img src="<?= $phong['hinh_anh'] ?>" alt=""></div>
                    <div class="vip4">
                        <h3><?= $phong['ten_phong'] ?></h3>
                        <a href="?act=chitietphong&id=<?= $phong['id'] ?>"><button>XEM CHI TIẾT</button> </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
include_once "layout/footer.php";
?>