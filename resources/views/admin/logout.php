<?php
// ログイン画面に遷移したらセッションクリアされるが、一応
require_once('../library/library.php');

// セッション破棄
unset($_SESSION['_auth_admin']);

header('Location: login.php');
exit;