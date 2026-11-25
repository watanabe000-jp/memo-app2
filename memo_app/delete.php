<?php
require_once __DIR__ . '/db.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id !== false && $id !== null) {
    $stmt = $pdo->prepare('DELETE FROM memos WHERE id = :id');
    $stmt->execute([':id' => $id]);
}

header('Location: index.php');
exit;
