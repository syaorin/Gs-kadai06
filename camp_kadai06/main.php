<?php
session_start();
// phpのDBへ接続
try{
    $Pdo= new PDO('mysql:dbname=ec_site; charset=utf8;host=localhost','root','');
} catch(PDOException $e){
    exit('DbConnectError:'.$e -> getMessage());
}
// テーブルからデータを取り出す
$stmt= $Pdo->prepare("SELECT*FROM syouhinn_table");
$status=$stmt->execute();

// ページ送り
// $okuri="SELECT * FROM `syouhinn_table` LIMIT 10";

// データの表示
$view="";
if($status==false){
    // データベース実行時にエラーがある場合は(エラーオブジェクト取得して表示)
    $error=$stmt->errorInfo();
    exit("EroorQuery:".$error[2]);
} else{
    // selectデータの数だけ自動ループしてくれる
    while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
$view .='<li class="products-item">';
$view .='<a href="syouhinn.php?id='.$res["id"].'">';
$view .='<p class="cart-thumb"><img src="./img/'.$res["fname"].'" width="200"></p>';
$view .='<h3 class="products-title">'.$res["productname"].'</h3>';
$view .='<p class="products-price">'.$res["price"].'円'.'</p>';
$view .='</a>';
$view .='</li>';
    }
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
  <header class="header">

      <div class="buy">
        <h1 class="logo"><img src="img/rogo.png" alt="ロゴ画像" class="rogobgazou" ></h1>

        <ul class="headre__nav">
          <li class="buymoji">ガイド</li>
          <li class="buymoji">ログイン</li>
          <li class="buymoji">カート</li>  
        </ul>
      </div>


    <div class="header-main">
    　
      <p><img src="img/pig.jpg"alt=""class="gazou" id="main"></p>
      <p class="head-moji">厳選された農産物をあなたの食卓へ</p>
    </div>

      <div class="food">    
          <ul class="headre__nav">
            <li class="buymoji"> <a href="#">野菜</a></li>
            <li class="buymoji"><a href="#">魚介類・水産品</a></li>
            <li class="buymoji"><a href="#">肉</a></li>
            <li class="buymoji"><a href="#">卵・乳製品</a></li>
            <li class="buymoji"><a href="#">果物</a></li>

          </ul>
      </div>
    
  </header>


  

  <div class="outer">

      <main class="wrapper-main">
        <!--並び替えボタン-->
        <div class="sort-area">
          <a href="#" class="sort-all">全てを見る</a>

          <div class="sort-detail">
            <p class="sort-text">並べ替え:</p>
            <ul class="sort-list flex-parent">
              <li class="sort-item"><a href="#">名前順</a></li>
              <li class="sort-item"><a href="#">価格の安い順</a></li>
            </ul>
          </div>
        </div>
        <!--end 並び替えボタン-->

        <!--商品リスト-->
        <ul class="products-list">
            <?php echo $view; ?>
        </ul>
        <!--end 商品リスト-->

        <!--ページャー-->
        <ul class="display">
          <li class="item3"><a href="#">1</a></li>
          <li class="item2"><a href="#">2</a></li>
          <li class="item2"><a href="#">3</a></li>
          <li class="item2"><a href="#">4</a></li>
          <li class="item2"><a href="#">5</a></li>
          <li class="item2"><a href="#">最後へ</a></li>
        </ul> 
        <!--end ページャー -->

      </main>
    </div>
  </div>

  <!--footer-->
  <footer>
        <div class="footer-font">
            <p>産地直送ネット</p>
            <p>copyright@sanntityokusounet All Rights Reserved</p>

        </div>

    </footer>
    <!--end footer-->

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script src="js/jquery.bxslider.min.js"></script>

<script>
  $(".bxslider").bxSlider({auto:true,options:3000});

  
  
var img = ["img/fune.jpg","img/pig.jpg","img/moriawase.jpg"]; //*1
var count = -1; //*2

imgTimer();

function imgTimer(){

//画像番号
// count++; //*
//画像の枚数確認
if (count == 2) {
count = 0; //*4
}
else{
  count ++;
}
//画像出力
document.getElementById("main").src = img[count]; //*5
//次のタイマー呼びだし
setTimeout("imgTimer()",3000); //*6
}







</script>
</body>
</html>


