<?php
class Phong
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }
    function getDichVuFromId($id)
    {
        $sql = 'select chi_tiet_hoa_dons.*, dich_vus.ten_dich_vu, dich_vus.gia_dich_vu
        from chi_tiet_hoa_dons
        inner join dich_vus on chi_tiet_hoa_dons.dich_vu_id = dich_vus.id
        where chi_tiet_hoa_dons.dat_phong_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }
    function getOneDatPhong($id)
    {
        $sql = 'select dat_phongs.*, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_dat_phongs.ten_trang_thai, tai_khoans.ho_ten, tai_khoans.email, tai_khoans.so_dien_thoai, phongs.ten_phong, phongs.gia_tien
        from dat_phongs 
        inner join trang_thai_dat_phongs on dat_phongs.trang_thai_id = trang_thai_dat_phongs.id 
        inner join tai_khoans on dat_phongs.tai_khoan_id = tai_khoans.id 
        inner join phuong_thuc_thanh_toans on dat_phongs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
        inner join phongs on phongs.id = dat_phongs.phong_id
        where dat_phongs.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }
    public function capNhatTrangThaiPhong($phong_id, $trang_thai_id)
    {
        $sql = "UPDATE dat_phongs SET trang_thai_id = :trang_thai_id WHERE phong_id = :phong_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':trang_thai_id' => $trang_thai_id,
            ':phong_id' => $phong_id
        ]);

        return $stmt->rowCount();
    }
    public function layTrangThai()
    {
        $sql = "SELECT id, ten_trang_thai FROM trang_thai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $sql = "SELECT dat_phongs.*, phongs.ten_phong, trang_thai_dat_phongs.ten_trang_thai
            FROM dat_phongs
            INNER JOIN phongs ON phongs.id = dat_phongs.phong_id
            INNER JOIN trang_thai_dat_phongs ON dat_phongs.trang_thai_id = trang_thai_dat_phongs.id
            WHERE dat_phongs.tai_khoan_id = :tai_khoan_id ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            WHERE phongs.ten_phong LIKE :search OR danh_muc_phongs.ten_danh_muc LIKE :search';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':search' => '%' . $search . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function timKiemPhongTheoNgay($check_in, $check_out)
    {
        $sql = 'SELECT DISTINCT phongs.*, danh_muc_phongs.ten_danh_muc
            FROM phongs
            INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
            WHERE NOT EXISTS (
                SELECT 1 
                FROM dat_phongs 
                WHERE dat_phongs.phong_id = phongs.id
                AND dat_phongs.trang_thai_id != 4  
                AND dat_phongs.trang_thai_id != 3
                AND (
                    dat_phongs.check_in < :check_out 
                    AND dat_phongs.check_out > :check_in
                )
            )';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':check_in' => $check_in,
            ':check_out' => $check_out
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function kiemTraMuaHang($id_tai_khoan, $id_phong)
    {
        $sql = "SELECT COUNT(*) FROM dat_phongs WHERE tai_khoan_id = :id_tai_khoan AND phong_id = :id_phong AND trang_thai_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_tai_khoan', $id_tai_khoan, PDO::PARAM_INT);
        $stmt->bindParam(':id_phong', $id_phong, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn() > 0; // Trả về true nếu có đơn hàng đã thanh toán
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
          AND (check_in < :check_out AND check_out > :check_in)
          AND trang_thai_id IN (1, 2)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':room_id' => $phongid,
            ':check_in' => $checkin,
            ':check_out' => $checkout
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function DatPhong($taikhoanid, $phongid, $today, $checkindp, $checkoutdp, $tongtien, $thanhtoan)
    {
        $sql = "INSERT INTO dat_phongs (tai_khoan_id, phong_id, ngay_dat, check_in, check_out, tong_tien, phuong_thuc_thanh_toan_id, trang_thai_id)
        VALUES (:tai_khoan_id, :phong_id, :ngay_dat, :check_in, :check_out, :tongtien, :phuong_thuc_thanh_toan_id, 1)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':tai_khoan_id' => $taikhoanid,
            ':phong_id' => $phongid,
            ':ngay_dat' => $today,
            ':check_in' => $checkindp,
            ':check_out' => $checkoutdp,
            'tongtien' => $tongtien,
            ':phuong_thuc_thanh_toan_id' => $thanhtoan
        ]);
    }

    function GetDatPhongFromId($id)
    {
        $sql = "select dat_phongs.*, phongs.ten_phong, phuong_thuc_thanh_toans.ten_phuong_thuc
        from dat_phongs
        inner join phongs on dat_phongs.phong_id = phongs.id 
        inner join phuong_thuc_thanh_toans on phuong_thuc_thanh_toans.id = dat_phongs.phuong_thuc_thanh_toan_id
        where dat_phongs.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function AddDichVu($datphongid, $dv, $nd, $giadichvu)
    {
        $sql = "insert into chi_tiet_hoa_dons (dat_phong_id, dich_vu_id, ngay_sd, tien_dich_vu) values (:datphongid, :dichvuid, :ngaysd, :tiendv)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':datphongid' => $datphongid,
            ':dichvuid' => $dv,
            ':ngaysd' => $nd,
            ':tiendv' => $giadichvu
        ]);
    }

    function huyDon($id)
    {
        $sql = "update dat_phongs set trang_thai_id = 4 where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
    }

    function CheckDV($id)
    {
        $sql = "SELECT dich_vu_id, ngay_sd, dich_vus.ten_dich_vu
        FROM chi_tiet_hoa_dons
        inner join dich_vus on chi_tiet_hoa_dons.dich_vu_id = dich_vus.id
        WHERE dat_phong_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getGiaDichVu($dv)
    {
        $sql = "SELECT gia_dich_vu FROM dich_vus where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $dv
        ]);
        return $stmt->fetchColumn();
    }

    function getTienDichVu($id)
    {
        $sql = 'select chi_tiet_hoa_dons.*, dat_phongs.id
        from chi_tiet_hoa_dons 
        inner join dat_phongs on dat_phongs.id = chi_tiet_hoa_dons.dat_phong_id 
        where dat_phongs.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }
}
