<html>
<head>
    <title>Items</title>
</head>

<body>
    <div class="title">
        <h3>Item List</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allItems as $row): ?>
            <tr>
                <td><?=htmlspecialchars($row['id'])?></td>
                <td><?=htmlspecialchars($row['name'])?></td>
                <td><?=htmlspecialchars($row['category'])?></td>
                <td><?=htmlspecialchars($row['unit_price'])?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>