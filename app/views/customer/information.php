<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../app/controllers/customer/customerController.php';

if(isset($_SESSION['user_id'])) {

    $id = $_SESSION['user_id'];
    $Customer = getCustomerById($id);
    $Account = getAccountById($id);
    
} 

?>


<main class="main">
            <!-- position sub -->
            <ul class="position_top">
            <li class="position_top_li_home">
                <a href="index.php" style="text-decoration: none; color: #333;">
                    <span class="position_top_main">Trang chủ</span>
                </a>
            </li>
            <li class="position_top_li">
                <span class="position_top_sub">Thông tin của bạn</span>
            </li> 
        </ul>
            <div class="container container_infor_control">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="sidebar">
                            <ul class="sidebar_list">
                                <li onclick="showContent('overview', this)" class="view_infor">Hồ sơ</li>
                                <li onclick="showContent('mail', this)" class="view_infor">Hộp thư</li>
                                <li onclick="showContent('setting', this)" class="view_infor">Cài đặt</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="content">
                            <div id="overview" class="content-section">
                                <div class="title_infor">
                                    <span>Xin chào, </span>
                                    
                                    <span class="title_infor_name"><?php echo htmlentities($Customer['tenkhachhang'])?></span>
                                </div>
                                <div class="purchase_history">
                                    <p id="purchase_history_btn">Lịch sử mua hàng <i class="fa fa-history" aria-hidden="true"></i></p>
                                </div>
                                <div class="purchase_history_show" id="purchase_history_show_hidden">
                                    <table class="table table-striped" >
                                        <thead>
                                            <tr>
                                                <th>Mã hóa đơn</th>
                                                <th>Tổng tiền</th>
                                                <th>Ngày xuất hóa đơn</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $Bill = getBillsByIdCustomer($Customer['idKhachHang']);
                                                
                                                foreach($Bill as $rowBill){

                                                    ?>
                                            <tr>
                                                <td><?php echo htmlentities($rowBill['idHoaDon'])?></td>
                                                <td><?php echo number_format($rowBill['tongtien'], 0, ',', '.')?></td>
                                                <td><?php echo htmlentities($rowBill['ngayxuathoadon'])?></td>
                                                <td><?php 
                                                
                                                    if($rowBill['trangthai'] == 0){
                                                        $trangthai = 'Đang chờ xử lý';
                                                    } elseif($rowBill['trangthai'] == 2){
                                                        $trangthai = 'Hoàn thành';
                                                    } elseif ($rowBill['trangthai']== 1){
                                                        $trangthai = 'Đang giao hàng';
                                                    } else {
                                                        $trangthai = 'Không xác định đơn hàng';
                                                    }
                    
                                                    echo htmlentities($trangthai)
                                                ?></td>
                                                <td><a href="index.php?page=details_bill&idBill=<?php

                                                    if($rowBill['trangthai'] == 0 || $rowBill['trangthai'] == 1 || $rowBill['trangthai'] == 2){
                                                        echo htmlentities($rowBill['idHoaDon']);
                                                    }else{
                                                        echo htmlentities(0);
                                                    }
                                                
                                                
                                                ?>" style="color: #333;"><i class="fa-solid fa-eye "></i></a></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="promotion">
                                    <p>Các chương trình khuyến mãi dành cho bạn <i class="fa-solid fa-arrow-pointer"></i></p>
                                </div>
                                <div class="promotion_show">
            
                                </div>
                                
                            </div>
                            <div id="mail" class="content-section">
                                <div class="mail_contents">
                                    <p>Hiện chưa có.</p>
                                </div>
                            </div>
                            <div id="setting" class="content-section">
                                <div class="infor_update">
                                    <div class="infor_update_item">
                                        <span>Họ và tên</span>
                                        <p class="infor_update_item_text"><?php echo htmlentities($Customer['tenkhachhang'])?></p>
                                        <i class="fa-regular fa-pen-to-square" id="clickChangeName"></i>
                                    </div>
                                    
                                    <div class="infor_update_item">
                                        <span>Số điện thoại</span>
                                        <p class="infor_update_item_text">0<?php echo htmlentities($Customer['sdt'])?></p>
                                        <i class="fa-regular fa-pen-to-square" id="clickChangePhone"></i>
                                    </div>
                                    
                                    <div class="infor_update_item">
                                        <span>Địa chỉ</span>
                                        <p class="infor_update_item_text"><?php echo htmlentities($Customer['diachi'])?></p>
                                        <i class="fa-regular fa-pen-to-square" id="clickChangeAddress"></i>
                                    </div>
            
                                    <div class="infor_update_item">
                                        <span>email</span>
                                        <p class="infor_update_item_text"><?php echo htmlentities($Account['email'])?></p>
                                        <i class="fa-regular fa-pen-to-square" id="clickChangeEmail"></i>
                                    </div>
            
                                    <div class="infor_update_item">
                                        <span>mật khẩu</span>
                                        <p class="infor_update_item_text"><?php 
                                        $password = $Account['matkhau'];
                                        $maskedPassword = str_repeat('*', strlen($password));
                                        echo htmlentities($maskedPassword);
                                        ?></p>
                                        <i class="fa-regular fa-pen-to-square" id="clickChangePass"></i>
                                    </div>
                                </div>
                                
                                <!-- hiện để chỉnh sửa thông tin -->
                                <div class="modal_change">
                                    <div class="modal_container" id="changeName">
                                        <div class="modal_header">
                                            <div class="modal_header_remove">
                                            <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <p>Họ và Tên</p>
                                        </div>
                                        <div class="modal_body">
                                            <input type="text" name="name" class="change_input">
                                        </div>
                                        <div class="modal_footer">
                                            <button class="btnChange">Lưu lại thay đổi</button>
                                        </div>
                                    </div>

                                    <div class="modal_container" id="changePhone">
                                        <div class="modal_header">
                                            <div class="modal_header_remove">
                                            <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <p>Số điện thoại</p>
                                        </div>
                                        <div class="modal_body">
                                            <input type="text" name="phone" class="change_input">
                                        </div>
                                        <div class="modal_footer">
                                            <button class="btnChange">Lưu lại thay đổi</button>
                                        </div>
                                    </div>

                                    <div class="modal_container" id="changeAddress">
                                        <div class="modal_header">
                                            <div class="modal_header_remove">
                                            <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <p>Địa chỉ</p>
                                        </div>
                                        <div class="modal_body">
                                            <input type="text" name="address" class="change_input">
                                        </div>
                                        <div class="modal_footer">
                                            <button class="btnChange">Lưu lại thay đổi</button>
                                        </div>
                                    </div>

                                    <div class="modal_container" id="changeEmail">
                                        <div class="modal_header">
                                            <div class="modal_header_remove">
                                            <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <p>Email</p>
                                        </div>
                                        <div class="modal_body">
                                            <input type="text" name="email" class="change_input">
                                        </div>
                                        <div class="modal_footer">
                                            <button class="btnChange">Lưu lại thay đổi</button>
                                        </div>
                                    </div>

                                    <div class="modal_container" id="changePassword">
                                        <div class="modal_header">
                                            <div class="modal_header_remove">
                                            <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <p>Mật Khẩu</p>
                                        </div>
                                        <div class="modal_body">

                                            <div class="modal_body_pass">
                                                <span>Mật khẩu cũ *</span>
                                                <input type="password" id="PassLate">
                                                <i class="fa-solid fa-eye-slash " id="showPassLate"></i>
                                            </div>
                                            <div class="modal_body_pass" style="margin: 25px 0px;">
                                                <span>Mật khẩu mới *</span>
                                                <input type="password" id="PassNew">
                                                <i class="fa-solid fa-eye-slash " id="showPassNew"></i>
                                            </div>
                                            <div class="modal_body_pass">
                                                <span>Xác nhận lại *</span>
                                                <input type="password" id="PassConfirm">
                                                <i class="fa-solid fa-eye-slash " id="showPassConfirm"></i>
                                            </div>
                                            
                                        </div>
                                        <div class="modal_footer">
                                            <button>Lưu lại thay đổi</button>
                                        </div>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
        </main>