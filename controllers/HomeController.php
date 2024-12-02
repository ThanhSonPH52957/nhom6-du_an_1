<?php

class HomeController
{
    public $modelPhong;
    public $modelTaiKhoan;
    public $modelGioHang;

    function __construct()
    {
        $this->modelPhong = new Phong();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
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

        // Kiểm tra người dùng đã đăng nhập bằng email
        if (isset($_SESSION['user_client'])) {
            $email = $_SESSION['user_client'];

            // Lấy thông tin tài khoản dựa trên email
            $user = $this->modelTaiKhoan->getUserByEmail($email);
            $tai_khoan_id = $user['id'];
            // Lấy danh sách phòng đã đặt
            $data = $this->modelPhong->phongDat($tai_khoan_id);
            // Hiển thị trang home
            require_once './views/phongdat.php';
        } else {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
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
        $search = isset($_POST['search']) ? trim($_POST['search']) : '';
        $check_in = isset($_POST['check_in']) ? trim($_POST['check_in']) : '';
        $check_out = isset($_POST['check_out']) ? trim($_POST['check_out']) : '';

        if (!empty($search)) {
            // Tìm kiếm theo từ khóa
            $products = $this->modelPhong->timKiemPhong($search);
        } elseif (!empty($check_in) && !empty($check_out)) {
            // Tìm kiếm theo ngày
            $products = $this->modelPhong->timKiemPhongTheoNgay($check_in, $check_out);
        } else {
            $products = []; // Không có kết quả nếu không nhập gì
        }

        // Gửi giá trị đã nhập lại sang view
        require_once './views/timphong.php';
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
            $id_phong = $_POST['id_phong'] ?? null; // Kiểm tra giá trị trước khi gán
            $noidung = $_POST['nguoidung'] ?? null;  // Tránh lỗi undefined key
            $taikhoan = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $email_khoan = $taikhoan['id'] ?? "";

            if (empty($email_khoan)) { // Kiểm tra người dùng đã đăng nhập chưa
                header("Location: ?act=dangnhap");
                exit;
            }

            // Gọi hàm thêm bình luận
            ($this->modelPhong)->addBinhluan($noidung, $id_phong, $email_khoan);

            // Chuyển hướng về trang chi tiết phòng
            header('Location: ' . BASE_URL_ADMIN . '?act=chitietphong&id=' . $id_phong);
        }
    }
    
    function formDichVu($id) {
        $datphong = $this -> modelPhong -> GetDatPhongFromId($id);
        $dichvu = $this -> modelPhong -> getAllDV();

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
}
