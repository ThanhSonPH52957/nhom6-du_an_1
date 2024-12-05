<?php

class HomeController
{
    public $modelPhong;
    public $modelTaiKhoan;

    function __construct()
    {
        $this->modelPhong = new Phong();
        $this->modelTaiKhoan = new TaiKhoan();
    }

    function chiTietDatPhong($id)
    {
        $onedatphong = $this->modelPhong->getOneDatPhong($id);
        $dichvu = $this->modelPhong->getDichVuFromId($id);

        $startDate = new DateTime($onedatphong['check_in']);
        $endDate = new DateTime($onedatphong['check_out']);
        $tinhsongay = $startDate->diff($endDate);
        $songay = $tinhsongay->days;

        $tienphong = $onedatphong['gia_tien'] * ($songay + 1);

        $tiendichvu = 0;
        foreach ($dichvu as $dv) {
            $tiendichvu += $dv['gia_dich_vu'];
        }
        $tongdichvu = $tiendichvu * ($songay + 1);

        $tongtien = $tienphong + $tongdichvu;

        // $listTrangThai = $this -> modelDatPhong -> getAllTrangThai();
        require_once './views/chitiethoadon.php';
    }
    public function capNhatDonHang($id)
    {
        $this->modelPhong->huyDon($id);
        header("Location: ?act=phongdat");
    }


    public function phongdat()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra người dùng đã đăng nhập
        if (isset($_SESSION['user_client'])) {
            $email = $_SESSION['user_client'];
            $user = $this->modelTaiKhoan->getUserByEmail($email);
            $tai_khoan_id = $user['id'];

            // Lấy từ khóa tìm kiếm nếu có
            $search_trang_thai = isset($_POST['search_trang_thai']) ? trim($_POST['search_trang_thai']) : '';

            // Lấy danh sách phòng đã đặt theo từ khóa tìm kiếm
            $data = $this->modelPhong->getPhongDat($tai_khoan_id, $search_trang_thai);

            // Hiển thị view phongdat.php
            require_once './views/phongdat.php';
        } else {
            header("Location: /auth/dangNhap.php");
            exit;
        }
    }

    public function danhmucphong($idDanhmuc)
    {
        $data = $this->modelPhong->layDanhSachPhongTheoDanhMuc($idDanhmuc);
        require_once './views/danhmucphong.php';
    }


    public function home()
    {
        $newphong = $this->modelPhong->layPhongDon();
        $newphong1 = $this->modelPhong->layPhongDoi();
        $newphong2 = $this->modelPhong->layPhongVip();
        require_once './views/home.php';
    }
    public function phong()
    {
        $newphong = $this->modelPhong->AddPhong();
        require_once './views/phong.php';
    }
    public function dichvu()
    {
        require_once './views/dichvu.php';
    }


    public function chiTietPhong()
    {
        $id = $_GET['id'] ?? '';
        $data = $this->modelPhong->layChiTietPhong($id);
        $data1 = $this->modelPhong->layPhongLienQuan($data['danh_muc_id'], $data['id']);
        $data2 = $this->modelPhong->layPhongTotNhat($data['id']);
        $binhluans = $this->modelPhong->getBinhLuanChiTiet($data['id']);
        $image = $this->modelPhong->album($data['id']);
        // $Phong = $this->modelPhong->GetDetailPhong($id);

        // $listAnhPhong = $this->modelPhong->GetListAnhPhong($id);

        // $listBinhLuan = $this->modelPhong->GetBinhLuanFromPhong($id);

        // $listPhongCungDanhMuc = $this->modelPhong->getListPhongDanhMuc($Phong['danh_muc_id']);
        require_once './views/chitietPhong.php';
    }

    function formLogin()
    {
        require_once './views/auth/dangNhap.php';
        deleteSessionError();
    }

    function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $user = $this->modelTaiKhoan->CheckLogin($email, $pass);

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header("location:" . BASE_URL_ADMIN . '?act=/');
                exit();
            } else {
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_ADMIN . '?act=dangnhap');
                exit();
            }
        }
    }

    function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("location: " . BASE_URL_ADMIN . '?act=/');
        }
    }

    function lienhe()
    {
        require_once  './views/lienhe.php';
    }

    function gioithieu()
    {
        require_once './views/gioithieu.php';
    }

    public function timKiemPhong()
    {
        $error = ''; // Khởi tạo biến lỗi

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $check_in = $_POST['check_in'] ?? null;
            $check_out = $_POST['check_out'] ?? null;
            $search = $_POST['search'] ?? '';
            $today = date('Y-m-d');

            $check_in = $check_in ? date('Y-m-d', strtotime($check_in)) : null;
            $check_out = $check_out ? date('Y-m-d', strtotime($check_out)) : null;

            // Kiểm tra lỗi liên quan đến ngày
            if ($check_in && $check_out) {
                if ($check_in < $today) {
                    $error = 'Ngày check-in phải từ hôm nay trở đi!';
                } elseif ($check_in >= $check_out) {
                    $error = 'Ngày check-in phải trước ngày check-out!';
                } else {
                    // Không có lỗi -> Tìm kiếm và chuyển hướng sang trang kết quả
                    $products = $this->modelPhong->timKiemPhongTheoNgay($check_in, $check_out);
                    require_once './views/timphong.php';
                    return;
                }
            } elseif ($search) {
                // Tìm kiếm theo từ khóa nếu không tìm theo ngày
                $products = $this->modelPhong->timKiemPhong($search);
                require_once './views/timphong.php';
                return;
            } else {
                $error = 'Vui lòng nhập đầy đủ thông tin tìm kiếm!';
            }
        }

        // Nếu có lỗi, hiển thị alert và giữ lại trang chủ
        if ($error) {
            echo "<script>alert('$error'); window.history.back();</script>";
            exit;
        }

        require_once './views/home.php'; // Trang chủ của bạn
    }


    public function dangky()
    {
        // Kiểm tra nếu session chưa được khởi tạo, thì mới gọi session_start
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = trim($_POST["ho"] . ' ' . $_POST["ten"]); // Họ và tên
            $email = trim($_POST["email"]);
            $so_dien_thoai = trim($_POST["sdt"]);
            $matkhau = trim($_POST["matkhau"]); // Mã hóa mật khẩu

            // Kiểm tra dữ liệu đầu vào
            if (empty($ho_ten) || empty($email) || empty($so_dien_thoai) || empty($matkhau)) {
                $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
                require_once './views/auth/dangky.php';
                return;
            }

            // Kết nối cơ sở dữ liệu
            try {
                $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                if ($conn->connect_error) {
                    throw new Exception("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
                }

                // Chuẩn bị câu lệnh SQL chèn dữ liệu vào bảng tai_khoans
                $sql = "INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id, trang_thai) VALUES (?, ?, ?, ?, ?, 1)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Chuẩn bị câu lệnh thất bại: " . $conn->error);
                }

                // Gán giá trị và thực thi câu lệnh
                $chuc_vu_id = 1;  // Bạn có thể thay đổi giá trị này nếu cần thiết
                $stmt->bind_param("ssssi", $ho_ten, $email, $so_dien_thoai, $matkhau, $chuc_vu_id);
                if ($stmt->execute()) {
                    // Lưu thông báo thành công vào session
                    $_SESSION['success'] = "Đăng ký thành công!";

                    // Chuyển hướng tới trang đăng nhập
                    header("Location: " . BASE_URL_ADMIN . '?act=dangnhap');
                    exit(); // Dừng mã sau khi chuyển hướng
                } else {
                    throw new Exception("Thực thi câu lệnh thất bại: " . $stmt->error);
                }
            } catch (Exception $e) {
                // Xử lý lỗi nếu có
                $_SESSION['error'] = "Đã xảy ra lỗi: " . $e->getMessage();
            } finally {
                // Đóng kết nối và giải phóng bộ nhớ
                if (isset($stmt)) {
                    $stmt->close();
                }
                if (isset($conn)) {
                    $conn->close();
                }
            }
        }

        // Gọi lại form đăng ký nếu không phải phương thức POST
        require_once './views/auth/dangky.php';
    }

    public function formdatphong()
    {
        if (isset($_SESSION['user_client'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $email = $_SESSION['user_client']; // Lấy email từ session

            $errors = $_SESSION['errors'] ?? []; // Lấy lỗi từ session
            $old_data = $_SESSION['old_data'] ?? []; // Lấy dữ liệu cũ từ session

            // Xóa session sau khi sử dụng
            unset($_SESSION['errors'], $_SESSION['old_data']);
            // Gọi model để lấy thông tin khách hàng
            $taikhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
            $phong = $this->modelPhong->AddPhong();
            $dichvu = $this->modelPhong->getAllDV();
            $thanhtoan = $this->modelPhong->getAllTT();
            require_once './views/datphong.php';
        } else {
            require_once './views/auth/dangNhap.php';
        }
    }

    public function datphong()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['check'])) {
                $phongid = $_POST['phong_id'];
                $checkin = $_POST['checkin'] ?? '';
                $checkout = $_POST['checkout'] ?? '';
                $dichvu = $_POST['dichvu'] ?? '';
                $thanhtoan = $_POST['thanhtoan_id'];
                $today = date('Y-m-d');
                $tongtien = $_POST['tongtien_raw'];

                // Kiểm tra xem giá trị check_in và check_out có hợp lệ hay không
                if (empty($checkin) || empty($checkout)) {
                    $_SESSION['errors']['check'] = 'Vui lòng nhập đầy đủ ngày check-in và check-out.';
                    header("location: " . BASE_URL_ADMIN . '?act=formdatphong&id=' . $phongid);
                    exit();
                }

                // Kiểm tra tình trạng phòng
                $checkroom = $this->modelPhong->CheckRoom($phongid, $checkin, $checkout);

                // Lấy thông tin tài khoản
                $taikhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $taikhoanid = $taikhoan['id'];

                $errors = [];

                // Kiểm tra phòng có trùng lịch không
                if (!empty($checkroom)) { // Kiểm tra nếu có bản ghi nào được trả về
                    foreach ($checkroom as $room) {
                        $errors['check'] = 'Phòng đã được đặt từ ngày ' . $room['check_in'] . ' đến ngày ' . $room['check_out'];
                        break; // Thoát khỏi vòng lặp nếu chỉ cần thông báo lỗi từ bản ghi đầu tiên
                    }
                } elseif (strtotime($checkout) < strtotime($checkin)) {
                    $errors['check'] = 'Vui lòng nhập ngày hợp lệ.';
                } elseif (strtotime($checkin) < strtotime($today)) {
                    $errors['check'] = 'Ngày check-in phải lớn hơn ngày hiện tại.';
                }

                if (empty($errors)) {
                    // Đặt phòng thành công
                    $this->modelPhong->DatPhong($taikhoanid, $phongid, $today, $checkin, $checkout, $tongtien, $thanhtoan);
                    header("location: " . BASE_URL_ADMIN . '?act=phongdat');
                    exit(); // Dừng việc thực hiện thêm sau khi chuyển hướng
                } else {
                    // Nếu có lỗi, lưu lỗi vào session và quay lại form
                    $_SESSION['errors'] = $errors;
                    $_SESSION['old_data'] = $_POST;

                    // Quay lại trang form đặt phòng với lỗi
                    header("location: " . BASE_URL_ADMIN . '?act=formdatphong&id=' . $phongid);
                    exit();
                }
            }
        }
    }

    public function addbinhluan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_phong = $_POST['id_phong'] ?? null;
            $noidung = $_POST['noidung'] ?? null;

            // Lấy thông tin tài khoản từ session
            $taikhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $id_tai_khoan = $taikhoan['id'] ?? null;

            // Kiểm tra xem người dùng có đăng nhập không
            if (empty($id_tai_khoan)) {
                header("Location: ?act=dangnhap");
                exit;
            }

            // Kiểm tra quyền bình luận: Người dùng đã mua phòng chưa
            try {
                $daMua = $this->modelPhong->kiemTraMuaHang($id_tai_khoan, $id_phong);
            } catch (PDOException $e) {
                // Nếu có lỗi trong quá trình kiểm tra, log lỗi và thông báo cho người dùng
                error_log("Error checking purchase: " . $e->getMessage());
                echo "<script>alert('Đã xảy ra lỗi, vui lòng thử lại sau!'); window.history.back();</script>";
                exit;
            }

            // Nếu người dùng đã mua phòng, cho phép bình luận
            if ($daMua) {
                if (empty($noidung)) {
                    echo "<script>alert('Nội dung bình luận không được để trống!'); window.history.back();</script>";
                    exit;
                }

                // Thêm bình luận vào cơ sở dữ liệu
                $this->modelPhong->addBinhluan($noidung, $id_phong, $id_tai_khoan);
                header('Location: ?act=chitietphong&id=' . $id_phong); // Chuyển hướng về trang chi tiết phòng
                exit;
            } else {
                // Nếu chưa mua phòng, thông báo lỗi
                echo "<script>alert('Bạn phải đặt phòng trước khi bình luận!'); window.history.back();</script>";
                exit;
            }
        }
    }

    function formDichVu($id)
    {
        $datphong = $this->modelPhong->GetDatPhongFromId($id);
        $dichvu = $this->modelPhong->getAllDV();
        // var_dump(count($dichvu));die;
        $ngayBatDau = new DateTime($datphong['check_in']);
        $ngayKetThuc = new DateTime($datphong['check_out']);
        $ngayKetThuc->modify('+1 day');

        while ($ngayBatDau < $ngayKetThuc) {
            $danhSachNgay[] = $ngayBatDau->format('Y-m-d');
            $ngayBatDau->modify('+1 day');
        }

        // var_dump($danhSachNgay);die;
        // var_dump($datphong);die;
        require_once './views/datdichvu.php';
    }

    function datDichVu()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['datphongid'];
            $ngaydat = $_POST['ngay_sd']; // Mảng ngày
            $dichvu = $_POST['dichvu']; // Mảng dịch vụ
            $errors = [];
            $checkdv = $this->modelPhong->CheckDV($id);

            // Kiểm tra nếu dịch vụ và ngày đã tồn tại
            foreach ($dichvu as $serviceId) {
                foreach ($ngaydat as $date) {
                    foreach ($checkdv as $service) {
                        if ($service['dich_vu_id'] == $serviceId && $service['ngay_sd'] == $date) {
                            // Thêm thông báo lỗi khi phát hiện trùng lặp
                            $errors[] = 'Dịch vụ "' . $service['ten_dich_vu'] . '" đã được đặt cho ngày ' . $date . '.';
                        }
                    }
                }
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                // Điều hướng trở lại form
                header("Location: ?act=formdatdichvu&id=$id");
                exit;
            }

            // Nếu không có lỗi, thêm dịch vụ vào cơ sở dữ liệu
            foreach ($ngaydat as $nd) {
                foreach ($dichvu as $dv) {
                    $giadichvu = $this->modelPhong->getGiaDichVu($dv);
                    $this->modelPhong->AddDichVu($id, $dv, $nd, $giadichvu);
                }
            }

            // Chuyển hướng sau khi thêm thành công
            header("Location: ?act=phongdat");
            exit;
        }
    }
}
