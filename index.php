<?php
require_once __DIR__ . '/views/shares/header.php'; // Thêm header
require_once __DIR__ . '/models/ProductModel.php'; // Thêm model để lấy danh sách sản phẩm

$productModel = new ProductModel($pdo);
$products = $productModel->getAllProducts(); // Lấy danh sách sản phẩm
?>
<div style="padding: 100px">
     <div class="text-end mb-3" style="padding-bottom: 30px">
          <a href="/Hutech_Shop/views/product/create.php" class="btn btn-primary">Thêm sản phẩm</a>
     </div>
     <table class="table table-bordered">
          <thead>
               <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Avatar</th>
                    <th>Danh mục</th>
                    <th>Hành động</th>
                    <th>Hành động</th>
               </tr>
          </thead>
          <tbody>
               <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                         <tr>
                         <td><?= $product['id'] ?></td>
                         <td><?= $product['name'] ?></td>
                         <td><?= $product['description'] ?></td>
                         <td>
                              <img src="<?= $product['avatar'] ?>" alt="Avatar" width="50" height="50">
                         </td>
                         <td><?= $product['category_name'] ?></td>
                         <td>                        
                                   <a href="update.php?id=<?= $product['id'] ?>" class="btn btn-warning">Sửa</a>
                              </td>
                         <td>                        
                              <form method="POST" action="../../controllers/ProductController.php" style="display:inline;">
                              <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                   <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                              </form>
                              </td>
                         </tr>
                    <?php endforeach; ?>
               <?php else: ?>
                    <tr>
                         <td colspan="5" class="text-center">Không có sản phẩm nào.</td>
                    </tr>
               <?php endif; ?>
          </tbody>
     </table>
</div>


<?php
require_once __DIR__ . '/views/shares/footer.php'; // Thêm footer
?>
