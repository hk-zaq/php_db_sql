<?php


//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
// XSS対策のため、htmlspecialchars関数を入れる
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");;
$category = htmlspecialchars($_POST["category"], ENT_QUOTES, "UTF-8");;
$money = htmlspecialchars($_POST["money"], ENT_QUOTES, "UTF-8");;
$note = htmlspecialchars($_POST["note"], ENT_QUOTES, "UTF-8");;



//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
// mamppの方は
// $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost', 'root', 'root');

try {
    $pdo = new PDO('mysql:dbname=seisan_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO seisan_table(id, name, category, money,
note, date )VALUES(NULL, :name, :category, :money, :note, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  
$stmt->bindValue(':category', $category, PDO::PARAM_STR);  
$stmt->bindValue(':money', $money, PDO::PARAM_INT); //数値なので PDO::PARAM_INT)
$stmt->bindValue(':note', $note, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: index.php");
    exit;
}
