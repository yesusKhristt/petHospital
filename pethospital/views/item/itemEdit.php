<html>

<head>
    <title>Items</title>
</head>

<body>
    <div class="title">
        <h3>Edit Item</h3>
    </div>
    <form action="?controller=main&action=main/items/edit/<?=htmlspecialchars($parts[3])?>" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Item Name"
                        value="<?= htmlspecialchars($currItem['item_name']) ?>">
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="category">
                        <?php foreach ($allCategories as $row): ?>
                            <option value="<?= htmlspecialchars($row['id']) ?>" <?= ($row['id'] == $currItem['category_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Unit Price</td>
                <td>
                    Rs.
                    <input type="number" name="price" value="<?= htmlspecialchars($currItem['unit_price']) ?>">
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