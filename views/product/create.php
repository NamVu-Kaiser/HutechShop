<?php
require_once __DIR__ . '/../../models/ProductModel.php';
require_once __DIR__ . '/../shares/header.php';

$categories = $pdo->query("SELECT * FROM Categories")->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
    <h1 class="mt-4">Thêm sản phẩm</h1>
    <form method="POST" action="../../controllers/ProductController.php">
     <div class="mb-3 row">
         <label for="name" class="form-label col-sm-2 col-form-label">Tên sản phẩm</label>
         <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" required>
         </div>
     </div>
     <div class="mb-3 row">
         <label for="description" class="form-label col-sm-2 col-form-label">Mô tả</label>
         <div class="col-sm-10">
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
         </div>
     </div>
     <div class="mb-3 row">
         <label for="avatar" class="form-label col-sm-2 col-form-label">Ảnh</label>
         <div class="col-sm-10">
             <div id="image-preview" class="mb-3"></div>
             <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
         </div>
     </div>
     <script>
     document.getElementById('avatar').addEventListener('change', function(event) {
          const file = event.target.files[0];
          if (file) {
               const reader = new FileReader();
               reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    const preview = document.getElementById('image-preview');
                    preview.innerHTML = '';
                    preview.appendChild(img);
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
               <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
              <?php endforeach; ?>
          </select>
         </div>
     </div>
     <div class="d-flex justify-content-end" style="padding-right: 200px;">
         <button type="submit" name="create" class="btn btn-primary">Thêm</button>
     </div>
    </form>
</div>
<?php
require_once __DIR__ . '/../shares/footer.php';
?>
<style>
    .mt-4 {
     text-align: center;
    }
    .mb-3{
     padding-left: 200px;
     padding-right: 200px;
     padding-bottom: 30px;
    }
</style>