<?php
session_start(); // セッション開始宣言

// ログイン済みかを確認
if (isset($_SESSION['USER'])) {
    header('Location: txt_input.php'); 
    exit; // 処理終了
}
// ログイン機能
$error_message = '';
if(isset($_POST['login'])) { // name="login"と対応している
    if($_POST['password'] == 'qwerty123') { // パスワード
        $_SESSION['USER'] = 'user'; // 
        header('Location: txt_input.php');
        exit;
    } else {
        $error_message = 'パスワードが違うみたいです';
    }
}
?>
<!doctype html>
<html>
  <body>
    <!-- 中略 -->
    <div>
      <p style="color:red;"><?php echo $error_message ?></p>
      <form id="memberLogin" method="post" action="login.php">
        <p>パスワードを入力してください。</p>
        <p>
          <input type="password" id="password" name="password" size="20" />
        </p>
        <p>
          <input type="checkbox" id="password-check" name="" value="" />
          <label for="password-check" onclick="">パスワードを表示する</label>
        </p>
        <p>
          <button type="button" onclick="history.back()">もどる</button>
          <button type="submit" name="login" size="" value="">送信</button>
        </p>
      </form>
    </div>
  </body>
</html>