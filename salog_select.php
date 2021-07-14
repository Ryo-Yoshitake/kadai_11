<?php
//SESSIONスタート
session_start();

// funcs.phpを読み込む
require_once('funcs.php');

//ログインチェック
loginCheck();
$user_name = $_SESSION['name'];

//1.  DB接続します
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM member_an_table");
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href="salog_detail.php?id=' . $r["id"] . '">';
    $view .= h($r['indate']).':'.h($r['name']).':'.h($r['home_sauna']);
    $view .= '</a>';
    $view .= "";
    $view .= '<a href="salog_delete.php?id=' . $r['id'] . '">';//追記
    $view .= '  [削除]';//追記
    $view .= '</a>';//追記
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/saunalog.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="salog_register_form.php">データ登録</a>
      </div>
      <p><?=$user_name?></p>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <a href="salog_detail.php"></a>  
    <?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
