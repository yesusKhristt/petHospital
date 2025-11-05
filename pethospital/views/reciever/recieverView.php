<html>

<head>
    <title>Recievers</title>
</head>

<body>
    <div class="title">
        <h3>Reciever List</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hospital</th>
                <th>Contact Info</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allRecievers as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['reciever_name']) ?></td>
                    <td><?= htmlspecialchars($row['hospital_name']) ?></td>
                    <td><?= htmlspecialchars($row['contact_info']) ?></td>
                    <td>
                        <a href="?controller=main&action=main/recievers/edit/<?= htmlspecialchars($row['id']) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>