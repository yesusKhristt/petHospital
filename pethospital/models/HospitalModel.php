<?php
class HospitalModel
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
        CREATE TABLE IF NOT EXISTS hospitals(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            address VARCHAR(255),
            contact_info VARCHAR(9)
        );
        ";

        try {
            $this->pdo->exec($sql1);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

    public function getAllHospitals()
    {
        $sql1 = "SELECT * FROM hospitals";
        return $this->pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

    }
}