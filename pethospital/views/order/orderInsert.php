<html>

<head>
    <title>Orders</title>
</head>

<body>
    <div class="title">
        <h3>Add Order</h3>
    </div>
    <form action="?controller=main&action=main/orders/insert" method="post">
        <table>
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
                <td>Employee</td>
                <td>
                    <select name="employee">
                        <?php foreach ($allEmployees as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Reciever</td>
                <td>
                    <select name="reciever">
                        <?php foreach ($allRecievers as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>">
                                <?= htmlspecialchars($row['reciever_name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <?php foreach ($allItems as $row): ?>
                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="items[<?= $row['id'] ?>][id]" value="<?= $row['id'] ?>">
                            <?= htmlspecialchars($row['item_name']) ?>
                        </label>
                    </td>
                    <td>
                        <input type="number" name="items[<?= $row['id'] ?>][qty]" value="1" min="1">
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>Payment Method</td>
                <td>
                    <select name="paymentMethod">
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque</option>
                        <option value="online">Online</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Payment Status</td>
                <td>
                    <select name="paymentMethod">
                        <option value="on placement">On Placement</option>
                        <option value="on delivery">On Delivery</option>
                    </select>
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