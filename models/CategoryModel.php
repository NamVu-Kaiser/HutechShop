<?php
// models/CategoryModel.php
require_once __DIR__ . '/../config/db.php';

class CategoryModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Lấy tất cả danh mục
    public function getAllCategories() {
        $sql = "SELECT * FROM Categories";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm danh mục
    public function createCategory($name) {
        $sql = "INSERT INTO Categories (name) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name]);
    }

    // Lấy danh mục theo ID
    public function getCategoryById($id) {
        $sql = "SELECT * FROM Categories WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật danh mục
    public function updateCategory($id, $name) {
        $sql = "UPDATE Categories SET name = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $id]);
    }

    // Xóa danh mục
    public function deleteCategory($id) {
        $sql = "DELETE FROM Categories WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}