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
            <!--    [+]TODO: Redirect to tasks (index.php -> Routing.php -> DefaultController.php -> tasks.php)    -->
            <button class="btn-redirect" onclick="redirect('tasks')">
                <i class="fas fa-tasks"></i>
                <h2>Today</h2>
            </button>
        </div>
        <div class="navbar-element">
            <!--    [+]TODO: Redirect to settings (index.php -> Routing.php -> DefaultController.php -> settings.php)  -->
            <button class="btn-redirect" onclick="redirect('settings')">
                <i class="fas fa-cog"></i>
                <h2>Settings</h2>
            </button>
        </div>
    </nav>
    <section class="section">
        <div class="section-container">
            <div class="header">
                <!--   [+]TODO: Redirect to settings (index.php -> Routing.php -> DefaultController.php -> settings.php)   -->
                <button class="user-logo" onclick="redirect('settings')">
                    <i class="fas fa-user"></i>
                </button>
            </div>
            <div class="content">

                <div class="content-header">
                    <h1>Today</h1>
                    <!--     [+]TODO: Redirect to addTask (index.php -> Routing.php -> TaskController.php)        -->
                    <!--        TODO: !It just redirect from tasks to add-task            -->
                    <button class="add-btn" onclick="redirect('addTask')">
                        <span class="red-button">+</span>Add task
                    </button>
                    </form>
                </div>
                <!-- [+]TODO: implement auto input from DB -->
                <!--    TODO: duplicate code -> import?            -->
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
                <button class="btn-submit" type="submit" form="form">Apply</button>
            </div>
        </div>
    </section>
</main>
</body>
</html>