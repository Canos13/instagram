<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>HOME</h1>

    <h2>Hola <?php echo $this->d['user']->getUsername() ?> </h2>

    <?php require_once('src/components/create.php') ?>
</body>
</html>