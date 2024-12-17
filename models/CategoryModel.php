<?php
     require_once 'config/db.php';
     class CategoryModel{
          private $pdo;
          
          public function __construct($pdo){
               $this -> pdo = $pdo;
          }

          public function getAllCategories(){
               $sql = "SELECT * FROM categories";
               $stmt = $this -> pdo -> prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
     }
?>