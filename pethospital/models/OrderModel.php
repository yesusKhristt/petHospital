<?php
class OrderModel
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
        CREATE TABLE IF NOT EXISTS orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            hospital_id INT NOT NULL,
            employee_id INT NOT NULL,
            reciever_id INT NOT NULL,
            order_date TIMESTAMP NOT NULL,
            status VARCHAR(20) NOT NULL,
            total_amount INT NOT NULL,
            payment_method VARCHAR(30) NOT NULL,
            payment_status VARCHAR(20) NOT NULL,
            FOREIGN KEY (hospital_id) REFERENCES hospitals(id) ON DELETE CASCADE,
            FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE,
            FOREIGN KEY (reciever_id) REFERENCES recievers(id) ON DELETE CASCADE
        );
        ";

        $sql2 = "
        CREATE TABLE IF NOT EXISTS ordersItems (
            order_id INT NOT NULL,
            item_id INT NOT NULL,
            quantity INT NOT NULL,
            unit_price INT NOT NULL,
            PRIMARY KEY (order_id, item_id),
            FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
            FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
        );
        ";

                try {
            $this->pdo->exec($sql1);
            $this->pdo->exec($sql2);

        } catch (PDOException $e) {
            die("❌ Error creating tables: " . $e->getMessage());
        }
    }

        public function getAllOrders()
    {
        $sql1 = "SELECT * FROM orders";
        return $this->pdo->exec($sql1);
    }
}