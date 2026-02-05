<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=20260128;charset=utf8","root","");

$page = $_GET['page'] ?? 'list';
$idx = $_GET['idx'] ?? NULL;

$titles = [
    'list'=> '게시물 목록',
    'view' => '게시물 조회',
    'update' => '게시물 수정',
    'write' => '게시물 작성'
];
