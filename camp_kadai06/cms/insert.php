<?php
// 1,入力チェック
// --------------------------------------------------
// 商品名　受信チェック　phpではproductname
if(!isset($_POST["productname"])||$_POST["productname"]==""){
    exit("parameError! productname!");
}
// 金額　受信チェック　phpではprice
if(!isset($_POST["price"])||$_POST["price"]==""){
    exit("parameError! price!");
}
// 数量　受信チェック　phpでは	quantity
// if(!isset($_POST["quantity"])|| $_POST["quantity"]==""){
//     exit("parameError! quantity!");
// }

// 種類　受信チェック　　phpではcategory
if(!isset($_POST["category"])||$_POST["category"]==""){
    exit("parameError! category!");
}

// 商品説明　受信チェック　phpではExplanation
if(!isset($_POST["explanation"])||$_POST["explanation"]==""){
    // exit("parameError! explanation!");
}
// 画像受信チェック　
if(!isset($_FILES["fname"]["name"])||$_FILES["fname"]["name"]==""){
    exit("parameError! files!");
}

//------------------------------------2 postデータの取得--------------------------------------------
// ↓postで送られたデータを変数化する
$fname = $_FILES["fname"]["name"];
$productname = $_POST["productname"];
$category = $_POST["category"]; 
$price=$_POST["price"];
$explanation=$_POST["explanation"];

//-------------------------------3,画像を上げる処理　---------------------------------------------------
// 画像のパス↓
$upload = "../img/";

// アップロードした画像を../img/へ移動させる記述↓
if(move_uploaded_file($_FILES['fname']['tmp_name'],$upload.$gazou)){
// 画像を上げる処理　問題なし 何も起こらず
}
else{
    //画僧を上げる処理　問題あり
    echo "画像をあげる事が出来ませんでした";
    echo $_FILES['upfile']['error'];
}
// ----------------------------4,myphpへ接続-------------------------------------------------------
try{
    $Pdo= new PDO('mysql:dbname=ec_site; charset=utf8;host=localhost','root','');
} catch(PDOException $e){
    exit('DbConnectError:'.$e -> getMessage());
}
// -----------------------------------5,SQLへ登録-------------------------------------------
$stmt= $Pdo->prepare("INSERT INTO syouhinn_table(id,productname,price,category,
explanation,fname,indate)VALUES(NULL,:productname,:price,:category,:explanation,:fname,sysdate())");
$stmt ->bindValue(':productname',$productname,PDO::PARAM_STR);
$stmt ->bindValue(':price',$price,PDO::PARAM_INT);//金額は数値
$stmt ->bindValue(':category',$category,PDO::PARAM_STR);
$stmt ->bindValue(':explanation',$explanation,PDO::PARAM_STR);
$stmt ->bindValue(':fname',$fname,PDO::PARAM_STR);
$status=$stmt->execute();
// -------------------------------------6,データベースに登録後の処理----------------------------
if($status==false){
    // データベース実行時にエラーがある場合は(エラーオブジェクト取得して表示)
    $error=$stmt->errorInfo();
    exit("QueryEroor:".$error[2]);
} else{
    // item.phpヘリダイレクト
    header("Location:item.php");
    exit;
}

?>
