<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    echo 'sadfasdf';
    exit;
    header('Location: /www/auth/login.php');
    exit;
}

$_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));

if(array_key_exists('user', $_SESSION)){
    $user = $_SESSION['user'];
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$stmt = mysqli_prepare(
    $GLOBALS['DB_CONNECTION'],
    'SELECT * FROM posts WHERE id = ? LIMIT 1'
);
mysqli_stmt_bind_param($stmt, 'i', $id);
if(mysqli_stmt_execute($stmt)){
    $result = mysqli_stmt_get_result($stmt);
    [
        'user_id'   => $userId,
        'title'     => $title,
        'content'   => $content,
        'created_at' => $createdAt
    ] = mysqli_fetch_assoc($result);
}
mysqli_stmt_close($stmt);

if($userId) {
    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'],
        'SELECT * FROM users WHERE id = ?'
    );
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    if(mysqli_stmt_execute($stmt)){
        $reslut = mysqli_stmt_get_result($stmt);
        [
            'username' => $username,
             'email' => $email,
        ] = mysqli_fetch_assoc($reslut);
    }
}

if($userId && isset($user)){
    $isOwner = $userId == $user['id'];
}


?>

<?php require_once dirname(__DIR__) . '/layouts/top.php'; ?>

<div id="main_article" class="uk-container">
    <article class="uk-margin uk-article">
        <h1 class="uk-article-title"><?=$title?></h1>
        <div class="uk-text-meta">
            by <?=$username?>
        </div>
        <div class="uk-text-meta">
            <?=$createdAt?>
            <?php if (isset($isOwner)) : ?>
                <span class="owner">
                    <a href="/www/post/delete_process.php?id=<?=$id?>&token=<?=$_SESSION['CSRF_TOKEN']?>" class="uk-link-text" id="delete">Delete</a>
                    <a href="/www/post/update.php?id=<?=$id?>" class="uk-link-text" id="update">update</a>
                </span>
            <?php endif; ?>
        </div>
        <div class="uk-text-lead uk-margin-bottom"><?=$content?></div>
    </article>
</div>

<?php require_once dirname(__DIR__) . '/layouts/bottom.php'; ?>