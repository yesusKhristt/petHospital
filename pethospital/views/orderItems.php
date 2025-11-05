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
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($allOrders as $row): ?>
                <a href="?controller=main&action=main/orderItems/<?= htmlspecialchars($row['id']) ?>">
                    <tr>
                        <td><?= htmlspecialchars($row['item_id']) ?></td>
                        <td><?= htmlspecialchars($row['item_name']) ?></td>
                        <td><?= htmlspecialchars($row['unit_price']) ?></td>
                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <td><?= htmlspecialchars($row['unit_price']) * htmlspecialchars($row['quantity']) ?></td>
                    </tr>
                </a>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>