<html>

<head>
    <title>Recievers</title>
</head>

<body>
    <div class="title">
        <h3>Edit Reciever</h3>
    </div>
    <form action="?controller=main&action=main/recievers/edit/<?=htmlspecialchars($parts[3])?>" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Reciever Name"
                        value="<?= htmlspecialchars($currReciever['reciever_name']) ?>">
                </td>
            </tr>
            <tr>
                <td>Hospital</td>
                <td>
                    <select name="hospital" value="<?= htmlspecialchars($reciever['hospital_name']) ?>">
                        <?php foreach ($allHospitals as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>"
                                <?= ($row['id'] == $currReciever['hospital_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Contact Info</td>
                <td>
                    +94
                    <input type="text" name="contact" placeholder="Employee Contact"
                        value="<?= htmlspecialchars($currReciever['contact_info']) ?>">
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