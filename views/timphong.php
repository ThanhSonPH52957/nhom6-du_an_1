<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
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

    .tim2 {
        background-color: rgba(243, 243, 243, 1);
    }

    .tim1 {
        margin: 30px 0;
    }

    a {
        text-decoration: none;
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
        <input type=" text" placeholder="Từ Khóa (Phòng)" name="search" class="search-box">
        <div class="dat2">
            <div class="dat1">
                <div class="form-label1">Check-in:</div>
                <input type="date" id="check_in" name="check_in" value="<?= $_SESSION['check_in'] ?? '' ?>" required>
            </div>
            <img src="./uploads/anh49.png" width="15px" alt="">
            <div class="dat">
                <div class="form-label1">Check-out:</div>
                <input type="date" id="check_out" name="check_out" value="<?= $_SESSION['check_out'] ?? '' ?>" required>
            </div>
        </div>
        <button type="submit" class="header-button">
            Tìm Kiếm
        </button>
    </form>
</section>
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
                        <a class="iii" href="?act=chitietphong&id=<?= $value['id'] ?>">
                            <div class="room3">
                                <img src="<?= $value['hinh_anh'] ?>" alt="">
                            </div>
                            <div class="room4">
                                <h3><?= $value['ten_phong'] ?></h3>
                                <div class="room8">
                                    <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                    <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                    <li><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJN AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZ cwAAAGAAAABgAPBrQs8AAAAHdElNRQfmCxMTHDmep1MjAAABqklEQVRIx83UP2hTURTH8c/Li/UP yZhSumkQTbu42EmUDqWVLgFRsbg5KHTTobg5umS04uZQnQpBwUGJg4g6CErFUoJUBaVmaZcOCtrU IS+1CUn7XqDg7w333XvO7/sOh3see6LDpkDRELgp1S21c2DSMXBVFgdNqyer4JFTCNWkMO5h99TO FWzusIsFqBjDhvdO4qXTSQE/5MCKHH4KhMkAo16DM96g4KuNZIC05wh9sIqcsr1TEK1HzMT2PPF4 e7ENDet3J5Z9xHgnAN9UYgH6zJgAn80qp2OZWjVnGoGCuw71ArgcVVB20bNUD4A5eXlHXVCTbQL+ 6Itp3xddqnpjbQLWDMQEDFrdvm0ClhyPCRi2GDnb5uOVQgx74Ivl6CkZsPAvdMW9GIBz5rfeh7yI fn1Rcz46sYs9Y2nr+8sqiq3hEVX9O9hT5nebmPMWuzYzo2x2a/i6alTVLdm209AlVTc62QNnZVpO sq7Lq3jru3X7DSqYFCr51JK36al1AjUP/I7R/3ZNKXpH2n05Jb8SmVPGrDTuQCB0zYQDiQB1C25b 66Hu/1F/AS5NXPQ77EwEAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTExLTE5VDE4OjI4OjU3KzAx OjAwc9hNUAAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0xMS0xOVQxODoyODo1NyswMTowMAKF9ewA AAAodEVYdGRhdGU6dGltZXN0YW1wADIwMjItMTEtMTlUMTc6Mjg6MjcrMDA6MDDAmW96AAAAAElF TkSuQmCC" alt=""></li>
                                </div>
                                <div class="room5">
                                    <p class="room6"><?= $value['gia_tien'] ?> đ</p>
                                    <p>02 Khách</p>
                                </div>
                        </a>
                        <a href="?act=formdatphong&id=<?= $value['id'] ?>"><button>Đặt Phòng</button></a>
                    </div>
            </div>
        <?php endforeach ?>
        </div>
        </div>
    </section>
<?php else: ?>
    <section class="h00" style="margin: 80px 0;">
        <h1>
            Không tìm thấy sản phẩm nào.
        </h1>
    </section>
<?php endif; ?>
<?php require_once 'layout/footer.php' ?>