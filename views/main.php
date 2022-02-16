<!doctype html>
<html>
    <head>
        <title>Qimby</title>
        <link rel="stylesheet" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-light bg-light bg mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Qimby</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>shares">Shares</a></li>
                </ul>
                <ul class="navbar-nav d-flex">
                    <?php if(isset($_SESSION['is_logged_in'])) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name'] ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
                    <?php else :?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row">
            <?php Messages::display() ?>
            <?php require($view);?>
        </div>

    </body>
</html>