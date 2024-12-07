<?php
require_once __DIR__ . '/../config/db.php';

class ProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllProducts() {
        $sql = "SELECT p.id, p.name, p.description, p.product_image, c.name AS category_name, p.category_id
                FROM Products p
                JOIN Categories c ON p.category_id = c.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $description, $product_image, $category_id) {
        $sql = "INSERT INTO Products (name, description, product_image, category_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $description, $product_image, $category_id]);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM Products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $description, $product_image, $category_id) {
        $sql = "UPDATE Products SET name = ?, description = ?, product_image = ?, category_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $description, $product_image, $category_id, $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM Products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function getProductByName($name) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE name = :name");
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getNextProductId() {
        $sql = "SELECT AUTO_INCREMENT
                FROM information_schema.TABLES
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'Products'";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['AUTO_INCREMENT'];
    }
}
?>
