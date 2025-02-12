<?php
    require_once '../redirect.php';
    require_once '../config/config.session.php';
    require_once '../config/db.php';
    require_once '../model/hometest.model.php';
    require_once '../view/hometest.view.php';

$name = getName($pdo);
welcome($name);