<?php
// カートに入れるかどうかを選択するページ
session_start();

// GETでidを取得
if(!isset($_GET["id"])||$_GET["id"]==""){
  exit("ParamError!");
}else{
  $id = intval($_GET["id"]);//intval数値変換
}

// 1.DB接続します
try {
  $pdo = new PDO('mysql:dbname=ec_site;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// ２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM syouhinn_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute(); 

// ３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  $row = $stmt->fetch();//１レコードだけ取得：$row["フィールド名"]で取得可能
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <title>産地直送ネット</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
    <!-- ヘッダーのデザイン -->
    <header class="header">
      <div class="buy">

            <h1 class="logo"><img src="img/rogo.png" alt="ロゴ画像" class="rogobgazou"></h1>

                <ul class="headre__nav">
                   <li class="buymoji">ガイド</li>
                   <li class="buymoji">ログイン</li>
                   <li class="buymoji">カート</li>  
                </ul>
      </div>
    </header>
    <!-- ヘッダーのデザイン終わり-->

<form action="cartadd.php" method="POST">
  <div class="outer">
    <!--商品本情報-->
    <div class="wrapper wrapper-syouhinn flex-parent">

      <main class="syouhinn">

        <!--商品情報-->
        <p class="syouhinn-thumb"><img src="./img/<?=$row["fname"]?>" width="70%"></p>
        <div class="flex-parent item-label">
          <h1 class="syouhinn-name"><?=$row["productname"]?></h1>
          
        </div>

        <!--カートボタン-->
        <div class=keltutei>
          <div class="kounyuu">
          　<p class="item-price"><?=$row["price"]?>円</p>
            <p><input type="number" value="1" name="num" class="cartin-number"></p>
          </div>

          <div class="kaart"> <input type="submit" class="btn-cartin" value="カートに入れる"></div>
        </div>
        
       
        <!--商品詳細情報-->
        <div class="syouhinnjyouhou">
          <p class="item-text"><?=$row["explanation"]?></p>
        </div>
        <input type="hidden" name="productname" value="<?=$row["productname"]?>">
        <input type="hidden" name="price" value="<?=$row["price"]?>">
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <input type="hidden" name="fname" value="<?=$row["fname"]?>">
      </main>
    </div>
  </div>
</form>

  

  <!--footer-->
  <footer>
        <div class="footer-font">
            <p>産地直送ネット</p>
            <p>copyright@sanntityokusounet All Rights Reserved</p>

        </div>

    </footer>
    <!--end footer-->
 

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
    
</body>
</html>