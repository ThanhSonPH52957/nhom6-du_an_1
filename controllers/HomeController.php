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
        // $Phong = $this->modelPhong->GetDetailPhong($id);

        // $listAnhPhong = $this->modelPhong->GetListAnhPhong($id);

        // $listBinhLuan = $this->modelPhong->GetBinhLuanFromPhong($id);

        // $listPhongCungDanhMuc = $this->modelPhong->getListPhongDanhMuc($Phong['danh_muc_id']);
        require_once './views/chitietPhong.php';
    }

    function formLogin()
    {
        require_once './views/auth/dangnhap.php';
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

                header("Location: " . BASE_URL_ADMIN . '?act=login');
                exit();
            }
        }
    }

    function themGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkPhong = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkPhong = true;
                        break;
                    }
                }
                if (!$checkPhong) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                require_once './views/gioHang.php';
            } else {
                require_once './views/auth/formLogin.php';
            }
        }
    }

    function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header("location: " . BASE_URL_ADMIN . '?act=login');
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

        if (!empty($search)) {
            $products = $this->modelPhong->timKiemPhong($search);
        }

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
            $matkhau = password_hash(trim($_POST["matkhau"]), PASSWORD_BCRYPT); // Mã hóa mật khẩu

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
                $sql = "INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai, mat_khau, chuc_vu_id) VALUES (?, ?, ?, ?, ?)";
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
    public function datphong()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Kiểm tra nếu giá trị tồn tại trước khi dùng trim
            $hoten = isset($_POST["hoten"]) ? trim($_POST["hoten"]) : '';
            $sdt = isset($_POST["sdt"]) ? trim($_POST["sdt"]) : '';
            $checkin = isset($_POST["checkin"]) ? trim($_POST["checkin"]) : '';
            $checkout = isset($_POST["checkout"]) ? trim($_POST["checkout"]) : '';
            $loaiphong = isset($_POST["loaiphong"]) ? trim($_POST["loaiphong"]) : '';
            $note = isset($_POST["note"]) ? trim($_POST["note"]) : '';
            $total = isset($_POST["total"]) ? trim($_POST["total"]) : '';
            $dichvu = isset($_POST["dichvu"]) ? trim($_POST["dichvu"]) : '';  // Dịch vụ (checkbox)


            // Tạo kết nối cơ sở dữ liệu
            try {
                $conn = new mysqli('localhost', 'root', '', 'du_an_1');
                if ($conn->connect_error) {
                    throw new Exception("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
                }

                // Chuẩn bị câu lệnh SQL
                $sql = "INSERT INTO dat_phongs (hoten, sdt, check_in, check_out, loaiphong, note, total, dichvu) VALUES ('$hoten', '$sdt', '$checkin', '$checkout', '$loaiphong', '$note', '$total', '$dichvu')";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Chuẩn bị câu lệnh thất bại: " . $conn->error);
                }

                // Gán giá trị và thực thi câu lệnh
                $stmt->bind_param("sssss", $hoten, $sdt, $checkin, $checkout, $note, $total, $dichvu);
                if ($stmt->execute()) {
                    $_SESSION['success'] = "Đăng ký thành công!";
                    header("Location: " . BASE_URL_ADMIN . '?act=login');
                    exit();
                } else {
                    throw new Exception("Thực thi câu lệnh thất bại: " . $stmt->error);
                }
            } catch (Exception $e) {
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

        require_once './views/datphong.php';
    }
public function addbinhluan()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_phong = $_POST['id_phong'];
        $noidung = $_POST['noidung'];
        $id_tai_khoan = $_SESSION['id_tai_khoan'] ?? null;

        if (empty($id_tai_khoan)) {
            // Hiển thị thông báo và chuyển hướng đến trang đăng nhập
            echo '<script>
                    alert("Bạn cần đăng nhập để bình luận!");
                    window.location.href = "index.php?act=dangnhap";
                  </script>';
            exit;
        }

        // Thêm bình luận nếu đã đăng nhập
        $this->modelPhong->addBinhluan($noidung, $id_phong, $id_tai_khoan);

        // Chuyển hướng về chi tiết phòng
        header('location:' . BASE_URL_ADMIN . '?act=chitietphong&id=' . $id_phong);
        exit;
    } else {
        // Chuyển hướng về trang chủ nếu không phải POST
        header("location:index.php");
        exit;
    }
}

}
