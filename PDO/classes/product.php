<?php
require_once 'database.php';

class Product {
    private int $product_id;
    private string $product_name;
    private float $price;
    private int $classification_code;

    public function __construct(string $product_name, float $price, int $classification_code, int $product_id = 0) {
        $this->product_id = $id;
        $this->product_name = $product_name;
        $this->price = $price;
        $this->classification_code = $classification_code;
    }

    public static function Create(string $product_name, float $price, int $classification_code): bool {
        try {    
            $connect = Database::Connect();
            $sth = $connect->prepare("INSERT INTO products (product_name, price, classification_code) VALUES (?, ?, ?)");
            $sth->execute([$product_name, $price, $classification_code]);
            return true;
        } catch(PDOException $e) {
            return false;    
        }
    }

    public static function getById(int $product_id): ?array {
        try {    
            $connect = Database::Connect();
            $sth = $connect->query("SELECT * FROM products WHERE product_id = {$product_id}");
            return $sth->fetchAll();
        } catch(PDOException $e) {
            return null;    
        }
    }

    public static function Update(int $product_id, string $product_name, float $price, int $classification_code): bool {
        try {    
            $connect = Database::Connect();
            $sth = $connect->prepare("UPDATE products SET product_name = ?, price = ?, classification_code = ? WHERE product_id = ?");
            $sth->execute([$product_name, $price, $classification_code, $product_id]);
            return true;
        } catch(PDOException $e) {
            return false;    
        }
    }

    public static function Delete(int $product_id): bool {
        try {    
            $connect = Database::Connect();
            $sth = $connect->prepare("DELETE FROM products WHERE product_id = ?");
            $sth->execute([$product_id]);
            return true;
        } catch(PDOException $e) {
            return false;    
        }
    }

    public static function getAll(): array {
        try {
            $connect = Database::Connect();
            $sth = $connect->query("SELECT C.*, P.* FROM classifications C INNER JOIN products P ON P.classification_code = C.classification_code ORDER BY P.product_name");
            return $sth->fetchAll();
        } catch(PDOException $e) {
            return [];
        }
    }
}

?>
