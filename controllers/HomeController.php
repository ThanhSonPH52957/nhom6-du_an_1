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
<<<<<<< HEAD
      public function dangky()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
=======
  public function dangky()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
>>>>>>> 06b87812169075e0952e78c547cbce49930a391a

        $ho = trim($_POST["ho"]);
        $ten = trim($_POST["ten"]);
        $email = trim($_POST["email"]);
        $sdt = trim($_POST["sdt"]);
        $matkhau = password_hash(trim($_POST["matkhau"]), PASSWORD_BCRYPT); // Mã hóa mật khẩu

        // Kiểm tra dữ liệu đầu vào
        if (empty($ho) || empty($ten) || empty($email) || empty($sdt) || empty($matkhau)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
            require_once './views/auth/dangky.php';
            return;
        }

        // Tạo kết nối cơ sở dữ liệu
        try {
            $conn = new mysqli('localhost', 'root', '', 'du_an_1');
            if ($conn->connect_error) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            // Chuẩn bị câu lệnh SQL
            $sql = "INSERT INTO tai_khoan (ho, ten, email, sdt, matkhau) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Chuẩn bị câu lệnh thất bại: " . $conn->error);
            }

            // Gán giá trị và thực thi câu lệnh
            $stmt->bind_param("sssss", $ho, $ten, $email, $sdt, $matkhau);
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

    require_once './views/auth/dangky.php';
}
    public function datphong()
    {
        require_once './views/datphong.php';
    }
}
