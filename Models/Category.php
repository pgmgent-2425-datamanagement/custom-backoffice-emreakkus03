<?php

// Voor te zorgen dat bv eventlisteners enz niet crashen
namespace App\Models;

use App\Models\BaseModel;

class Category extends BaseModel {
    public function save() {

        $sql = "UPDATE categories SET name = :name WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':id' => $this->id,
        ]);
    }

    public function delete() {

        $sql = "DELETE FROM categories WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':id' => $this->id,
        ]);
    } 

    public function add() {

        $sql = "INSERT INTO categories (name) VALUES (:name)";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
        ]);
    }
    
    
}