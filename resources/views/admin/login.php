<?php
require_once('../library/library.php');

// セッション破棄
if (!empty($_SESSION['_auth_admin'])) {
    unset($_SESSION['_auth_admin']);
}

//認証ボタン押下
if (!empty($_POST['login'])) {
    if (getTrimStrlen($_POST['login_id']) == 0 || getTrimStrlen($_POST['login_pass']) == 0) {
        $msg = 'IDかパスワードが入力されていません。';
    } else {
        try {
            $model = new Model();
            $model->connect();

            $sql =
                ' SELECT '
                    . ' id, '
                    . ' name, '
                    . ' login_pass '
                . ' FROM '
                    . ' admin_user '
                . ' WHERE delete_flg = 0 '
                    . ' AND login_id = :id '
            ;

            $stmt = $model->dbh->prepare($sql);
            $stmt->bindValue(':id', $_POST['login_id'], PDO::PARAM_STR);
            $stmt->execute();
            $adminUserData = $stmt->fetch(PDO::FETCH_ASSOC);

            // IDとパスワードに一致するユーザがいたらtrueを返す
            if (!empty($adminUserData) && password_verify($_POST['login_pass'], $adminUserData['login_pass'])) {
                session_regenerate_id(true);

                // 本当は固定値じゃなくてハッシュ値
                $_SESSION['_auth_admin']['hash'] = 1;
                $_SESSION['_auth_admin']['id'] = $adminUserData['id'];
                $_SESSION['_auth_admin']['name'] = $adminUserData['name'];

                header('Location: top.php');
                exit;
            }

            $msg = 'IDかパスワードが間違っています。';
        } catch (PDOException $e) {
            $msg =
                'システムエラーが発生しました。<br>'
                . '再度実行してもエラーが発生する場合は、お手数ですが〇〇までご連絡ください。'
            ;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=ROOT_URL?>/css/admin-common.css" rel="stylesheet">
    <link href="<?=ROOT_URL?>/css/admin-login.css" rel="stylesheet">
    <title><?=SITE_NAME?>　管理ログイン画面</title>
</head>
<body>
    <div class="wrapper">
        <main>
            <h1><?=SITE_NAME?>　管理ログイン画面</h1>
            <div class="login-area">
                <?=!empty($msg) ? '<div class="error">' . $msg . '</div>' : ''?>
                <form action="" method="post">
                    <table>
                        <tr>
                            <th>ログインID:</th>
                            <td><input type="text" name="login_id" value="<?=!empty($_POST['login_id']) ? h($_POST['login_id']) : ''?>"></td>
                        </tr>
                        <tr>
                            <th>パスワード:</th>
                            <td><input type="password" name="login_pass"></td>
                        </tr>
                    </table>
                    <p><input type="submit" name="login" value="認証"></p>
                </form>
            </div>
        </main>
        <footer>
            <?=date('Y')?> <?=CORP_NAME?>
        </footer>
    </div>
</body>
</html>