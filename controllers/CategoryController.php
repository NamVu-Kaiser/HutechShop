<?php 
    require_once 'models/CategoryModel.php';
    class CategoryController{
        private $categoryModel;
        private $pdo;

        public function __construct($pdo){
            $this->categoryModel = new CategoryModel($pdo);
            $this->pdo = $pdo;
        }

        public function GetAllCategories() {
            $cate = $this->categoryModel->GetAllCategories();
            return $cate;
        }   
}
?>