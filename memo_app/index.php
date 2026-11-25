<?php
require_once __DIR__ . '/db.php';

$stmt = $pdo->query('SELECT id, content, created_at FROM memos ORDER BY id DESC');
$memos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>かんたんメモアプリ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <h1>かんたんメモアプリ</h1>
        <p class="description">今日のメモを投稿してみよう！</p>

        <form action="post.php" method="post" class="memo-form">
            <label for="content">メモの内容</label>
            <textarea id="content" name="content" rows="4"
                      placeholder="メモを入力してください..." required maxlength="500"></textarea>
            <button type="submit">メモを投稿</button>
        </form>

        <h2>投稿一覧</h2>
        <?php if (count($memos) === 0): ?>
            <p class="empty">まだメモはありません。</p>
        <?php else: ?>
            <ul class="memo-list">
                <?php foreach ($memos as $memo): ?>
                    <li class="memo-item">
                        <p><?= htmlspecialchars($memo['content'], ENT_QUOTES, 'UTF-8') ?></p>
                        <small><?= htmlspecialchars($memo['created_at'], ENT_QUOTES, 'UTF-8') ?></small>
                        <form action="delete.php" method="post" class="delete-form">
                            <input type="hidden" name="id" value="<?= (int)$memo['id'] ?>">
                            <button type="submit" class="delete-button">削除</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
</body>
</html>
