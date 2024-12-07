<?php
require_once __DIR__ . '/../../models/ProductModel.php';
require_once __DIR__ . '/../shares/header.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID không hợp lệ");

$productModel = new ProductModel($pdo);
$product = $productModel->getProductById($id);

$categories = $pdo->query("SELECT * FROM Categories")->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="mt-4" style="text-align: center;">Sửa sản phẩm</h1>
<div>
      
      <form method="POST" action="../../controllers/ProductController.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <div class="mb-3 row" style="padding-top: 50px">
                  <label for="name" class="form-label col-sm-2 col-form-label">Tên sản phẩm</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
                  </div>
            </div>
            <div class="mb-3 row">
                  <label for="description" class="form-label col-sm-2 col-form-label">Mô tả</label>
                  <div class="col-sm-10">
                      <textarea class="form-control" id="description" name="description" rows="3" required><?= $product['description'] ?></textarea>
                  </div>
                  
            </div>
               <div class="mb-3 row">
                      <label for="product_image" class="form-label col-sm-2 col-form-label">Ảnh sản phẩm</label>
                      <div class="col-sm-10">
                              <img id="product_imagePreview" src="/Hutech_Shop/images/category_<?= $product['category_id'] ?>/product_<?= $product['id'] ?>/<?= $product['product_image'] ?>" alt="<?= $product['name'] ?>" style="width: 100px; height: 100px;">
                              <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" style="margin-top: 50px;">
                      </div>
               </div>
               <script>
               document.getElementById('product_image').addEventListener('change', function(event) {
                      const file = event.target.files[0];
                      if (file) {
                               const reader = new FileReader();
                               reader.onload = function(e) {
                                      document.getElementById('product_imagePreview').src = e.target.result;
                               };
                               reader.readAsDataURL(file);
                      }
               });
               </script>
            <div class="mb-3 row">
                  <label for="category_id" class="form-label col-sm-2 col-form-label">Danh mục</label>
                  <div class="col-sm-10">
                      <select class="form-select" id="category_id" name="category_id" required>
                               <?php foreach ($categories as $category): ?>
                                      <option value="<?= $category['id'] ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                      <?= $category['name'] ?>
                                      </option>
                               <?php endforeach; ?>
                      </select>
                  </div>
            </div>
            <div class="d-flex justify-content-end" style="padding-right: 200px;">
               <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
            </div>
      </form>
</div>
<?php
require_once __DIR__ . '/../shares/footer.php';
?>
<style>
      .mb-3{
       padding-left: 200px;
       padding-right: 200px;
       padding-bottom: 30px;
      }
</style>