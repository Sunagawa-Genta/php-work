<?php
// データまとめ用の空文字変数
$str = '';
$array= [];

// ファイルを開く（読み取り専用）
$file = fopen('data1/data.txt', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
   while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する
    $str .="<tr><td>{$line}</td></tr>";
//配列作る
    $array[]= [
      "name"=> explode(" ",$line)[0],
      "age"=> explode(" ",$line)[1],
      "sex"=> explode(" ",$line)[2],
      "work"=> explode(" ",$line)[3],
      "experience"=> explode(" ",$line)[4],
      "hospital"=> str_replace("\n","",explode(" ",$line)[5]),
    ];
  }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);
//var_dump($array);
// `$str`に全てのデータ（タグに入った状態）がまとまるので，HTML内の任意の場所に表示する．


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録リスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>登録リスト（一覧画面）</legend>
    <a href="txt_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>リスト</th>
        </tr>
      </thead>
      <tbody>
        <?=$str?>
      </tbody>
    </table>
  </fieldset>
</body>
  <script>
    // JSではPHPの配列を扱えないため，サーバ上でJSON形式に変換する。
        const data = <?= json_encode($array)?>;
        console.log(data);
  </script>
</html>