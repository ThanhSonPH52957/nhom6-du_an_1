<?php
class TaiKhoan
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }

    function CheckLogin($email, $pass)
    {
        try {
            $sql = 'select * from tai_khoans where email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            $login = $stmt->fetch();

            if ($login && $pass == $login['mat_khau']) {
                return $login['email'];
            } else {
                return "Sai thông tin tài khoản hoặc mật khẩu";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }
    function getTaiKhoanFromEmail($email)
    {
        $sql = 'select * from tai_khoans where email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetch();
    }
}
