<?php

// Voor te zorgen dat bv eventlisteners enz niet crashen
namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel {
    public function save() {

        $sql = "UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity, image = :image WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':price' => $this->price,
            ':quantity' => $this->quantity,
            ':id' => $this->id,
            ':image' => $this->image,
        ]);
    }

    public function delete() {

        $sql = "DELETE FROM products WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id,
        ]);
    }

    public function add() {

        $sql = "INSERT INTO products (name, description, quantity, price, image) VALUES (:name, :description, :quantity, :price, :image)";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':quantity' => $this->quantity,
            ':price' => $this->price,
            ':image' => $this->image,
        ]);
    }
    
    public function search($term) {
        $sql = "SELECT * FROM products WHERE name LIKE :term OR description LIKE :term";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([':term' => '%' . $term . '%']);
        
        return $pdo_statement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    
    
}