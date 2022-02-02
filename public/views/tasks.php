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
        <img src="public/img/logo.svg" alt="logo" class="logo">
        <div class="navbar-element current">
            <div class="navbar-container">
                <i class="fas fa-tasks"></i>
                <button class="redirect-btn" onclick="redirect('tasks')">
                    <h3>Today</h3>
                </button>
            </div>
        </div>
        <div class="navbar-element">
            <div class="navbar-container">
                <i class="fas fa-cog"></i>
                <button class="redirect-btn" onclick="redirect('settings')">
                    <h3>Settings</h3>
                </button>
            </div>
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
                    <h1>Today</h1>
                    <button class="redirect-btn" onclick="redirect('addTask')">
                        <span class="red-font">+&nbsp;</span>Add task
                    </button>
                    </form>
                </div>
                <div class="todo-items">
                    <form action="deleteTask" method="POST" id="form">
                        <?php foreach ($tasks as $task): ?>
                        <div class="item">
                            <input type="checkbox" name="<?= $task->getId()?>" id="<?= $task->getId()?>">
                            <label for="<?= $task->getId()?>"><?= $task->getContent()?></label>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <button class="primary-btn submit-form" type="submit" form="form">Apply</button>
            </div>
        </div>
    </section>
</main>
</body>
</html>