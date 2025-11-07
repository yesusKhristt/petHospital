<html>

<head>
    <title>Employees</title>
</head>

<body>
    <div class="title">
        <h3>Add Employee</h3>
    </div>
    <form action="?controller=main&action=main/employees/insert" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Employee Name">
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
                <td>Total Stock</td>
                <td>
                    <input type="number" name="totalStock" placeholder="Total Stock">
                </td>
            </tr>
            <tr>
                <td>Reserved Stock</td>
                <td>
                    <input type="number" name="reservedStock" placeholder="Reserved Stock">
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