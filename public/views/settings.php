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
    <title>TodoNow | Settings</title>
</head>
<body>
<main class="main">
    <nav class="navbar">
        <img src="public/img/logo.svg" alt="logo" class="logo">

        <div class="navbar-element">
            <button class="btn-redirect" onclick="redirect('tasks')">
                <i class="fas fa-tasks"></i>
                <h2>Today</h2>
            </button>
        </div>
        <div class="navbar-element current">
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
                    <h1>Settings</h1>
                </div>
                <div class="message">
                    <?php if(isset($messages)){
                        foreach($messages as $message)
                        {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <form action="settings" method="POST" class="settings-form">
                    <div class="settings-element">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter new username">
                    </div>
                    <div class="settings-element">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter new email">
                    </div>
                    <div class="settings-element">
                        <label for="password">Password</label>
                        <input type="password" name="password-old" id="password-old" placeholder="Enter old password">
                        <input type="password" name="password-new" id="password-new" placeholder="Enter new password">
                    </div>
                    <button type="submit" class="btn-submit">Apply changes</div>
                </form>
                <form action="logout" method="POST" class="settings-form">
                    <button class="btn-submit">Log out</div>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>