<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <form action="/instagram/register" method="POST" enctype="multipart/form-data">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="file" name="profile">
        <input type="submit" value="Crear cuenta">
    </form>
</body>
</html>