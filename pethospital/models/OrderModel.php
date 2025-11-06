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
            order_status VARCHAR(20) NOT NULL,
            total_amount INT NOT NULL,
            payment_method VARCHAR(30) NOT NULL,
            payment_status VARCHAR(20) NOT NULL,
            FOREIGN KEY (hospital_id) REFERENCES hospitals(id) ON DELETE CASCADE,
            FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE,
            FOREIGN KEY (reciever_id) REFERENCES recievers(id) ON DELETE CASCADE
        );
        ";

        $sql2 = "
        CREATE TABLE IF NOT EXISTS orderItems (
            order_id INT NOT NULL,
            item_id INT NOT NULL,
            quantity INT NOT NULL,
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
        $sql1 = "SELECT orders.id, hospitals.name AS hospital_name, employees.name AS employee_name, recievers.name AS reciever_name, orders.order_date ,orders.order_status ,orders.total_amount ,orders.payment_method ,orders.payment_status FROM orders JOIN hospitals ON orders.hospital_id = hospitals.id JOIN employees ON orders.employee_id = employees.id JOIN recievers ON orders.reciever_id = recievers.id";
        return $this->pdo->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderItems($orderId)
    {
        $stmt = $this->pdo->prepare("SELECT items.id AS  item_id, items.name AS item_name, orderItems.quantity, items.unit_price FROM orderItems JOIN items ON orderItems.item_id = items.id WHERE orderItems.order_id = ?");
        $stmt->execute([$orderId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    public function getOrder($id)
    {
        $stmt = $this->pdo->prepare("SELECT orders.id, hospitals.name AS hospital_name, employees.name AS employee_name, recievers.name AS reciever_name, hospitals.id AS hospital_id, employees.id AS employee_id, recievers.id AS reciever_id, orders.order_date ,orders.order_status ,orders.total_amount ,orders.payment_method ,orders.payment_status FROM orders JOIN hospitals ON orders.hospital_id = hospitals.id JOIN employees ON orders.employee_id = employees.id JOIN recievers ON orders.reciever_id = recievers.id WHERE orders.id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getSelectedItems($order_id)
    {
        $sql = "SELECT item_id FROM orderItems WHERE order_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$order_id]);

        $selectedItems = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $selectedItems[] = $row['item_id'];
        }
        return $selectedItems;
    }

    public function getSelectedItemsQty($order_id)
    {
        $sql = "SELECT item_id, quantity FROM orderItems WHERE order_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$order_id]);

        $selectedItemsQty = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $selectedItemsQty[$row['item_id']] = $row['quantity'];
        }
        return $selectedItemsQty;
    }

    public function editOrder($hospital, $employee, $reciever, $order_status, $payment_method, $payment_status, $items, $id)
    {
        
        $total = 0;
        $stmtItem = $this->pdo->prepare("INSERT INTO orderItems (order_id, item_id, quantity) VALUES (?, ?, ?)");
        $stmt1 = $this->pdo->prepare("SELECT unit_price FROM items WHERE id = ?");
        $stmt3 = $this->pdo->prepare("DELETE FROM orderItems WHERE order_id = ?");
        $stmt3->execute([$id]);
        foreach ($items as $item) {
            if (isset($item['id'])) {
                $stmtItem->execute([$id, $item['id'], $item['qty']]);
                $stmt1->execute([$item['id']]);
                $total += ($stmt1->fetchColumn() * $item['qty']);
            }
        }

        $stmt2 = $this->pdo->prepare("UPDATE `orders` SET hospital_id = ?, reciever_id = ?, employee_id = ?, order_date = CURRENT_TIMESTAMP, order_status = ?, total_amount = ?, payment_method = ?, payment_status = ? WHERE id = ?");
        $stmt2->execute([$hospital, $reciever, $employee, $order_status, $total, $payment_method, $payment_status , $id]);
    }

    public function addOrder($hospital, $employee, $reciever, $order_status, $payment_method, $payment_status, $items)
    {
        $stmt2 = $this->pdo->prepare("INSERT INTO orders (hospital_id, reciever_id, employee_id, order_date, order_status, total_amount, payment_method, payment_status) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?, 0, ?, ?)");
        $stmt2->execute([$hospital, $reciever, $employee, $order_status, $payment_method, $payment_status ]);
        $id = $this->pdo->lastInsertId();
        $total = 0;
        $stmtItem = $this->pdo->prepare("INSERT INTO orderItems (order_id, item_id, quantity) VALUES (?, ?, ?)");
        $stmt1 = $this->pdo->prepare("SELECT unit_price FROM items WHERE id = ?");
        foreach ($items as $item) {
            if (isset($item['id'])) {
                $stmtItem->execute([$id, $item['id'], $item['qty']]);
                $stmt1->execute([$item['id']]);
                $total += ($stmt1->fetchColumn() * $item['qty']);
            }
        }
        $stmt3 = $this->pdo->prepare("UPDATE `orders` SET total_amount = ? WHERE id = ?");
        $stmt3->execute([$total, $id]);
    }
    

}