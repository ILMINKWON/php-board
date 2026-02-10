<?php
require_once __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('app'); 
$log->pushHandler(new StreamHandler('C:\xampp\htdocs\www\logs\app.log', Logger::DEBUG));

/** PHP 에러 */
set_error_handler(function ($severity, $message, $file, $line) use ($log) {
    $log->error($message, compact('file','line','severity'));
});

/** Fatal */
register_shutdown_function(function () use ($log) {
    $error = error_get_last();
    if ($error) {
        $log->critical($error['message'], $error);
    }
});

/** Exception */
set_exception_handler(function ($e) use ($log) {
    $log->critical($e->getMessage(), [
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => $e->getTraceAsString()
    ]);
});

/** 테스트 로그 */
$log->debug('에러발생');
