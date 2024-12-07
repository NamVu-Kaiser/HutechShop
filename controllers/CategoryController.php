<?php
// controllers/CategoryController.php
require_once __DIR__ . '/../models/CategoryModel.php';

$categoryModel = new CategoryModel($pdo);

// Thêm danh mục
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $categoryModel->createCategory($name);
        header('Location: /HutechShop/views/categories/list.php');
    }

    // Sửa danh mục
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $categoryModel->updateCategory($id, $name);
        header('Location: /HutechShop/views/categories/list.php');
    }

    // Xóa danh mục
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $categoryModel->deleteCategory($id);
        header('Location: /HutechShop/views/categories/list.php');
    }
}
