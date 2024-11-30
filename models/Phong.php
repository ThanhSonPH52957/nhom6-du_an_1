<?php
class Phong
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }
    public function album($id_phong)
    {
        $sql = "SELECT * FROM album_anh_phongs WHERE phong_id = :id_phong";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_phong' => $id_phong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function phongDat($tai_khoan_id)
    {
        $sql = "SELECT phongs.* ,dat_phongs.check_in,dat_phongs.check_out,dat_phongs.trang_thai_id
        FROM phongs
        INNER JOIN dat_phongs ON phongs.id = dat_phongs.phong_id
        WHERE dat_phongs.tai_khoan_id = :tai_khoan_id
        ";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách phòng dạng mảng kết hợp
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    public function layDanhSachHinhAnhTheoPhong($id)
    {
        $sql = 'SELECT * FROM album_anh_phongs WHERE phong_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layDanhSachPhongTheoDanhMuc($idDanhMuc)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE danh_muc_id = :idDanhMuc';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':idDanhMuc' => $idDanhMuc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function layChiTietPhong($id)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function layPhongLienQuan($id, $idhientai)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.danh_muc_id = :id and  phongs.id != :idhientai';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id, ':idhientai' => $idhientai]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layPhongTotNhat($idhientai)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.danh_muc_id = 4 and  phongs.id != :idhientai
                ORDER BY phongs.id DESC LIMIT 4';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':idhientai' => $idhientai]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function layDanhSachBinhLuanTheoPhong($idPhong)
    {
        $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten 
                FROM binh_luans 
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id 
                WHERE binh_luans.phong_id = :idPhong';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':idPhong' => $idPhong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AddPhong()
    {
        $sql = 'SELECT phongs.* , danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layPhongDon()
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
                WHERE danh_muc_id = 1
                ORDER BY danh_muc_id  DESC LIMIT 4';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layPhongDoi()
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
                WHERE danh_muc_id = 2
                ORDER BY danh_muc_id  DESC LIMIT 4';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layPhongVip()
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
                WHERE danh_muc_id = 4
                ORDER BY danh_muc_id  DESC LIMIT 4';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timKiemPhong($search)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.ten_phong LIKE :search OR danh_muc_phongs.ten_danh_muc LIKE :search ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':search' => '%' . $search . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function timKiemPhongTheoNgay($check_in, $check_out)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc
            FROM phongs
            INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
            LEFT JOIN dat_phongs ON phongs.id = dat_phongs.phong_id
            WHERE (
                dat_phongs.phong_id IS NULL 
                OR NOT (dat_phongs.check_in < :check_out AND dat_phongs.check_out > :check_in)
            )';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':check_in' => $check_in,
            ':check_out' => $check_out
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function timKiemPhongTheoNgayVaTen($search, $check_in, $check_out)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc
            FROM phongs
            INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
            LEFT JOIN dat_phongs ON phongs.id = dat_phongs.phong_id
            WHERE (phongs.ten_phong LIKE :search OR danh_muc_phongs.ten_danh_muc LIKE :search)
            AND (
                dat_phongs.phong_id IS NULL 
                -- Điều kiện này kiểm tra các phòng chưa từng được đặt (không có bản ghi trong dat_phongs).
                OR NOT (dat_phongs.check_in < :check_out AND dat_phongs.check_out > :check_in)
                -- dat_phongs.check_in < :checkout: Ngày nhận phòng trong hệ thống nhỏ hơn ngày trả phòng
                -- dat_phongs.check_out > :checkin: Ngày trả phòng trong hệ thống lớn hơn ngày nhận phòng 

            )';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':search' => '%' . $search . '%',
            ':check_in' => $check_in,
            ':check_out' => $check_out
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addBinhluan($noidung, $id_phong, $id_tai_khoan)
    {
        $sql = "INSERT INTO binhluan (id_phong,id_tai_khoan,noidung)
        VALUES (:id_phong,:id_tai_khoan,:noidung)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id_phong' => $id_phong ?? null,
            ':id_tai_khoan' => $id_tai_khoan ?? null,
            ':noidung' => $noidung ?? null,
        ]);
    }
    public function listBinhluan($id_phong)
    {
        $sql = "
                SELECT * FROM binhluan
                INNER JOIN phongs ON phongs.id = binhluan.id_phong
                INNER JOIN tai_khoans ON tai_khoans.id = binhluan.id_tai_khoan 
                WHERE binhluan.id_phong = :id_phong ;
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_phong' => $id_phong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBinhLuanChiTiet($id_phong)
    {
        $sql = 'SELECT binhluan.noidung, tai_khoans.ho_ten 
            FROM binhluan
            INNER JOIN tai_khoans ON binhluan.id_tai_khoan = tai_khoans.id 
            WHERE binhluan.id_phong = :id_phong
            ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_phong' => $id_phong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function all()
    {
        $sql = "SELECT * FROM binhluan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAllDV()
    {
        $sql = "SELECT * FROM dich_vus";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAllTT()
    {
        $sql = "SELECT * FROM phuong_thuc_thanh_toans";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function CheckRoom($phongid, $checkin, $checkout)
    {
        $sql = "SELECT check_in, check_out 
                FROM dat_phongs
                WHERE phong_id = :room_id 
                AND (check_in < :check_out AND check_out > :check_in)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':room_id' => $phongid,
            ':check_in' => $checkin,
            ':check_out' => $checkout
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function DatPhong($taikhoanid, $phongid, $today, $checkin, $checkout, $tongtien, $thanhtoan)
    {
        $checkin = $_SESSION['check_in'] ?? '';
        $checkout = $_SESSION['check_out'] ?? '';
        $phongid = $_POST['phong_id'];
        $sql = "INSERT INTO dat_phongs (tai_khoan_id, phong_id, ngay_dat, check_in, check_out, tong_tien, phuong_thuc_thanh_toan_id, trang_thai_id)
        VALUES (:tai_khoan_id, :phong_id, :ngay_dat, :check_in, :check_out, :tongtien, :phuong_thuc_thanh_toan_id, 1)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':tai_khoan_id' => $taikhoanid,
            ':phong_id' => $phongid,
            ':ngay_dat' => $today,
            ':check_in' => $checkin,
            ':check_out' => $checkout,
            'tongtien' => $tongtien,
            ':phuong_thuc_thanh_toan_id' => $thanhtoan
        ]);
    }

    function GetDatPhong($phongid, $checkin)
    {
        $sql = "select id from dat_phongs where phong_id = :phongid and check_in = :checkin";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':phongid' => $phongid,
            ':checkin' => $checkin,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function AddDichVu($datphongid, $dv)
    {
        $sql = "insert into chi_tiet_hoa_dons (dat_phong_id, dich_vu_id) values (:datphongid, :dichvuid)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':datphongid' => $datphongid,
            ':dichvuid' => $dv
        ]);
    }
}
