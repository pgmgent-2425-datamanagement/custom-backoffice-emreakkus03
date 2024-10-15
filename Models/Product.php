<?php

// Voor te zorgen dat bv eventlisteners enz niet crashen
namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel {
    public function save() {

        $sql = "UPDATE products SET name = :name WHERE id = :id";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':name' => $this->name,
            ':id' => $this->id,
        ]);
    }
}