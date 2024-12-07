<?php
require_once __DIR__ . '/../../models/ProductModel.php';
require_once __DIR__ . '/../shares/header.php';

$productModel = new ProductModel($pdo);
$products = $productModel->getAllProducts();
?>
<h1 class="mt-4">Danh sách sản phẩm</h1>
<div style="padding: 100px;">
    <div class="text-end mb-3" style="padding-bottom: 30px">
        <a href="/Hutech_Shop/views/product/create.php" class="btn btn-primary">Thêm sản phẩm</a>
    </div>
    <table class="table table-bordered">
       <thead>
          <tr>
             <th>Mã sản phẩm</th>
             <th>Tên sản phẩm</th>
             <th>Mô tả</th>
             <th>Ảnh sản phẩm</th>
             <th>Danh mục sản phẩm</th>
             <th>Hành động</th>
             <th>Hành động</th>
          </tr>
       </thead>
    <tbody>
       <?php foreach ($products as $product): ?>
          <tr>
          <td><?= $product['id'] ?></td>
          <td><?= $product['name'] ?></td>
          <td><?= $product['description'] ?></td>
          <td>
              <img src="/Hutech_Shop/images/category_<?= $product['category_id'] ?>/product_<?= $product['id'] ?>/<?= $product['product_image'] ?>" alt="<?= $product['name'] ?>" style="width: 100px; height: 100px;">
          </td>
          <td><?= $product['category_name'] ?></td>
          
          <td>
              <a href="update.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
          </td>
          <td>
              <form method="POST" action="../../controllers/ProductController.php" style="display:inline;">
               <input type="hidden" name="id" value="<?= $product['id'] ?>">
               <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
              </form>
          </td>
          </tr>
       <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php
require_once __DIR__ . '/../shares/footer.php';
?>
<style>
    .mt-4{
        text-align: center;
    }
</style>