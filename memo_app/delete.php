<?php
require_once __DIR__ . '/db.php';

// 削除するメモのIDを受け取る
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id !== false && $id !== null) {
    $stmt = $pdo->prepare('DELETE FROM memos WHERE id = :id');
    $stmt->execute([':id' => $id]);
}

// 削除後、一覧画面に戻る
header('Location: index.php');
exit;
