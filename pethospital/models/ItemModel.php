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
        $sql1 = "SELECT * FROM items";
        return $this->pdo->exec($sql1);
    }
}