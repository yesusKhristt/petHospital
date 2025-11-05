<html>

<head>
    <title>Employees</title>
</head>

<body>
    <div class="title">
        <h3>Employee List</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact Info</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allEmployees as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['contact_info']) ?></td>
                    <td>
                        <a href="?controller=main&action=main/employees/edit/<?= htmlspecialchars($row['id']) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>