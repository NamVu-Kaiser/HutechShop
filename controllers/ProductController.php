<?php
// controllers/ProductController.php
require_once __DIR__ . '/../models/ProductModel.php';

$productModel = new ProductModel($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $productModel->createProduct($_POST['name'], $_POST['description'], $_POST['avatar'], $_POST['category_id']);
        header('Location: /Hutech_Shop/views/product/list.php');
    }
    if (isset($_POST['update'])) {
        $productModel->updateProduct($_POST['id'], $_POST['name'], $_POST['description'], $_POST['avatar'], $_POST['category_id']);
        header('Location: /Hutech_Shop/views/product/list.php');
    }
    if (isset($_POST['delete'])) {
        $productModel->deleteProduct($_POST['id']);
        header('Location: /Hutech_Shop/views/product/list.php');
    }
}
?>