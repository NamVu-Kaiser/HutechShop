<?php
// models/ProductModel.php
require_once __DIR__ . '/../config/db.php';

class ProductModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllProducts() {
        $sql = "SELECT p.id, p.name, p.description, p.avatar, c.name AS category_name
                FROM Products p
                JOIN Categories c ON p.category_id = c.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $description, $avatar, $category_id) {
        $sql = "INSERT INTO Products (name, description, avatar, category_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $description, $avatar, $category_id]);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM Products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $description, $avatar, $category_id) {
        $sql = "UPDATE Products SET name = ?, description = ?, avatar = ?, category_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $description, $avatar, $category_id, $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM Products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
