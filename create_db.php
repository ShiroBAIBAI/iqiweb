<?php
try {
    // 创建SQLite数据库连接
    $db = new PDO('sqlite:realestate.db');

    // 设置错误模式
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 创建表
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    echo "表创建成功";
} catch (PDOException $e) {
    echo "数据库错误: " . $e->getMessage();
}
?>
