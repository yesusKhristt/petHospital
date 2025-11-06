<?php
class RecieverModel
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
        CREATE TABLE IF NOT EXISTS recievers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            hospital_id INT NOT NULL,
            name VARCHAR(50) NOT NULL,
            contact_info VARCHAR(20) NOT NULL,
            FOREIGN KEY (hospital_id) REFERENCES hospitals(id) ON DELETE CASCADE
        );
        ";

                try {
            $this->pdo->exec($sql1);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

        public function getAllRecievers()
    {
        $sql1 = "SELECT recievers.id, recievers.name AS reciever_name, hospitals.name AS hospital_name, recievers.contact_info FROM recievers JOIN hospitals ON recievers.hospital_id = hospitals.id";
        return $this->pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReciever($id){
        $stmt = $this->pdo->prepare("SELECT recievers.id, recievers.name AS reciever_name, hospitals.name AS hospital_name, hospitals.id AS hospital_id, recievers.contact_info FROM recievers JOIN hospitals ON recievers.hospital_id = hospitals.id WHERE recievers.id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        public function addReciever($name, $hospital, $contact){
        $stmt = $this->pdo->prepare("INSERT INTO `recievers`(`name`, `hospital_id`, `contact_info`) VALUES (?, ?, ?)");
        $stmt->execute([$name, $hospital, $contact]);
    }

    public function editReciever($name, $hospital, $contact, $id){
        $stmt = $this->pdo->prepare("UPDATE `recievers` SET `name`=?, `hospital_id`=?,`contact_info`=? WHERE id =?");
        $stmt->execute([$name, $hospital, $contact, $id]);
    }
}