<?php 
     require_once 'config/db.php';
     class ProductModel{
          private $pdo;
          
          public function __construct($pdo){
               $this -> pdo = $pdo;
          }

          public function getAllProducts(){
               $sql = "SELECT products.id, products.name, products.price, products.product_image, categories.name as category_name
                    FROM products , categories
                    WHERE products.category_id = categories.id";
               $stmt = $this -> pdo -> prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }

          public function getProductById($id){
               $sql = "SELECT products.id, products.name, products.price, products.image, categories.name as category_name
                    FROM products , categories
                    WHERE products.category_id = categories.id AND products.id = :id";
               $stmt = $this -> pdo -> prepare($sql);
               $stmt -> bindParam(':id', $id);
               $stmt -> execute();
               return $stmt->fetch(PDO::FETCH_ASSOC);
          }

          public function getProductByCategory($id){
               $sql = "SELECT products.id, products.name, products.price, products.image, categories.name as category_name
                    FROM products , categories
                    WHERE products.category_id = categories.id AND categories.id = :id";
               $stmt = $this -> pdo -> prepare($sql);
               $stmt -> bindParam(':id', $id);
               $stmt -> execute();
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
     }
?>