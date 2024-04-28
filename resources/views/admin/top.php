<?php
require_once('../library/library.php');

// authセッションがなかった場合、ログイン画面に遷移
if (empty($_SESSION['_auth_admin']) || $_SESSION['_auth_admin']['hash'] != 1) {
    header('Location: login.php');
    exit;
}

$menu = 1;
require_once('template/header.php');
require_once('template/footer.php');
