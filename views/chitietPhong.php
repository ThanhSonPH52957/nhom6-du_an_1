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

        .chitiet8 {
            width: 500px;
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
            width: 300px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .chitiet9 {
            width: 100%;
            display: flex;
            flex-direction: row;
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
                    <div class="chitiet9">
                        <div class="chitiet3">
                            <img src="https://bizweb.dktcdn.net/100/472/947/themes/888072/assets/people.png?1724559260757" alt="">
                            <p><?= $data['songuoi'] ?></p>
                        </div>
                        <p><?= $data['gia_tien'] ?></p>
                        <p><?= $data['ten_danh_muc'] ?></p>
                    </div>
                    <div class="chitiet5"></div>
                    <p class="chitiet8">Các phòng trang nhã và dãy phòng trang nghiêm của chúng tôi gợi nhớ về một thời đại đã qua. Mỗi tính năng như đường cong, thảm sang trọng, trần nhà cao, phòng tắm lát đá cẩm thạch, thiết bị làm sạch và nhiều không gian đều được bố trí một cách chu đáo để gọi cho riêng bạn. Tông màu nâu phong phú và gỗ sồi tự nhiên tạo nên những khu bảo tồn yên tĩnh và yên tĩnh, được tôn lên một cách tuyệt vời bởi đồ nội thất trang nhã.</p>
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