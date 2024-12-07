<?php
require_once __DIR__ . '/../../models/CategoryModel.php';
require_once __DIR__ . '/../shares/header.php';

$categoryModel = new CategoryModel($pdo);
$categories = $categoryModel->getAllCategories();
?>
<div>
    <h1 class="mt-4" style="text-align: center;">Danh mục sản phẩm</h1>
    <div class="text-end mb-3" style="padding-right: 100px;">
        <a href="create.php" class="btn btn-primary">Thêm danh mục</a>
    </div>
    <div style="padding-left: 100px;padding-right:100px;padding-top:50px;padding-bottom:50px">
     <table class="table table-bordered">
          <thead>
               <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Hành động</th>
                    <th>Hành động</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($categories as $category): ?>
                    <tr>
                         <td><?= $category['id'] ?></td>
                         <td><?= $category['name'] ?></td>
                         <td class="button-in-table">
                         <a href="update.php?id=<?= $category['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                         </td>
                         <td class="button-in-table">
                              <form method="POST" action="../../controllers/CategoryController.php" style="display:inline;">
                                   <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                   <button type="submit" name="delete" class="btn btn-danger btn-sm">Xóa</button>
                              </form>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
    </div>

</div>
<?php
require_once __DIR__ . '/../shares/footer.php';
?>
<style>
     th{
          text-align: center;
     }
     .button-in-table{
          text-align: center;
          vertical-align: middle;
     }
</style>