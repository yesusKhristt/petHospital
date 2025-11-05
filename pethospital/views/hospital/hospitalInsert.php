<html>

<head>
    <title>Hospitals</title>
</head>

<body>
    <div class="title">
        <h3>Add Hospital</h3>
    </div>
    <form action="?controller=main&action=main/hospitals/insert" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" placeholder="Employee Name">
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
                    <textarea rows="5" cols="30" name="address" placeholder="Hospital Address"></textarea>
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