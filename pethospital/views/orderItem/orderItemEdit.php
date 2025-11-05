<html>

<head>
    <title>Orders</title>
</head>

<body>
    <div class="title">
        <h3>Order List</h3>
    </div>
    
    <h4>Order <?=htmlspecialchars($orderId)?></h4>
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
            <?php foreach ($orderItems as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['item_id']) ?></td>
                    <td><?= htmlspecialchars($row['item_name']) ?></td>
                    <td><?= htmlspecialchars($row['unit_price']) ?></td>
                    <td><?= htmlspecialchars($row['quantity']) ?></td>
                    <td><?= htmlspecialchars($row['unit_price']) * htmlspecialchars($row['quantity']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>