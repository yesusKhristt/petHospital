<html>

<head>
    <title>Recievers</title>
</head>

<body>
    <div class="title">
        <h3>Add Reciever</h3>
    </div>
    <form action="?controller=main&action=main/recievers/insert" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Reciever Name">
                </td>
            </tr>
            <tr>
                <td>Hospital</td>
                <td>
                    <select name="hospital">
                        <?php foreach ($allHospitals as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Contact Info</td>
                <td>
                    +94
                    <input type="text" name="contact" placeholder="Employee Contact">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>