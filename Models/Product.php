<?php

// Voor te zorgen dat bv eventlisteners enz niet crashen
namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel {
    public function save() {

        $sql = "UPDATE products SET name = :name, description = :description WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':id' => $this->id,
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

        $sql = "INSERT INTO products (name, description) VALUES (:name, :description)";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':description' => $this->description,
        ]);
    }
}