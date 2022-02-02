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
    <nav class="navbar">
        <img src="public/img/logo.png" alt="logo" class="logo">
        <div class="navbar-element current">
            <button class="btn-redirect" onclick="redirect('tasks')">
                <i class="fas fa-tasks"></i>
                <h2>Today</h2>
            </button>
        </div>
        <div class="navbar-element">
            <button class="btn-redirect" onclick="redirect('settings')">
                <i class="fas fa-cog"></i>
                <h2>Settings</h2>
            </button>
        </div>
    </nav>
    <section class="section">
        <div class="section-container">
            <div class="header">
                <button class="user-logo" onclick="redirect('settings')">
                    <i class="fas fa-user"></i>
                </button>
            </div>
            <div class="content">
                <div class="content-header">
                    <h1>Admin Panel | Users information </h1>
                </div>
                <div class="admin-panel">
                    <?php foreach ($users as $user): ?>
                    <div class="user-info">
                        <h2><b>Username:</b> <?= $user->getUsername()?></h2>
                        <h2><b>Email:</b> <?= $user->getEmail()?></h2>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>