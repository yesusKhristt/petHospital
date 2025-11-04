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
                <a href="controller=main&action=main/orderItems">
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['hospital']) ?></td>
                        <td><?= htmlspecialchars($row['employee']) ?></td>
                        <td><?= htmlspecialchars($row['reciever']) ?></td>
                        <td><?= htmlspecialchars($row['date_created']) ?></td>
                        <td><?= htmlspecialchars($row['order_status']) ?></td>
                        <td><?= htmlspecialchars($row['payment_method']) ?></td>
                        <td><?= htmlspecialchars($row['payment_status']) ?></td>
                        <td><?= htmlspecialchars($row['total']) ?></td>
                    </tr>
                </a>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>