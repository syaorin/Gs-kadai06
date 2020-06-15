





<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dezainn.css">
    <title>産地直送ネット</title>
</head>
<body>
    <header>

        <div class="header-main">
            <p class="head-moji">産地直送ネット</p>
            <img src="img/pig.jpg" alt="ヘッダー画像" class="gazou">
        </div>

        <div class="buy">
            <ul>
                <li>ガイド</li>
                <li>ログイン</li>
                <li>カート</li>
            </ul>
        </div>

        <div class="food">
            <ul>
                <li>野菜</li>
                <li>魚介類・水産品</li>
                <li>肉</li>
                <li>卵・乳製品</li>
                <li>果物</li>

            </ul>
        </div>
    </header>
    <div>
    <ul class="bxslider">
      <li><img src="./img/icon.PNG" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
      <li><img src="images/index/slide.jpg" alt=""></li>
    </ul>
  </div> -->

  <div class="outer">
    メインカテゴリー
    <!-- <div class="list-outer">
      <ul class="list">
        <li class="list-item"><a href="#">Category1</a></li>
        <li class="list-item"><a href="#">Category2</a></li>
        <li class="list-item current"><a href="#">Category3</a></li>
        <li class="list-item"><a href="#">Category4</a></li>
        <li class="list-item"><a href="#">Category5</a></li>
      </ul>
    </div> -->
    <!--end メインカテゴリー

    <div class="wrapper wrapper-main flex-parent">

      <aside class="sidebar">
        form
        <div class="widget">
          <form action="" method="get" class="search-form">
            <div>
              <input type="text" placeholder="アイテムを探す" class="search-box">
              <input type="submit" value="送信" class="search-submit">
            </div>
          </form>
        </div>
        <!--end form-->

        <!--category-->
        

        <!--end category-->
      <!-- </aside>

      <main class="wrapper-main"> -->
        <!--並び替えボタン-->
        <!-- <div class="sort-area">
          <a href="#" class="sort-all">全てを見る</a>

          <div class="sort-detail">
            <p class="sort-text">並べ替え:</p>
            <ul class="sort-list flex-parent">
              <li class="sort-item"><a href="#">名前順</a></li>
              <li class="sort-item"><a href="#">価格の安い順</a></li>
            </ul>
          </div>
        </div> -->
        <!--end 並び替えボタン-->

        <!--商品リスト-->
        <ul class="products-list">
            <?php echo $view;?> 
        </ul>
        <!--end 商品リスト-->

        <!--ページャー-->
        <!-- <ul class="pager clearfix">
          <li class="pager-item"><a href="#">1</a></li>
          <li class="pager-item"><a href="#">2</a></li>
          <li class="pager-item"><a href="#">3</a></li>
          <li class="pager-item"><a href="#">4</a></li>
          <li class="pager-item"><a href="#">5</a></li>
          <li class="pager-item"><a href="#">最後へ</a></li>
        </ul> -->
        <!--end ページャー-->
      </main>
    </div>
  </div>




    <footer>
        <div class="footer-font">
            <p>産地直送ネット</p>
            <p>copyright@sanntityokusounet All Rights Reserved</p>

        </div>

    </footer>
</body>
</html>