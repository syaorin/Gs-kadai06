<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dezainn.css">
    <title>アイテム</title>
</head>

<body>
    <!-- 商品本情報 -->
    <div class="wrapper wrapper-cms">
        <!-- 商品選択フォーム -->
        <form action="insert.php" method="post" class="flex-parent cartin-area cms-area"
        enctype="multipart/form-data">
            <!-- 商品情報 -->
            <p class="cms-thumb"><img src="../img/カートのアイコン素材.png" alt="画像"width="200"></p>
            <dl class="cms-list">
                <dt>画像</dt>
                <dd><input type="file" name="fname" class="cms-item" accept="img/*"></dd>

                <dt>商品名</dt>
                <dd><input type="text" name="productname" class="cms-item" placeholder="商品名を入力"></dd>

                <dt>金額</dt>
                <dd><input type="text" name="price" class="cms-item" placeholder="金額を入力"></dd>

                <!-- <dt>分類</dt> -->
                <label for="bunnrui">分類</label>
                <select name="category" id="bunnrui">
                <option value="yasai">野菜</option>
                <option value="sakana">魚介類・水産品</option>
                <option value="niku">肉</option>
                <option value="tamago">卵・乳製品</option>
                <option value="kudamono">果物</option>
                </select>
                <!-- <input type="text" name="category" class="cms-item" placeholder="分類を入力"></dd> -->

                <dt>商品説明</dt>
                <dd><textarea name="explanation" id="" cols="30" rows="10"class="cms-item"></textarea></dd>
            </dl>
            <ul class="btn-list btn-list__cms">
                <li class="">
                    <a href="./" class="btn-back">戻る</a>
                </li>
                <li class="btn-calcuate">
                    <input type="submit" id="btn-update" value="登録">

                </li>
            </ul>
            
        </form>
    </div>
    <?php



?>
<!-- jクエリで画像を上げる作業 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
// 上げる画像を選択
$("input[type=file]").change(function(){
    // 選択したファイルを取得し、file変数に格納
var file= $(this).prop("files")[0];
// 画像以外は処理を停止
if(!file.type.match("image.*")){
　 // クリア
$this.val("");　//選択されているファイルを空にする
$(".cms-thumb >img").html("");//画像表示箇所を空にする
return;
}
// 画像表示
var reader= new FileReader(); // 1
reader.onload=function() { // 2
$(".cms-thumb>img").attr("src",reader.result);   
}
reader.readAsDataURL(file); // 3
});
</script>
</body>
</html>
