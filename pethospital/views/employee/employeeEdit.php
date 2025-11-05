<html>

<head>
    <title>Employees</title>
</head>

<body>
    <div class="title">
        <h3>Add Employee</h3>
    </div>
    <form action="?controller=main&action=main/employees/edit" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Employee Name" value="<?=htmlspecialchars($currEmployee['name'])?>">
                </td>
            </tr>
            <tr>
                <td>Contact Info</td>
                <td>
                    +94
                    <input type="text" name="contact" placeholder="Employee Contact" value="<?=htmlspecialchars($currEmployee['contact_info'])?>">
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