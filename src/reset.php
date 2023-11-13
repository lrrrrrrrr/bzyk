<?php

require_once 'inc/database.inc.php';

// cleanup if necessary
$db->query('DROP TABLE IF EXISTS blog');

// create blog table and fill with dummy data
$db->query(
    'CREATE TABLE blog (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) null default null,
        content TEXT null default null,
        user_id int null default null,
        created datetime null default null
    ) DEFAULT CHARSET = utf8'
);

$db->query(
    "INSERT INTO blog (title, content, user_id, created) VALUES
        ('test', 'bla blub', 1, NOW()),
        ('test2', 'sdfsdfsdfdsf', 2, NOW())
    "
);
