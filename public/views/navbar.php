<?php
    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);
    if ($path == 'settings') {
        echo '<nav class="navbar">
        <img src="public/img/logo.svg" alt="logo" class="logo">
        <div class="navbar-element">
            <div class="navbar-container">
                <i class="fas fa-tasks"></i>
                <button class="redirect-btn" onclick="redirect(\'tasks\')">
                    <h3>Today</h3>
                </button>
            </div>
        </div>
        <div class="navbar-element current">
            <div class="navbar-container">
                <i class="fas fa-cog"></i>
                <button class="redirect-btn" onclick="redirect(\'settings\')">
                    <h3>Settings</h3>
                </button>
            </div>
        </div>
    </nav>';
    } else {
        echo '<nav class="navbar">
        <img src="public/img/logo.svg" alt="logo" class="logo">
        <div class="navbar-element current">
            <div class="navbar-container">
                <i class="fas fa-tasks"></i>
                <button class="redirect-btn" onclick="redirect(\'tasks\')">
                    <h3>Today</h3>
                </button>
            </div>
        </div>
        <div class="navbar-element">
            <div class="navbar-container">
                <i class="fas fa-cog"></i>
                <button class="redirect-btn" onclick="redirect(\'settings\')">
                    <h3>Settings</h3>
                </button>
            </div>
        </div>
    </nav>';
    }

