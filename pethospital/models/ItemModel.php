<?php
class ItemModel
{
    public $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->createTableIfNotExists(); // Create the table if not there
    }

    public function createTableIfNotExists()
    {
        $sql1 = "
        CREATE TABLE IF NOT EXISTS items(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            category INT NOT NULL,
            unit_price INT NOT NULL,
            FOREIGN KEY (category) REFERENCES categories(id) ON DELETE CASCADE
        );
        ";

        try {
            $this->pdo->exec($sql1);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

    public function getAllItems()
    {
        $sql1 = "SELECT items.id, items.name AS item_name, categories.name AS category_name, items.unit_price FROM items JOIN categories ON items.category = categories.id";
        return $this->pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getItem($id){
        $stmt = $this->pdo->prepare("SELECT items.id, items.name AS item_name, categories.name AS category_name, categories.id AS category_id, items.unit_price FROM items JOIN categories ON items.category = categories.id WHERE items.id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

    public function addItem($name, $category, $unitPrice){
        $stmt = $this->pdo->prepare("INSERT INTO `items`(`name`, `category`, `unit_price`) VALUES (?, ?, ?)");
        $stmt->execute([$name, $category, $unitPrice]);
    }

    public function editItem($name, $category, $unitPrice, $id){
        $stmt = $this->pdo->prepare("UPDATE `items` SET `name`=?,`category`=?,`unit_price`=? WHERE id=?");
        $stmt->execute([$name, $category, $unitPrice, $id]);
    }
}