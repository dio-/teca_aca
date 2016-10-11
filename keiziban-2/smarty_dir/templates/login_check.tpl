<form action="login_check.php" method="post">
名前：
<input type="text" name="name" size="40"><br>
本文:
<textarea name="contents" rows="4" cols="40"></textarea>

<input type="submit" value="送信"><input type="reset" value="リセット">

<!--ここでエラーを表示したい{$value}-->

{$name}
{$created}
{$contents}

</form>

