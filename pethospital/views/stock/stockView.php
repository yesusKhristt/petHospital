<html>

<head>
    <title>Stock</title>
</head>

<body>
    <div class="title">
        <h3>Stock List</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>Hospital Name</th>
                <th>Item Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allStock as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['hospital_name']) ?></td>
                    <td><?= htmlspecialchars($row['item_name']) ?></td>
                    <td><?= htmlspecialchars($row['quantity']) ?></td>
                    <td>
                        <a href="?controller=main&action=main/stock/edit/<?= htmlspecialchars($row['hospital_id']) ?>/<?= htmlspecialchars($row['item_id']) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>