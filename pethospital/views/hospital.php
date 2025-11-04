<html>
<head>
    <title>Hospitals</title>
</head>

<body>
    <div class="title">
        <h3>Hospital List</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact Info</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allHospitals as $row): ?>
            <tr>
                <td><?=htmlspecialchars($row['id'])?></td>
                <td><?=htmlspecialchars($row['name'])?></td>
                <td><?=htmlspecialchars($row['address'])?></td>
                <td><?=htmlspecialchars($row['contact_info'])?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>