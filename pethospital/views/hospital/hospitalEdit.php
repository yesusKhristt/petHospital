<html>
<head>
    <title>Hospitals</title>
</head>

<body>
    <div class="title">
        <h3>Edit Hospital</h3>
    </div>
    <form action="?controller=main&action=main/hospitals/edit/<?=htmlspecialchars($parts[3])?>" method="post">
        <table>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" placeholder="Employee Name" value="<?=htmlspecialchars($currHospital['name'])?>">
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea  rows="5" cols="30" name="address" placeholder="Hospital Address"><?=htmlspecialchars($currHospital['address'])?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Contact Info</td>
                    <td>
                        +94
                        <input type="text" name="contact" placeholder="Employee Contact" value="<?=htmlspecialchars($currHospital['contact_info'])?>">
                    </td>
                </tr>
                <tr>
                <td colspan="2">
                    <input type="submit">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</body>

</html>