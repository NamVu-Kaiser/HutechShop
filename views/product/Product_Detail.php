<?php
require_once __DIR__ . '/../shares/header.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Chi tiết sản phẩm</title>
  <style>
    .product-container {
      display: flex;
      align-items: flex-start;
      margin-top: 50px;
      margin-bottom: 50px;
      max-width: 1200px; 
      margin-left: auto;
      margin-right: auto; 
      flex-wrap: wrap;
      gap: 20px;
    }

    .product-image {
      width: 400px; 
      height: auto;
      margin-right: 20px;
    }

    .product-details {
      line-height: 1.5;
      flex: 1; 

      display: flex;
      flex-direction: column; 
      align-items: center;
    }

    .product-name {
      font-size: 36px; 
      font-weight: bold;
      margin-bottom: 20px; 
    }

    .product-price {
      font-size: 24px; 
      color: red;
      margin-bottom: 30px; 
    }

    .btn {
        
  /* display: inline-block; */
  padding: 30px 30px; /* Tăng padding top và bottom */
  background-color: #e4002b;
  color: white;
  text-decoration: none;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 10px;
  font-size: 18px; 
  width: 48%;
  box-sizing: border-box;
}

.buttons {
    width: 100%;
  display: flex; /* Sử dụng Flexbox để sắp xếp các nút */
  justify-content: space-between; /* Phân bố đều khoảng cách giữa các nút */
  gap: 20px; /* Khoảng cách giữa hai nút */
}

.btn-secondary {
  background-color: #f0f0f0;
  color: #333;
}

    @media (max-width: 768px) {
      .product-container {
        flex-direction: column;
        align-items: center; 
      }
      .product-image {
        max-width: 100%;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

<div class="product-container">
  <img class="product-image" src="/media/images/category_1/product_1/iphone11.jpg" alt="Tên sản phẩm">

  <div class="product-details">
    <h2 class="product-name">Tên sản phẩm</h2>
    <p class="product-price">Giá: 1.000.000 VND</p>
    <!-- <button class="btn btn-secondary">Thêm vào giỏ hàng</button>
    <button class="btn">Mua ngay</button> -->
    <div class="buttons"> <div class="buttons">
    <button class="btn btn-secondary">Thêm vào giỏ hàng</button>
    <button class="btn">Mua ngay</button>
  </div> 
</div>
</div>

</body>
</html>
