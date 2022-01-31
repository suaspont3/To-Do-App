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
    <title>TodoNow | Sign Up Page</title>
</head>
<body>
    <div class="container">
        <img src="public/img/logo.png" alt="logo" class="logo">
        <div class="dialog-window">
            <h1 class="dialog-type">Sign Up</h1>
            <form action="signup" method="POST" class="dialog-form">
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
                    <input type="text" name="username" id="username" class="light-font" placeholder="Enter username">
                    <label for="username">USERNAME</label>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" class="light-font" placeholder="Enter password">
                    <label for="password">PASSWORD</label>
                </div>
                <div class="form-group last-element">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" id="email" class="light-font" placeholder="Enter email">
                    <label for="email">EMAIL</label>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
        </div>
        <div class="footer">
            <h2>Already have an account?
                <button onclick="redirect('login')" class="btn-redirect"><span class="bold-font">Log In</span></button>
            </h2>
        </div>
    </div>
</body>
</html>