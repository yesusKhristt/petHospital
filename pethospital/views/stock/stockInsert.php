<html>

<head>
    <title>Stock</title>
</head>

<body>
    <div class="title">
        <h3>Add Stock</h3>
    </div>
    <form action="?controller=main&action=main/stock/insert" method="post">
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
                <td>Item</td>
                <td>
                    <select name="item">
                        <?php foreach ($allItems as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['item_name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>
                    <input type="number" name="quantity" placeholder="Quantity">
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