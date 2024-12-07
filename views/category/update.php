<?php
require_once __DIR__ . '/../../models/CategoryModel.php';
require_once __DIR__ . '/../shares/header.php';

$id = $_GET['id'] ?? null;
if (!$id) die("ID không hợp lệ");

$categoryModel = new CategoryModel($pdo);
$category = $categoryModel->getCategoryById($id);
?>
<div>
    <h1 class="mt-4">Sửa danh mục</h1>
    <form method="POST" action="../../controllers/CategoryController.php">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $category['name'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
<?php
require_once __DIR__ . '/../shares/footer.php';
?>
