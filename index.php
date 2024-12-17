<?php 
     require_once 'views/shares/header.php';
     require_once 'controllers/ProductController.php';
     require_once 'controllers/CategoryController.php';

     $categoryController = new CategoryController($pdo);
     $categories = $categoryController->GetAllCategories();

     $productController = new ProductController($pdo);
     $products = $productController->GetAllProducts();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh mục sản phẩm</title>
</head>
<body>
     <div class="category-list">
          <h2>DANH MỤC</h2>
          <?php foreach($categories as $category): ?>
               <ul>
                    <li>
                         <a href="/views/product/Category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                    </li>
               </ul>
          <?php endforeach; ?>
     </div>

     <div class="product-list">
          <?php foreach($products as $product): ?>
               <div class="product-item">
                    <!-- <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>"> -->
                    <h3><?php echo $product['name']; ?></h3>
                    <p>Giá: <?php echo number_format($product['price']); ?> VND</p>
               </div>
          <?php endforeach; ?>
          </div>
     </div>

  <?php require_once 'views/shares/footer.php';?>
</body>
</html>