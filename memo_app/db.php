<?php
$dbFile = __DIR__ . '/memo.db';

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS memos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            content TEXT NOT NULL,
            created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
        )'
    );
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。SQLiteが有効か確認してください。');
}
