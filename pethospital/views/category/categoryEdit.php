<html>

<head>
    <title>Categories</title>
</head>

<body>
    <div class="title">
        <h3>Add Category</h3>
    </div>
    <form action="?controller=main&action=main/categories/edit/<?=htmlspecialchars($parts[3])?>" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Category Name" value="<?=htmlspecialchars($currCategory['name'])?>">
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