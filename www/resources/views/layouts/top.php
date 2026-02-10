<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpblog - <?=$_SERVER['REQUEST_URI']??''?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.6/dist/css/uikit.min.css">
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <div id="app">
        <nav id="nav" role="navigation" class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/www/user/register.php">REGISTER</a></li>

                    <?php if(array_key_exists('user',$_SESSION)) : ?>
                        <li><a href="/www/user/update.php">MY_PAGE</a></li>
                        <li><a href="/www/post/write.php">WRITE</a></li>
                        <li><a href="/www/auth/logout.php">SIGN OUT</a></li>
                    <?php else : ?>
                            <li><a href="/auth/login.php">SIGN</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <main id="main" role="main">
            
</main>
</body>
</html>