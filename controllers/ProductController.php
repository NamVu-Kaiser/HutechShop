<?php
// controllers/ProductController.php
require_once __DIR__ . '/../models/ProductModel.php';

$productModel = new ProductModel($pdo);

// Hàm hỗ trợ: Tạo thư mục nếu chưa tồn tại
function createFolderIfNotExists($path) {
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

// Hàm hỗ trợ: Kiểm tra file đã tồn tại chưa
function isFileExists($folderPath, $fileName) {
    return file_exists($folderPath . '/' . $fileName);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $productImage = $_FILES['product_image'] ?? null;

        // 1. Tạo thư mục theo mã danh mục và mã sản phẩm
        $newProductId = $productModel->getNextProductId();
        $categoryFolder = __DIR__ . "/../images/category_$category_id/product_$newProductId";
        createFolderIfNotExists($categoryFolder);

        // 2. Kiểm tra sản phẩm có tồn tại chưa
        $existingProduct = $productModel->getProductByName($name);
        if ($existingProduct) {
            die('Sản phẩm đã tồn tại!');
        }

        // 3. Lưu hình ảnh sản phẩm
        if ($productImage && $productImage['error'] === UPLOAD_ERR_OK) {
            $imageName = basename($productImage['name']);
            $imagePath = $categoryFolder . '/' . $imageName;

            if (isFileExists($categoryFolder, $imageName)) {
                die('Hình ảnh đã tồn tại!');
            }
            move_uploaded_file($productImage['tmp_name'], $imagePath);
        } else {
            die('Lỗi tải hình ảnh!');
        }

        // 4. Thêm sản phẩm vào DB
        $productModel->createProduct($name, $description, $imageName, $category_id);

        header('Location: /Hutech_Shop/views/product/list.php');
        exit;
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $productImage = $_FILES['product_image'] ?? null;

        // 1. Lấy thông tin sản phẩm cũ từ DB
        $product = $productModel->getProductById($id);
        if (!$product) {
            die('Sản phẩm không tồn tại!');
        }

        // 2. Tạo thư mục cho danh mục và sản phẩm
        $productFolder = __DIR__ . "/../images/category_$category_id/product_$id";
        createFolderIfNotExists($productFolder);

        // 3. Xử lý hình ảnh mới nếu có
        $imageName = $product['product_image'];
        if ($productImage && $productImage['error'] === UPLOAD_ERR_OK) {
            $imageName = basename($productImage['name']);
            $imagePath = $productFolder . '/' . $imageName;

            if (!isFileExists($productFolder, $imageName)) {
                move_uploaded_file($productImage['tmp_name'], $imagePath);
            }
        }

        // 4. Cập nhật sản phẩm trong DB
        $productModel->updateProduct($id, $name, $description, $imageName, $category_id);

        header('Location: /Hutech_Shop/views/product/list.php');
        exit;
    }

    if (isset($_POST['delete'])) {
        $productModel->deleteProduct($_POST['id']);
        header('Location: /Hutech_Shop/views/product/list.php');
        exit;
    }
}
?>
