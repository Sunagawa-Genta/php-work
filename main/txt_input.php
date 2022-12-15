<?php 
session_start();

//ログイン済みかを確認
if (!isset($_SESSION['USER'])) {
    header('Location:login.php');
    exit;
}
//ログアウト機能
if(isset($_POST['logout'])){
    $_SESSION = [];
    session_destroy(); // セッションを完全に破棄
    header('Location:login.php'); // ログインしていない人向け画面に遷移
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>看護師登録フォーム（入力画面）</title>
</head>

<!doctype html>
<html>
  <body>
    <div>
      <form method="post" action="member-index.php">
        <input type="submit" name="logout" value="ログアウト"><br>
      </form>
    </div>
   <form action="txt_create.php" method="POST">
    <fieldset>
      <legend>看護師登録フォーム（入力画面）</legend>
      <a href="txt_read.php">一覧画面</a>
      <div>
        名前: <input type="text" name="name">
      </div>
      <div>
        年齢: <input type="number" name="age">
      </div>
      <div>
        性別: <input type="text" name="sex">
      </div>
      <div>
        看護師歴: <input type="number" name="work">
      </div>
      <div>
        経験診療科: <input type="text" name="experience">
      </div>
      <div>
        所属病院: <input type="text" name="hospital">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
   </form>
</body>

</html>