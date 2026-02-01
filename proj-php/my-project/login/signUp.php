<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="logIn.php" method="POST">
        <label for="">username</label><br>
        <input type="text" name="userName"><br>
        <label for="">Role</label>
        <select name="role" id="">
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select><br>
        <input type="submit">
    </form>
</body>
</html>