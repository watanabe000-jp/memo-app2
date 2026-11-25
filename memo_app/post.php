<?php
require_once __DIR__ . '/db.php';

// フォームから送信されたメモを受け取る
$content = trim($_POST['content'] ?? '');

if ($content !== '' && mb_strlen($content) <= 500) {
    // SQLを安全に実行するためにプリペアドステートメントを使う
    $stmt = $pdo->prepare('INSERT INTO memos (content) VALUES (:content)');
    $stmt->execute([':content' => $content]);
}

// 投稿後、一覧画面に戻る
header('Location: index.php');
exit;
