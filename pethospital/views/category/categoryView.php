<html>

<head>
    <title>Categories</title>
</head>

<body>
    <div class="title">
        <h3>Category List</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allCategories as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td>
                        <a href="?controller=main&action=main/categories/edit/<?= htmlspecialchars($row['id']) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>