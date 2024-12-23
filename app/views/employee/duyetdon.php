<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}


include_once "../../app/controllers/employee/all_function.php";

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
}
?>


<main class="main">
        <div class="container-fluid">
            <div class="row">
                
            <div class="container">
                
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày tạo</th>
                            <th>Tên khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="myTable_bill">
                    <?php
                    $Browse = getBrowse();
                    foreach ($Browse as $Row){
                        ?>
                    
                    <tr class="cell_bill text-center">
                        <td class="idHoaDon"><?php echo htmlentities($Row['idHoaDon'])?></td>
                        <td class="ngayxuathoadon"><?php echo htmlentities($Row['ngayxuathoadon'])?></td>
                        <td>
                            <span class="idKhachHang d-none"><?php echo htmlentities($Row['idKhachHang'])?></span>
                            <span class="tenkhachhang"><?php echo htmlentities($Row['tenkhachhang'])?></span>
                            <p class="sdt d-none"><?php echo htmlentities($Row['sdt'])?></p>
                            <p class="diachi d-none"><?php echo htmlentities($Row['diachi'])?></p>
                        </td>
                        <td class="tongtien"><?php echo number_format($Row['tongtien'], 0, ',', '.')?></td>
                        <td class="ghichu"><?php echo htmlentities($Row['ghichu'])?></td>
                        <td class="trangthai text-center">
                            <?php $tinhtrang = $Row['trangthai'];
                            
                            if($tinhtrang === 0){
                                ?>
<<<<<<< HEAD
                                <button class="btn btn-dark">Chi tiết</button>
=======
                                <span class="status"><?php echo htmlentities($Row['trangthai'])?></span>
                                <button class="show_confirm_bill btn btn-dark">Chi tiết</button>
>>>>>>> 89654d673ab7bbeceb056065af004fade7f258fb
                                <?php
                            }
                            if($tinhtrang === 2){
                                ?>
                                <p>Đơn hàng đã được xử lý</p>
                                <?php
                            }
                            if($tinhtrang === 1){
                                ?>
                                <p>Đơn hàng đã bị hủy</p>
                                <?php
                            }
                            
                            
                            ?>
                        </td>
                    </tr>
                        
                        
                        <?php
                    }
                    
                    ?>
                                    

                    </tbody>
                </table>
            
            </div>
        </div>
        <div id="model_detail_confirm_bill" class=" chitiet justify-content-center align-items-center position-fixed top-0 bottom-0 start-0 end-0">

<<<<<<< HEAD
            <div class="container_model" style="width: 500px; height: 500px;">
                    <div class="model w-100 h-100 bg-white">
                        <p style="margin: 10px; font-weight: 600;">Mã đơn:</p>
                        <p style="margin: 10px; font-weight: 600;">Tên khách hàng:</p>
                        <p style="margin: 10px; font-weight: 600;">Địa chỉ:</p>
                        <p style="margin: 10px; font-weight: 600;">Số điện thoại:</p>
                       
                        
=======
            <div class="container_model">
                    <div class="model w-100 h-100 bg-white p-4 rounded-2">
                        <div class="model_title mb-5 d-flex justify-content-between align-items-center">
                            <h4>Chi tiết hóa đơn</h4>
                            <div id="close_confirm_bill" class="btn btn btn-outline-dark" >
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                            
                        </div>
                        <div class="model_content">
                            <div class="model_item mt-2 d-flex">
                                <p class="fw-bold" style="width: 155px;">Mã hóa đơn: </p>
                                <p id="idHoaDon_xn" style="min-width: 155px;">1</p>
                            </div>
                            <div class="model_item mt-2 d-flex">
                                <p class="fw-bold" style="width: 155px;">Tên khách hàng: </p>
                                <p id="ten_xn"  style="min-width: 155px;">Phan An Khang</p>
                            </div>
                            <div class="model_item mt-2 d-flex">
                                <p class="fw-bold" style="width: 155px;">Số điện thoại: </p>
                                <p id="sdt_xn"  style="min-width: 155px;">0992493</p>
                            </div>
                            <div class="model_item mt-2 d-flex">
                                <p class="fw-bold" style="width: 155px;">Địa chỉ: </p>
                                <p id="diachi_xn"  style="min-width: 155px;">cà mau</p>
                            </div>
                            <div class="model_item mt-2 d-flex">
                                <p class="fw-bold" style="width: 155px;">Trạng thái: </p>
                                <p id="trangthai_xn"  style="min-width: 155px;">đang xử lý</p>
                            </div>
                            
                        </div>
                        <div class="model_action d-flex justify-content-between mt-5 align-items-center">
                            <button class="btn btn-light" id="cancel_bill">Hủy đơn</button>
                            <button class="btn btn-dark" id="confirm_bill">Xác nhận</button>
                        </div>
>>>>>>> 89654d673ab7bbeceb056065af004fade7f258fb
                    </div>
            </div>
        </div>
</main>