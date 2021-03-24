<?php
//1.  DB接続します xxxにDB名を入れます
try {
$pdo = new PDO('mysql:dbname=seisan_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM seisan_table WHERE date >= '2021-03-01' and date <= '2021-03-31';");
$status = $stmt->execute();
$row_count = $stmt->num_rows;

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $results[] = $result;
  }

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>[我が家の家計簿]データ一覧</title>
<link href="css/table.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav>
    <div>
      <a href="index.php">データ登録</a>
      </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div>
    <div><?=$view?></div>
    <p>今月の支払</p>
    <table>
      <tr>
        <th>id</th>
        <th>支払者</th>
        <th>費目</th>
        <th>金額</th>
        <th>備考</th>
        <th>日付</th>
      </tr>

<?php
// 配列を反復処理する。配列$resultsに対してループ処理を行い、各反復において現在の要素の値を$resultに代入する
foreach($results as $result){
  ?>
<tr>
<td><?php echo $result['id']; ?></td>
<td><?php echo $result['name']; ?></td>
<td><?php echo $result['category']; ?></td>
<td><?php echo $result['money']; ?></td>
<td><?php echo $result['note']; ?></td>
<td><?php echo $result['date']; ?></td>
</tr>

  <?php
}
?>
</table>
</div>
<!-- Main[End] -->

</body>
</html>
