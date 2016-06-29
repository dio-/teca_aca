<?php
header("Content-Type: text/html; charset=UTF-8");

if(isset($_POST['num1']) && isset($_POST['calc1'])) {
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']);
    $calc1 = $_POST['calc1'];

    // セレクトボタンの値の保持
    $selected = array(); 
    $selected[$calc1] = "selected";
 
    // リセットボタンの処理
    $reset = $_POST['reset'];
    if(isset($reset)){
       $num1 = ""; // 1番目の数字
       $calc1 = ""; // 和差積商
       $num2 = ""; // 2番目の数字
       $result = "?"; //答え
    }

    // 数字だったら計算する、数字じゃなかったらエラーを出力
    if (is_numeric($num1) && is_numeric($num2)) {
        switch($calc1) {
            case 0: // 足し算
                $result = $num1 + $num2;
                break;
            case 1: // 引き算
                $result = $num1 - $num2;
		break;
            case 2: // 掛け算
                $result = $num1 * $num2;
                break;
            case 3: // 割り算
                if ($num2 == 0) {  // 割り算のみ 0を避ける
                    print ("0で割れないです。");
                    $result = "×";
                    break;
                } else {
                    $result = $num1 / $num2;
                    break;
                }
        }
    }else{
        print "半角数字を入れてください";
    }
}else{
   print "数値を入れてください";
   $result = "?";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>電卓</title>
</head>
<body>
<!-- post …… 本文(本体)として送信される -->
<form method="post">

    <!-- 最初の数字 -->
    <input type="text" name="num1" value="<?php echo "$num1" ?>" >

    <!-- セレクトボタン -->
    <select name="calc1" >
        <option value=0 <?php echo $selected[0]; ?> >+</option>
        <option value=1 <?php echo $selected[1]; ?> >-</option>
        <option value=2 <?php echo $selected[2]; ?> >×</option>
        <option value=3 <?php echo $selected[3]; ?> >÷</option>
    </select>

    <!-- ２つ目の数字 -->
    <input type="text" name="num2" value="<?php echo "$num2" ?>" >

    <!-- 答え -->
    <?php print "=".$result; ?>

    <!-- 送信ボタン -->
    </br><input type="submit" value="送信">

    <!-- リセットボタン -->
    <input type="submit" name="reset" value="リセット">

</form>
</body>
</html>
