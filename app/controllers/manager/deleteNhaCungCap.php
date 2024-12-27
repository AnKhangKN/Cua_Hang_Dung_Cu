<?php

include($_SERVER['DOCUMENT_ROOT'] . "/CHDDTTHKN/assets/view/QuanLy/includes/connect.php");

// Bật chế độ ngoại lệ cho MySQLi
$conn->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idNhaCungCap = $_POST['idNhaCungCap'] ?? null;
}

try {

    $stmt = $conn->prepare("DELETE FROM nhacungcap WHERE idNhaCungCap = ?");
    $stmt->bind_param("i", $idNhaCungCap);
    $stmt->execute();

    header("location: /CHDDTTHKN/assets/view/QuanLy/index.php?page=nhacungcap");
    exit;
} catch (Exception $e) {
    // Nếu xảy ra lỗi, hiển thị thông báo và quay lại trang ban đầu
    $conn->rollback();
    echo "<script>
        alert('Không thể xóa nhà cung cấp đã cung cấp sản phẩm.');
        window.location.href = '/CHDDTTHKN/assets/view/QuanLy/index.php?page=nhacungcap';
        </script>";
    exit;
}
