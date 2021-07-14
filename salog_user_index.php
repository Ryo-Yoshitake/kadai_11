<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/saunalog.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Main[Start] -->
<form method="POST" action="salog_user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>無料会員登録</legend>
     <label>アカウント名：<input type="text" name="name"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>PW：<input type="text" name="lpw"></label><br>
     <input class="touroku" type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="./saunalog.html">戻る</a></div>
    </div>
</nav>

<div class="data_check">
  <a class="data_check_link" href="salog_select.php">会員データ一覧</a>
</div>


</body>
</html>