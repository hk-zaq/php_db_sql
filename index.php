<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>[我が家の家計簿]データ登録</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>今月の支払いを入力してね</legend>
     <label>支払者：<input type="text" name="name"></label><br>
     <label>費目：<select name="category">
     <option value="">費目を選択</option>
     <option value="食費">食費</option>
     <option value="日用品費">日用品費</option>
     <option value="娯楽費">娯楽費</option>
     <option value="イベント費">イベント費</option>
     <option value="交通費">交通費</option>
     <option value="医療費">医療費</option>
     <option value="被服・美容費">被服・美容費</option>
     <option value="固定費">固定費</option>
     </select></label><br>
     <label>金額：<input type="number" name="money"></label><br>
     <label>備考：<input type="text" name="note"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

<form action="GET" action="select.php">
<div class="jumbotron">
<fieldset>
<legend>今月の清算リストを確認する</legend>
<input type="button" onClick="location.href='http://localhost/php_db/seisan_php/select.php'" value="check">
</fieldset>
</div>
</form>
<!-- Main[End] -->


</body>
</html>
