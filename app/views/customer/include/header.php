<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="/CuaHangDungCu/vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <script src="/CuaHangDungCu/vendor/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="/CuaHangDungCu/vendor/fontawesome-free-6.6.0-web/css/all.min.css">

    <!-- css header -->
    <link rel="stylesheet" href="/CuaHangDungCu/public/assets/css/customer/header.css">
    <!-- css home -->
    <link rel="stylesheet" href="/CuaHangDungCu/public/assets/css/customer/home.css">
    <title>Trang chủ</title>
</head>
<body>
        <header class="header">
            <nav class="header_nav">
                <div class="nav_logo">
                    <a href="index.php"><img src="/CuaHangDungCu/public/assets/images/logo_den.jpg" class="nav_logo_img" alt="HKN store"></a>                  
                </div>
                <ul class="nav_ul_list text-white ">
                    <li class="nav_ul_list_item"><a href="index.php" class="nav_ul_list_item_link">Trang chủ</a></li>
                    <li class="nav_ul_list_item"><a href="index.php?page=products" class="nav_ul_list_item_link">Sản phẩm</a></li>
                    <li class="nav_ul_list_item"><a href="index.php?page=news" class="nav_ul_list_item_link">Tin tức</a></li>
                    <li class="nav_ul_list_item"><a href="index.php?page=introduce" class="nav_ul_list_item_link">Giới thiệu</a></li>
                    <li class="nav_ul_list_item"><a href="index.php?page=contact" class="nav_ul_list_item_link">Liên hệ</a></li>
                </ul>
                <div class="nav_tool">
                    <form action="">
                        <div class="nav_tool_search">
                            <input type="text" placeholder="Tìm kiếm" id="nav_tool_search_input">
                            <i class="fa-solid fa-magnifying-glass" id="nav_tool_search_icon"></i>
                        </div>
                    </form>
                    <a href="index.php?page=cart">
                        <div class="nav_tool_mark">
                            <div class="nav_tool_cart">
                                <i class="fa-solid fa-cart-shopping text-white"></i>
                            </div>
                        </div>
                    </a>
                    <a href="index.php?page=information">
                        <div class="nav_tool_mark">
                            <div class="nav_tool_user">
                                <i class="fa-solid fa-user text-white"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </nav>
        </header>