<?php

// Voor te zorgen dat bv eventlisteners enz niet crashen
namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel {
    public function allWithCategory(){
        $sql = "SELECT products.*, categories.name as category_name FROM products LEFT JOIN categories ON products.category_id = categories.id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll();
    return self::castToModel($products);
    }

    protected function castToModel($products) {
        $productModels = [];
        foreach ($products as $product) {
            $productModel = new self();
            $productModel->id = $product['id'];
            $productModel->name = $product['name'];
            $productModel->image = $product['image'];
            $productModel->price = $product['price'];
            $productModel->description = $product['description'];
            $productModel->quantity = $product['quantity'];
            $productModel->category_name = $product['category_name'] ?? 'Geen categorie'; // Voeg dit toe
            $productModels[] = $productModel;
        }
        return $productModels;
    }
    


    public function save() {

        $sql = "UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity, image = :image, category_id = :category_id WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':quantity' => $this->quantity,
            ':id' => $this->id,
            ':image' => $this->image,
            ':category_id' => $this->category_id,
        ]);
    }

    public function delete() {

        $sql = "DELETE FROM products WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $this->id,
        ]);
    }

    public function add() {

        $sql = "INSERT INTO products (name, description, quantity, price, image, category_id) VALUES (:name, :description, :quantity, :price, :image, :category_id)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':quantity' => $this->quantity,
            ':price' => $this->price,
            ':image' => $this->image,
            ':category_id' => $this->category_id,
        ]);
    }
    
    public function search($term) {
        $sql = "SELECT * FROM products WHERE name LIKE :term OR description LIKE :term";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':term' => '%' . $term . '%']);
        
       
        $products = $stmt->fetchAll();
        return self::castToModel($products);
    }
    

    public function getProductCounts() {
        $sql = "SELECT COUNT(*) as count FROM products";
        $stmt = (new self)->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result['count'] ?? 0;
    }
    
    public function sortedByName ($row = 'ASC') {
        $sql = "SELECT * FROM products ORDER BY name " . ($row === 'DESC' ? 'DESC' : 'ASC');
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        
        $products = $stmt->fetchAll();
        return self::castToModel($products);
        
    }

    
}