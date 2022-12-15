<?php

// まずは`var_dump($_POST);`で値を確認すること！！

// データの受け取り
$name = $_POST["name"];
$age = $_POST["age"];
$sex = $_POST["sex"];
$work =$_POST["work"];
$experience =$_POST["experience"];
$data =$_POST["data"];

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$name} {$age} {$sex} {$work} {$experience} {$data}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data1/data.txt', 'a');
// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:txt_input.php");
exit();
