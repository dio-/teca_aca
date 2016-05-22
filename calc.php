<?php
//ini_set( 'display_errors', 1 );
header("Content-Type: text/html; charset=UTF-8");

// getで数字などを取得
$message1 = htmlspecialchars($_GET['message1']);
$message2 = htmlspecialchars($_GET['message2']);
$calc1 = $_REQUEST['calc'];

// 取得した数字をstring型に変換
$message3 = (string)$message1;
$message4 = (string)$message2;

//echo $message1;
//echo $message2;
//echo $message3;
//echo $message4;
//echo $calc1;

// 数字だったら計算する、数字じゃなかったらエラーを出力
if(is_numeric($message3) && is_numeric($message4)){
    switch($calc1){
        case "+":
            $sum = $message3 + $message4;
            print $sum;
            break;
        case "-":
            $sum = $message3 - $message4;
            print $sum;
            break;
        case "*":
            $sum = $message3 * $message4;
            print $sum;
            break;
        case "/":
            $sum = $message3 / $message4;
            print $sum;
            break;
    }
}
else{
    print '半角数字を入力してください';
}
