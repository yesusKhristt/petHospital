<html>

<head>
    <title>Categories</title>
</head>

<body>
    <div class="title">
        <h3>Add Category</h3>
    </div>
    <form action="?controller=main&action=main/categories/insert" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Category Name">
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