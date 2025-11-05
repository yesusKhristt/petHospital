<html>

<head>
    <title>Orders</title>
</head>

<body>
    <div class="title">
        <h3>Order List</h3>
    </div>
    <table>
        <thead>

            <tr>
                <th>ID</th>
                <th>Hospital</th>
                <th>Employee</th>
                <th>Reciever</th>
                <th>Date Created</th>
                <th>Order Status</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Total</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($allOrders as $row): ?>

                <tr>

                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['hospital_name']) ?></td>
                    <td><?= htmlspecialchars($row['employee_name']) ?></td>
                    <td><?= htmlspecialchars($row['reciever_name']) ?></td>
                    <td><?= htmlspecialchars($row['order_date']) ?></td>
                    <td><?= htmlspecialchars($row['order_status']) ?></td>
                    <td><?= htmlspecialchars($row['payment_method']) ?></td>
                    <td><?= htmlspecialchars($row['payment_status']) ?></td>
                    <td><?= htmlspecialchars($row['total_amount']) ?></td>
                    <td><a href="?controller=main&action=main/orderItems/view/<?= htmlspecialchars($row['id']) ?>">View Order</a>
                    </td>
                    <td>
                        <a href="?controller=main&action=main/orders/edit/<?= htmlspecialchars($row['id']) ?>">
                            Edit
                        </a>
                    </td>

                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>