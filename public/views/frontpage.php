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
    <link rel="stylesheet" href="public/css/intro.css">
    <script src="public/js/redirect.js"></script>
    <title>TodoNow</title>
</head>
<body>
    <div class="container">
        <img src="public/img/logo.png" alt="logo" class="logo">
        <div class="dialog-window">
            <div class="dialog-option">
                <button onclick="redirect('login')" class="btn">Log In</button>
            </div>
            <div class="dialog-option">
                <button onclick="redirect('signup')" class="btn">Sign Up</button>
            </div>
        </div>
    </div>
</body>
</html>