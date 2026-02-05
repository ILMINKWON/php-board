<?php
$url = "./";

extract($_POST);

switch ($action) {

    case 'insert':
        $stmt = $db->prepare("
            INSERT INTO board (subject, writer, content, reg_date)
            VALUES (?, ?, ?, now())
        ");
        $stmt->execute([$subject, $writer, $content]);
        $url = "./";
        break;


    case 'update':
        $stmt = $db->prepare("
            UPDATE board
            SET subject = ?, writer = ?, content = ?
            WHERE idx = ?
        ");
        $stmt->execute([$subject, $writer, $content, $idx]);
        $url = "./?page=view&idx={$idx}";
        break;


    case 'delete':
        $stmt = $db->prepare("
            DELETE FROM board WHERE idx = ?
        ");
        $stmt->execute([$idx]);
        $url = "./";
        break;


    default:
        exit('잘못된 요청');
}

header("Location: {$url}");
exit;
