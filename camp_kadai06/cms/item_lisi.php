<?php
// 1. phpへ接続
try{
    $Pdo= new PDO('mysql:dbname=ec_site; charset=utf8;host=localhost','root','');
} catch(PDOException $e){
    exit('DbConnectError:'.$e -> getMessage());
}


// 2,テーブルからデータを取り出す

$stmt= $Pdo->prepare("SELECT*FROM syouhinn_table");
$status=$stmt->execute();




// 3,データの表示
$view="";
if($status==false){
    // データベース実行時にエラーがある場合は(エラーオブジェクト取得して表示)
    $error=$stmt->errorInfo();
    exit("EroorQuery:".$error[2]);
} else{
    // selectデータの数だけ自動ループしてくれる
    while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
$view .='<li class=kannrilist>';
$view .='<p class="cart-thumb"><img src="../img/'.$res["fname"].'" width="200"></p>';
$view .='<h2 class="cart-title">'.$res["productname"].'</h2>';
$view .='<p class="cart-price">'.$res["price"].'</p>';
$view .='<a href="#" class="btn-delete">削除</a>';
$view .='</li>';
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dezainn.css">
    <title>管理者リスト</title>
</head>
<body>
    <header>

    </header>
    <main>
        <p class="item_midasi">商品取り扱いリスト</p>

        <div class="item_list">
        <ul class=kanri>
        <?php echo $view ?>
        </ul>
        </div>
    </main>
  
    

    <footer>
        <div class="footer-font">
            <p>産地直送ネット</p>
            <p>copyright@sanntityokusounet All Rights Reserved</p>

        </div>

    </footer>
</body>
</html>