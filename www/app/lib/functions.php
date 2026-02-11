<?php

function user()
{
    if(array_key_exists('user', $_SESSION)){
        return $_SESSION['user'];
    }
    return false;
}

function view($view, $vars)
{
    foreach ($vars as $name => $value) {
        $$name = $value;
    }
    return require_once dirname(__DIR__, 2) . '/resources/views/layouts/app.php';
}

function redirect($url)
{
    header("Location : {$url}");
    return http_response_code() ===302;
}

function reject($code)
{
    switch($code){
        case 400:
            return header('HTTP/1.1 400 Bad Request');
        case 404:
            return header('HTTP/1.1 404 NOT FOUND');
        default:
            return header('Location: {$_SERVER[HTTP_REFERER')    
    }
}

