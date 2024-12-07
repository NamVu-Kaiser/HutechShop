<?php
require_once __DIR__ . '/../shares/header.php';
?>
<div>
    <h1 class="mt-4">Thêm danh mục</h1>
    <form method="POST" action="../../controllers/CategoryController.php">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Thêm</button>
    </form>
</div>
<?php
require_once __DIR__ . '/../shares/footer.php';
?>
