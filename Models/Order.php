<?php

// Voor te zorgen dat bv eventlisteners enz niet crashen
namespace App\Models;

use App\Models\BaseModel;

class Order extends BaseModel
{
    public function getMonthlySales()
    {
        $sql = " SELECT MONTH(date) AS sale_month, SUM(price) AS total_sales FROM orders WHERE YEAR(date) = YEAR(CURDATE()) AND status = 1 GROUP BY MONTH(date) ORDER BY sale_month";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
