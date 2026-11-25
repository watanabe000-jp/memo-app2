<?php
require_once __DIR__ . '/db.php';

$content = trim($_POST['content'] ?? '');

if ($content !== '' && mb_strlen($content) <= 500) {
    $stmt = $pdo->prepare('INSERT INTO memos (content) VALUES (:content)');
    $stmt->execute([':content' => $content]);
}

header('Location: index.php');
exit;
