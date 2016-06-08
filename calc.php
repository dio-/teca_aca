<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<!-- get …… 送信内容がURLとして渡される(初期値) -->
<!-- post …… 本文(本体)として送信される -->
<form action="calc.php" method="post">

    <!-- 最初の数字 -->
    <input type="text" name="message1" title="1">

    <!-- セレクトボタン -->
    <select name="calc" title="2">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>

    <!-- ２つ目の数字 -->
    <input type="text" name="message2" title="3">

    = ?

    <input type="hidden" name="sousin" value="1">


    <!-- 計算ボタン -->
    <br><input type="submit" value="送信">

    <!-- リセットボタン -->
    <form><input type="reset" value="リセット"></form>


</form>

<?php
header("Content-Type: text/html; charset=UTF-8");

// getで数字などを取得
$message1 = htmlspecialchars($_POST['message1']);
$message2 = htmlspecialchars($_POST['message2']);
$calc1 = $_REQUEST['calc'];

// 取得した数字をstring型に変換
$message3 = (string)$message1;
$message4 = (string)$message2;

// 数字だったら計算する、数字じゃなかったらエラーを出力
if(is_numeric($message1) && is_numeric($message2)){
    switch($calc1){
        case "+":
            $sum = $message3 + $message4;
            //            print $sum;
            break;
        case "-":
            $sum = $message3 - $message4;
            //            print $sum;
            break;
        case "*":
            $sum = $message3 * $message4;
            //            print $sum;
            break;
        case "/":
            $sum = $message3 / $message4;
            //            print $sum;
            break;
    }
    print ($message3." ".$calc1." ".$message4." = ".$sum."\n");

}
else{
    if( isset( $_POST['sousin'] ) ){
        print '半角数字を入力してください';
    }

}
?>

</body>
</html>