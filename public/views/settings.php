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
    <link rel="stylesheet" href="public/css/mobile.css">

    <script src="public/js/redirect.js"></script>
    <title>TodoNow | Settings</title>
</head>
<body>
<main class="main">
    <?php include('public/views/navbar.php')?>
    <section class="section">
        <div class="section-container">
            <?php include('public/views/header.php')?>
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
                        <label for="username" class="bold-font">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter new username">
                    </div>
                    <div class="settings-element">
                        <label for="email" class="bold-font">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter new email">
                    </div>
                    <div class="settings-element">
                        <label for="password" class="bold-font">Password</label>
                        <input type="password" name="password-old" id="password-old" placeholder="Enter old password">
                        <input type="password" name="password-new" id="password-new" placeholder="Enter new password">
                    </div>
                    <button type="submit" class="primary-btn submit-form">Apply changes</div>
                </form>
                <form action="logout" method="POST" class="settings-form">
                    <button class="primary-btn submit-form">Log out</div>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>