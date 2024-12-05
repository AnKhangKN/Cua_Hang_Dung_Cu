<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}


include_once "../../app/controllers/employee/all_function.php";

if(isset($_SESSION['user_id'])){
    $id = $_SESSION['user_id'];
    $info = getInfo($id);
}


?>



<main class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="container_left">
                        <!-- Phan lam -->
                        <div class="search-container">
                            <div class="search-box-sp">
                                <input type="text" id="search" placeholder="Nhập từ khóa tìm kiếm">                    
                            </div>
                        </div>
<!-- ---------------------------------------------------------------- -->
                        <div class="container_table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $Product = getProduct();

                                    foreach ($Product as $Row){
                                        ?>
                                        
                                    <tr class="cell_product">
                                        <td class="idSanPham"><?php echo htmlentities($Row['idSanPham'])?></td>
                                        <td class="tenSanPham"><?php echo htmlentities($Row['tensanpham'])?></td>
                                        <td >
                                            <div class="product_img" style="width: 90px;">
                                                <img class="w-100 h-100 object-fit-cover imgSanPham" 
                                                src="../../public/assets/images/products/<?php echo htmlentities($Row['urlHinhAnh'])?>" alt="">
                                            </div>
                                        </td>
                                        <td class="giaSanPham"><?php echo number_format($Row['dongia'], 0, ',', '.')?></td>
                                    </tr>
                                        
                                        <?php
                                    }
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        <!-- modal detail -->
                        <div id="modal_product_detail">
                            <div class="container_product w-50 h-75 bg-white rounded-2">
                                <div class="product_detail p-5  ">
                                    <div class="product_detail_header d-flex align-content-center">
                                        <div class="product_img w-25">
                                            <img id="imgProduct" class="w-100 h-100 object-fit-cover" src="../../public/assets/images/products/ao-the-thao-nam-demo.jpg" alt="">
                                        </div>
                                        <div class="product_name">
                                            <span id="idSanPham" class="d-block"></span>
                                            <p id="ProductName"></p>
                                        </div>
                                    </div>

                                    <div id="product_detail_body">
                                        
                                    </div>
                                    <div>Giá sản phẩm: <span  id="ProductPrice"></span></div>
                                    
                                    <div class="idchitietsanpham">
                                        <span>Id chi tiết sản phẩm: </span>
                                        <span id="idchitietsanpham"></span>
                                    </div>
                                    <div class="soluongconlai">
                                        
                                        <span>Số lượng còn lại: </span>
                                        <span id="late_amount"></span>
                                    </div>
                                        
                                    <div class="amount d-flex">
                                    <span>Số lượng: </span>
                                        <button>
                                        <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <input type="text" value="0">
                                        <button>
                                        <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                    

                                    <div class="product_detail_footer d-flex justify-content-between align-content-center">
                                        <button id="close">Trở lại</button>
                                        <button id="add">Thêm vào mua hàng</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

<!-- ---------------------------------------------------------------- -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="container_right">
                        <div class="search-container">
                            <div class="search-box-pay">
                              <input class="form-control" id="myInput" type="text" placeholder="Nhập số điện khách hàng">
                              <br>
                              <ul class="list-group" id="myList">
                              <li class="list-group-item"></li>
                              </ul>      
                                            
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $("#myInput").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                        $("#myList li").filter(function() {
                                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
                            </script>                          
                        </div>
                    </div>
                        <div class="container_payment ">
                            <h5 class="text-center">THANH TOÁN</h5>
                          <div class="title_payment">
                            <p>Tên khách hàng: </p>
                            <p>Số điện thoại: </p>
                            <p>Nhân viên bán hàng:</p> 
                          </div>
                          <div class="content_payment">
                            <table class="table">
                              <thead>
                                <th>Tên sản phẩm</th>
                                <th>Giá </th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                              </thead>
                              <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tbody>
                            </table>
                          </div>

                          <div class="action_payment">
                            <button type="button" class="btn bg-dark text-white">Tạm tính</button>
                            <button type="button" class="btn bg-dark text-white">Thanh toán</button>
                          </div>  

                        </div>    
                                    
                    </div>
                </div>   

            
            </div>
        </div>
        
    </main>