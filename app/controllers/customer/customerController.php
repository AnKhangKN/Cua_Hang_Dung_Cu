<?php 
// Detail

    // get product detail
    function getProductById($idproduct) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectBD();
        
        // Chuyển đổi $idproduct thành số nguyên để tránh lỗi
        $idproduct = (int)$idproduct;

        // Nếu id hợp lệ, thực hiện truy vấn
        if ($idproduct > 0) {
            // Câu truy vấn
            $sql = "SELECT * FROM sanpham WHERE idSanPham = ? AND trangthai = 1";

            // Chuẩn bị và thực thi câu truy vấn
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idproduct);
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result->fetch_assoc();

            // Đóng statement và kết nối
            $stmt->close();
            $conn->close();
        } else {    
            // Trả về null nếu id không hợp lệ
            return 0;
        }
    }
    
    

    // get img product detail
function getImageUrlsByProductId($product_id) {
    $conn = connectBD();

    $product_id = (int)$product_id;

    if ($product_id > 0) {
        $sql = "SELECT * FROM hinhanhsanpham WHERE idSanPham = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id); 
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Trả về tất cả hình ảnh dưới dạng mảng
    } else {
        // Trả về mảng rỗng nếu id không hợp lệ
        return [];
    }
}

// --------------------------------------------------------------------------------

// get product page
    function getAllProducts(){
        // Connect to the database
        $conn = connectBD();
        
        // Query to select all products from the 'sanpham' table
        $sql_all_products = mysqli_query($conn,
        "SELECT sp.*, ha.urlhinhanh AS urlhinhanh, dm.tendanhmuc
        FROM sanpham sp
        JOIN hinhanhsanpham ha ON ha.idSanPham = sp.idSanPham
        JOIN danhmucsanpham dm ON dm.idDanhMuc = sp.idDanhMuc
        WHERE sp.trangthai = 1
        GROUP BY sp.idSanPham");
        
        // Initialize an array to store all rows
        $rows = [];

        // Loop through the result set and fetch all rows
        while($row_all_products = mysqli_fetch_assoc($sql_all_products)){
            $rows[] = $row_all_products;
        }

        // Return the array of all products
        return $rows;
    }

// --------------------------------------------------------------------------------

    // get customer by id Account
    function getCustomerById($idTaiKhoan) {
        $conn = connectBD();

        // Chuyển đổi $idTaiKhoan thành số nguyên để tránh lỗi
        $idTaiKhoan = (int)$idTaiKhoan;

        // Nếu id hợp lệ, thực hiện truy vấn
        if ($idTaiKhoan > 0) {
            // Câu truy vấn
            $sql = "SELECT * FROM khachhang WHERE idTaiKhoan = ?";

            // Chuẩn bị và thực thi câu truy vấn
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idTaiKhoan); // Bind idTaiKhoan
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Trả về thông tin khách hàng
        } else {
            // Trả về null nếu id không hợp lệ
            return null;
        }
    }


    // get all bills by customer id
    function getBillsByIdCustomer($idCustomer) {
        $conn = connectBD();
    
        $idCustomer = (int)$idCustomer;
        if ($idCustomer > 0) {
            $sql = 'SELECT * FROM hoadon WHERE idKhachHang = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idCustomer);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $bills = [];
        
            while ($row = $result->fetch_assoc()) {
                $bills[] = $row;
            }
        
            return $bills;
        } else {
            return null;
        }
    }
    

    function getBillById($idBill) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectBD();
        
        // Chuyển đổi $idproduct thành số nguyên để tránh lỗi
        $idBill = (int)$idBill;

        // Nếu id hợp lệ, thực hiện truy vấn
        if ($idBill > 0) {
            // Câu truy vấn
            $sql = "SELECT * FROM hoadon WHERE idHoaDon = ?";

            // Chuẩn bị và thực thi câu truy vấn
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idBill);
            $stmt->execute();

            // Lấy kết quả
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {    
            // Trả về null nếu id không hợp lệ
            return 0;
        }
    }
    
    
    

    // get all detail bill
    function getAllDetailBillByIdBill($idBill){
        $conn = connectBD();
    
        $idBill = (int)$idBill;
        if ($idBill > 0) {
            $sql = 'SELECT * FROM chitiethoadon WHERE idHoaDon = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idBill);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $detail_bills = [];
        
            while ($row = $result->fetch_assoc()) {
                $detail_bills[] = $row;
            }
        
            return $detail_bills;
        } else {
            return null;
        }
    }

    // get all detail bill
    function getAllDetailBillByIdBillWithProductName($idBill){
        $conn = connectBD();
    
        $idBill = (int)$idBill;
        if ($idBill > 0) {
            $sql = 'SELECT sp.tensanpham, SUM(cthd.soluong) soluong ,  ms.mausac,  kt.kichthuoc
                    FROM chitiethoadon cthd
                    JOIN chitietsanpham ctsp ON ctsp.idChiTietSanPham = cthd.idChiTietSanPham
                    JOIN sanpham sp ON sp.idSanPham = ctsp.idSanPham
                    JOIN kichthuocsanpham kt ON ctsp.idKichThuoc = kt.idKichThuoc
                    JOIN mausacsanpham ms ON ms.idMauSac = ctsp.idMauSac
                            
                    WHERE idHoaDon = ?
                    GROUP BY ctsp.idChiTietSanPham';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idBill);
            $stmt->execute();
        
            $result = $stmt->get_result();
            $detail_bills = [];
        
            while ($row = $result->fetch_assoc()) {
                $detail_bills[] = $row;
            }
        
            return $detail_bills;
        } else {
            return null;
        }
    }

    function getAccountById($idAccount){
        $conn = connectBD();

        $idAccount = (int)$idAccount;
        if($idAccount > 0){
            $sql = 'SELECT * FROM taikhoan WHERE idTaiKhoan = ?';

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$idAccount);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {    
            // Trả về null nếu id không hợp lệ
            return 0;
        }
        
    }

    // filter ----------------------------------------------------------------
    function getColorProduct() {
        $conn = connectBD();
        
        $sql = 'SELECT DISTINCT(mssp.mausac) FROM sanpham sp 
                JOIN chitietsanpham ctsp ON sp.idSanPham = ctsp.idSanPham
                JOIN mausacsanpham mssp ON ctsp.idMauSac = mssp.idMauSac
                WHERE sp.trangthai = 1';
    
        $result = $conn->query($sql);
        $row_color = [];
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row_color[] = $row;
            }
        }
    
        return $row_color;
    }
    

    function getAllCategory() {
        $conn = connectBD();
    
        $sql = 'SELECT * FROM danhmucsanpham';
        $result = $conn->query($sql);
    
        $row_category = []; 
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $row_category[] = $row;
            }
        } else {
            // Xử lý lỗi khi truy vấn không thành công
            echo "Lỗi: " . $conn->error;
        }
    
        $conn->close(); // Đóng kết nối cơ sở dữ liệu
        return $row_category;
    }
    

    function getSizeProducts($tendanhmuc){
        $conn = connectBD();

        $sql = 'SELECT DISTINCT(ktsp.kichthuoc), dmsp.tendanhmuc FROM sanpham sp 
                JOIN chitietsanpham ctsp ON sp.idSanPham = ctsp.idSanPham
                JOIN kichthuocsanpham ktsp ON ctsp.idKichThuoc = ktsp.idKichThuoc
                JOIN danhmucsanpham dmsp ON dmsp.idDanhMuc = sp.idDanhMuc
                WHERE sp.trangthai = 1 AND dmsp.tendanhmuc = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $tendanhmuc);
        $stmt->execute();

        $result = $stmt->get_result();
        $row_size = [];
    
        while ($row = $result->fetch_assoc()) {
            $row_size[] = $row;
        }
    
        return $row_size;
    }

    

    // category ----------------------------------------------------------------
    function getCategoryByProductId($productId){

        $conn = connectBD();

        $productId = (int)$productId;

        if($productId > 0){
        $sql = 'SELECT dmsp.* , sp.tensanpham FROM danhmucsanpham dmsp
            JOIN sanpham sp ON sp.idDanhMuc = dmsp.idDanhMuc
            WHERE sp.idSanPham = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$productId);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
        } else {    
            // Trả về null nếu id không hợp lệ
            return 0;
        }

    }

?>

