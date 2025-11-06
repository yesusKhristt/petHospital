<html>

<head>
    <title>Orders</title>
</head>

<body>
    <div class="title">
        <h3>Edit Order</h3>
    </div>
    <form action="?controller=main&action=main/orders/edit/<?=htmlspecialchars($parts[3])?>" method="post">
        <table>
            <tr>
                <td>Hospital</td>
                <td>
                    <select name="hospital" value="<?= htmlspecialchars($item['category_name']) ?>">
                        <?php foreach ($allHospitals as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>" <?= ($row['id'] == $currOrder['hospital_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['name']) ?>
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
                            <option value="<?= htmlspecialchars($row['id']) ?>" <?= ($row['id'] == $currOrder['employee_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['name']) ?>
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
                            <option value="<?= htmlspecialchars($row['id']) ?>" <?= ($row['id'] == $currOrder['reciever_id']) ? 'selected' : '' ?>>
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
                            <input type="checkbox" name="items[<?= $row['id'] ?>][id]" value="<?= $row['id'] ?>"
                                <?= in_array($row['id'], $selectedItems) ? 'checked' : '' ?>>
                            <?= htmlspecialchars($row['item_name']) ?>
                        </label>
                    </td>
                    <td>
                        <input type="number" name="items[<?= $row['id'] ?>][qty]"
                            value="<?= isset($selectedItemsQty[$row['id']]) ? $selectedItemsQty[$row['id']] : 1 ?>" min="1">
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td>Order Status</td>
                <td>
                    <select name="orderStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </td>
            </tr>
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
                    <select name="paymentStatus">
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