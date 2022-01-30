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
    <title>TodoNow | Login Page</title>
</head>
<body>
    <div class="container">
        <img src="public/img/logo.png" alt="logo" class="logo">
        <div class="dialog-window">
            <h1 class="dialog-type">Login</h1>
            <form action="login" method="POST" class="dialog-form">
                <div class="message">
                    <?php if(isset($messages)){
                        foreach($messages as $message)
                        {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input type="text" name="username" id="username" class="light-font" placeholder="Enter your username">
                    <label for="username">USERNAME</label>
                </div>
                <div class="form-group last-element">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="password" id="password" class="light-font" placeholder="Enter your password">
                    <label for="password">PASSWORD</label>
                </div>
                <button type="submit" class="btn">Log In</button>
            </form>
        </div>
        <div class="footer">
            <h2>Don't have an account?
                <button onclick="redirect('signup')" class="btn-redirect"><span class="bold-font">Sign Up</span></button>
            </h2>
        </div>
    </div>
</body>
</html>