<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>電卓</title>
</head>
<body>
<!-- post …… 本文(本体)として送信される -->
<form action="calc.php" method="post">

    <!-- 最初の数字 -->
    <input type="text" name="message1">

    <!-- セレクトボタン -->
    <select name="calc" title="2">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>

    <!-- ２つ目の数字 -->
    <input type="text" name="message2">

    = ?<br>

    <!-- 計算ボタン -->
    <input type="submit" value="送信">

    <!-- リセットボタン -->
    <input type="reset" value="リセット">

</form>

<?php
header("Content-Type: text/html; charset=UTF-8");


if(isset($_POST['message1']) && isset($_POST['message2']) && isset($_POST['calc'])) {
    $message1 = htmlspecialchars($_POST['message1']);
    $message2 = htmlspecialchars($_POST['message2']);
    $calc1 = $_POST['calc'];

    // 取得した数字をstring型に変換
    $str_message1 = (string)$message1;
    $str_message2 = (string)$message2;


    // 数字だったら計算する、数字じゃなかったらエラーを出力
    if (is_numeric($str_message1) && is_numeric($str_message2)) {
        switch($calc1){
            case "+":
                $sum = $message1 + $message2;
                break;
            case "-":
                $sum = $message1 - $message2;
                break;
            case "*":
                $sum = $message1 * $message2;
                break;
            case "/":
                // 割り算のみ 0を避ける
                if($message1 == 0) {
                    break;
                }
                else{
                    $sum = $message1 / $message2;
                    break;
                }
        }
        print ($message1." ".$calc1." ".$message2." = ".$sum."\n");
    }
    else{
        print "半角数字を入れてください";
    }
}

?>

</body>
</html>