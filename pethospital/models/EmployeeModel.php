<?php
class EmployeeModel
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
        CREATE TABLE IF NOT EXISTS employees (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            contact_info VARCHAR(20) NOT NULL
        );
        ";

        try {
            $this->pdo->exec($sql1);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

    public function getAllEmployees()
    {
        $sql1 = "SELECT * FROM employees";
        return $this->pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployee($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        public function addEmployee($name, $contact){
        $stmt = $this->pdo->prepare("INSERT INTO `employees`(`name`, `contact_info`) VALUES (?, ?)");
        $stmt->execute([$name, $contact]);
    }

    public function editEmployee($name, $contact, $id){
        $stmt = $this->pdo->prepare("UPDATE `employees` SET `name`=?,`contact_info`=? WHERE `id` = ?");
        $stmt->execute([$name, $contact, $id]);
    }
}