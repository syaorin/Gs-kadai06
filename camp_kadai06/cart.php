<?php
session_start();
//----------------------------------------------------
//1．SESSIONからカートを取得
//※カートSESSION: array([0]=productname,[1]=price,[2]=num,[3]=fname);
//----------------------------------------------------
$view ='';
//$_SESSION["cart"]のデータを取得
foreach($_SESSION["cart"] as $key => $value){
      $view .='<li class="cart-list">';
      $view .='<p class="cart-thumb"><img src="./img/'.$value[3].'" width="200"></p>';
      $view .='<h2 class="cart-title">'.$value[0].'</h2>';
      $view .='<p class="cart-price">'.$value[1].'円'.'</p>';
      $view .='<p class="cart-number">'.$value[2].'</p>';
      $view .='<a href="cartremove.php?id='.$key.'" class="btn-delete">削除</a>'; //$key
      $view .='</li>';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>産地直送ネット</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
</head>
<body>
  <!--header-->
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
  <!--end header  -->

  <div class="outer">
    <h1 class="page-title">お買い物カート</h1>
    <div class="wrapper wrapper-main flex-parent">
      <main class="wrapper-main">
       
        <?php
          //表示
          echo  $view;
        ?>
        </ul>
        <ul class="btn-list">
          <li class="btn-item btn-buy"><a href="main.php">買い物を続ける</a></li>
          <li class="btn-item btn-calculate"><a onclick="alert('外部決済サイトに移動...');">注文手続きへ</a></li>
        </ul>
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
</body>
</html>