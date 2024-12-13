<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E Shop</title>
  <style>
    /* CSS cơ bản cho giao diện */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    header {
      background-color: #fff;
      padding: 10px 0;
      border-bottom: 2px solid #e0001a;
    }

    .header .container {
      display: flex;
      flex-direction: column; /* Thay đổi flex-direction thành column */
      align-items: center;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: #e0001a;
    }

    .actions {
      display: flex;
      align-items: center;
    }

    .actions a {
      display: flex;
      align-items: center;
      margin-left: 20px;
      text-decoration: none;
      color: #333;
    }

    .actions img {
      height: 20px; /* Giảm kích thước icon */
      margin-right: 5px;
    }

    .search-form {
      display: flex;
      align-items: center;
      border: 2px solid #e0001a;
      padding: 5px;
      border-radius: 5px;
      flex-grow: 1;
      margin: 10px 0; /* Thêm margin-top */
      width: 100%;
    }

    .search-form input[type="text"] {
      border: none;
      padding: 5px;
      flex-grow: 1;
    }

    .search-form button {
      background-color: #e0001a;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <header>
    <div class="container">
      <div class="top-bar"> 
        <div class="logo">
          E Shop
        </div>
        <div class="actions">
          <a href="/views/user/Login.php">
            <img src="/images/logo1.png" alt="Icon User">
            Đăng nhập
          </a>
          <a href="/views/user/Login.php">
            <img src="/images/cart.png" alt="Icon Cart">
            Giỏ hàng
          </a>
        </div>
      </div>
      <form action="#" method="get" class="search-form">
        <input type="text" placeholder="Nhập từ khóa tìm kiếm">
        <button type="submit">Tìm kiếm</button>
      </form>
    </div>
  </header>

</body>
</html>