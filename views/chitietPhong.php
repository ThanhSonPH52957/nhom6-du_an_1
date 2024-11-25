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
            color: white;
            margin: 0;
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
            width: 860px;
            line-height: 27px;
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
    </style>
    <section>
        <div class="">
            <div class="chitiet">
                <img src="<?= $data['hinh_anh'] ?>" alt="">
            </div>
            <div class="chitiet1">
                <div class="chitiet2">
                    <div class="chitiet7">
                        <p> <?= $data['ten_phong'] ?></p>
                        <button>Ðặt phòng</button>
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
                            <p class="chitiet8">Các phòng trang nhã và dãy phòng trang nghiêm của chúng tôi gợi nhớ về một thời đại đã qua. Mỗi tính năng như đường cong, thảm sang trọng, trần nhà cao, phòng tắm lát đá cẩm thạch, thiết bị làm sạch và nhiều không gian đều được bố trí một cách chu đáo để gọi cho riêng bạn. Tông màu nâu phong phú và gỗ sồi tự nhiên tạo nên những khu bảo tồn yên tĩnh và yên tĩnh, được tôn lên một cách tuyệt vời bởi đồ nội thất trang nhã.</p>
                            <div class="add-comment">
                                <form class="pi" method="POST" action="index.php?act=binhluan">
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
            <!-- <div class="chitiet6">
            <h2>Mô tả</h2>
            <p><?= $data['motact'] ?></p>
        </div> -->
        </div>
    </section>
</body>

</html>
<?php require_once 'layout/footer.php'; ?>