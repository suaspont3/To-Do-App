<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="TodoNow helps you to organize your life">
    <meta name="keywords" content="todo, to-do, todo list, list, organization">
    <script src="https://kit.fontawesome.com/201024f681.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/utilities.css">
    <link rel="stylesheet" href="public/css/main.css">

    <script src="public/js/redirect.js"></script>
    <title>TodoNow | Tasks</title>
</head>
<body>
<main class="main">
    <?php include('public/views/navbar.php')?>
    <section class="section">
        <div class="section-container">
            <?php include('public/views/header.php')?>
            <div class="content">
                <div class="content-header">
                    <h1>Admin Panel | Users information </h1>
                </div>
                <div class="admin-panel">
                    <?php foreach ($users as $user): ?>
                    <div class="user-info">
                        <h2 class="regular-font"><b>Username:</b> <?= $user->getUsername()?></h2>
                        <h2 class="regular-font"><b>Email:</b> <?= $user->getEmail()?></h2>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>