<?php
class StockModel
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
        CREATE TABLE IF NOT EXISTS stock (
            hospital_id INT NOT NULL,
            item_id INT NOT NULL,
            quantity INT NOT NULL DEFAULT 0,
            last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (hospital_id, item_id),
            FOREIGN KEY (hospital_id) REFERENCES hospitals(id) ON DELETE CASCADE,
            FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
        );
        ";

        try {
            $this->pdo->exec($sql1);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

    public function getAllStock()
    {
        $stmt = $this->pdo->prepare("SELECT hospitals.name AS hospital_name, items.name AS item_name,hospitals.id AS hospital_id, items.id AS item_id, stock.quantity FROM stock JOIN hospitals ON stock.hospital_id = hospitals.id  JOIN items ON stock.item_id = items.id GROUP BY hospitals.id, items.id;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getStock($hospital_id, $item_id)
    {
        $stmt = $this->pdo->prepare("SELECT hospitals.name AS hospital_name, items.name AS item_name,hospitals.id AS hospital_id, items.id AS item_id, stock.quantity FROM stock JOIN hospitals ON stock.hospital_id = hospitals.id  JOIN items ON stock.item_id = items.id WHERE hospitals.id = ? AND items.id = ? GROUP BY hospitals.id, items.id");
        $stmt->execute([$hospital_id, $item_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function addStock($hospital_id, $item_id, $quantity)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `stock`(`hospital_id`, `item_id`, `quantity`, `last_updated`) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
        $stmt->execute([$hospital_id, $item_id, $quantity]);
    }

    public function editStock($hospital_id, $item_id, $quantity)
    {
        $stmt = $this->pdo->prepare("UPDATE `stock` SET `quantity`=?,`last_updated`=CURRENT_TIMESTAMP WHERE hospital_id = ? AND item_id = ?");
        $stmt->execute([$quantity, $hospital_id, $item_id]);
    }
}