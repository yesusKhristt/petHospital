<?php
class CategoryModel
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
        CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20) NOT NULL
        );
        ";

        try {
            $this->pdo->exec($sql1);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

    public function getAllCategories()
    {
        $sql1 = "SELECT * FROM categories";
        return $this->pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addCategory($name)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `categories`(`name`) VALUES (?)");
        $stmt->execute([$name]);
    }

    public function editCategory($name, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE `categories` SET `name`=? WHERE `id` = ?");
        $stmt->execute([$name, $id]);
    }
}