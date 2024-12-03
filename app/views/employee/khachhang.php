<?php
include_once "../../app/controllers/employee/all_function.php";
?>




<main class="main">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-6">
                  <div class="container_left">
                      <!-- Phan lam -->
                      <div class="search-container">
                          <div class="search-box">
                              <input type="text" id="search" placeholder="Nhập từ khóa tìm kiếm">    
                                            
                          </div>
                          
                      </div>
                      <div class="container_table">
                          <table class="table table-hover text-center">
                              <thead>
                                <tr>
                                  <th>Mã khách hàng</th>
                                  <th>Tên khách hàng</th>
                                  <th>Số điện thoại</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $Customer = getCustomer();
                              foreach($Customer as $row){
                                  ?>    
                                <tr>
                                  <td><?php echo htmlentities($row['idKhachHang'])?></td>
                                  <td><?php echo htmlentities($row['tenkhachhang'])?></td>
                                  <td><?php echo htmlentities($row['sdt'])?></td>
                                </tr>
                                <?php
                              }
                              ?>

                            
                                
                               
                              </tbody>
                            </table>
                      </div>
                      
                  </div>


              </div>
              <div class="col-lg-6">
                  <div class="container_right">
                      <div class="add text-center">
                          <h4>THÊM KHÁCH HÀNG</h4>                                        
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Tên khách hàng:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
                        <div class="col-sm-10">          
                          <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Địa chỉ:</label>
                        <div class="col-sm-10">          
                          <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Email:</label>
                        <div class="col-sm-10">          
                          <input type="text" class="form-control" id="address" placeholder="Nhập email" name="address">
                        </div>
                      </div>
                      <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="button" class="btn_kh btn-dark center">Thêm</button>
                        </div>
                      </div>

                  
                  </div>
              </div>

          
          </div>
      </div>
      
  </main>