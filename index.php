<?php
require_once __DIR__ . '/views/shares/header.php'; // Thêm header
require_once __DIR__ . '/models/ProductModel.php'; // Thêm model để lấy danh sách sản phẩm
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh mục sản phẩm</title>
  <style>
    .category-list {
      width: 300px; /* Điều chỉnh độ rộng của danh mục */
      background-color: #f0f0f0;
      float: left; /* Căn trái */
    }

    .category-list h2 {
      background-color: #e0001a; /* Màu đỏ */
      color: white;
      padding: 10px;
      margin: 0;
      text-align: center;
    }

    .category-list ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .category-list li {
      padding: 10px;
      border-bottom: 1px solid #ddd; /* Thêm đường viền dưới mỗi mục */
      display: flex; /* Sử dụng flexbox để căn chỉnh icon và text */
      align-items: center; /* Căn giữa theo chiều dọc */
    }

    .category-list li img {
      width: 24px; /* Điều chỉnh kích thước icon */
      height: 24px;
      margin-right: 10px; /* Thêm khoảng cách giữa icon và text */
    }

    .category-list li a {
      text-decoration: none;
      color: #333; /* Màu chữ */
      flex-grow: 1; /* Cho phép text co giãn */
    }

    .category-list li:hover {
      background-color: #ddd; /* Màu nền khi hover */
    }

    .highlighted {
      background-color: #e0001a; /* Màu đỏ cho mục được chọn */
      color: white; /* Màu chữ trắng cho mục được chọn */
    }

    .product-list {
      margin-left: 320px; /* Để sản phẩm nằm bên phải danh mục */
    }

    .product-item {
      display: inline-block;
      width: 30%;
      margin: 1%;
      text-align: center;
      border: 1px solid #ddd;
      padding: 10px;
      box-sizing: border-box;
    }

    .product-item img {
      max-width: 100%;
      height: auto;
    }

    .product-item h3 {
      font-size: 1.2em;
      margin: 10px 0;
    }

    .product-item p {
      color: #e0001a; /* Màu đỏ */
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="category-list">
    <h2>DANH MỤC SẢN PHẨM</h2>
    <ul>
      <li>
        <!-- <img src="icon-dien-gia-dung.png" alt="Điện gia dụng"> -->
        <a href="#">Điện thoại</a>
      </li>
      <li>
        <!-- <img src="icon-do-gia-dung.png" alt="Đồ gia dụng"> -->
        <a href="#">Laptop</a>
      </li>
    </ul>
  </div>

  <div class="product-list">
    <div class="product-item">
      <img src="product1.jpg" alt="Sản phẩm 1">
      <h3>sản phẩm 1</h3>
      <p>Giá: 1.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product2.jpg" alt="Sản phẩm 2">
      <h3>Sản phẩm 2</h3>
      <p>Giá: 2.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product3.jpg" alt="Sản phẩm 3">
      <h3>Sản phẩm 3</h3>
      <p>Giá: 3.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product4.jpg" alt="Sản phẩm 4">
      <h3>Sản phẩm 4</h3>
      <p>Giá: 4.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product5.jpg" alt="Sản phẩm 5">
      <h3>Sản phẩm 5</h3>
      <p>Giá: 5.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product6.jpg" alt="Sản phẩm 6">
      <h3>Sản phẩm 6</h3>
      <p>Giá: 6.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product7.jpg" alt="Sản phẩm 7">
      <h3>Sản phẩm 7</h3>
      <p>Giá: 7.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product8.jpg" alt="Sản phẩm 8">
      <h3>Sản phẩm 8</h3>
      <p>Giá: 8.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product9.jpg" alt="Sản phẩm 9">
      <h3>Sản phẩm 9</h3>
      <p>Giá: 9.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product10.jpg" alt="Sản phẩm 10">
      <h3>Sản phẩm 10</h3>
      <p>Giá: 10.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product11.jpg" alt="Sản phẩm 11">
      <h3>Sản phẩm 11</h3>
      <p>Giá: 11.000.000 VND</p>
    </div>
    <div class="product-item">
      <img src="product12.jpg" alt="Sản phẩm 12">
      <h3>Sản phẩm 12</h3>
      <p>Giá: 12.000.000 VND</p>
    </div>
  </div>

  <?php require_once __DIR__ . '/views/shares/footer.php'; // Thêm footer ?>
</body>
</html>