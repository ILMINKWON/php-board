<?php

require_once dirname(__DIR__) . '/bootstrap/app.php';

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    header('Location: /www/auth/login.php');
    exit;
}

$user = $_SESSION['user'];

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$token = filter_input(INPUT_POST, 'token');

if ($email && $password && hash_equals($_SESSION['CSRF_TOKEN'], $token)) {

    $username = current(explode('@', $email));
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $GLOBALS['DB_CONNECTION'],
        'UPDATE users SET email = ?, password = ?, username = ? WHERE id = ?'
    );

    mysqli_stmt_bind_param($stmt, 'sssi', $email, $password, $username, $user['id']);

    if (mysqli_stmt_execute($stmt)) {
        session_unset();
        session_destroy();
        header('Location: /www/index.php');
        exit;
    }

    mysqli_stmt_close($stmt);
}

header('Location: /www/user/update.php');
exit;

?>
