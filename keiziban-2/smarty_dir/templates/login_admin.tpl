<form action="login_admin.php" method="post">

名前:  {$smarty.session.name}<br>
本文:
<textarea name="contents" rows="4" cols="40"></textarea>

<input type="submit" value="送信"><input type="reset" value="リセット">

<br>
{foreach $posts as $postdata}
  {$postdata.id}  {$postdata.created}
   <br>{$postdata.name}
   <br>{$postdata.contents|escape}<br>
{/foreach}
</form>

<form action="logout.php" method="post">
<input type="submit" value="ログアウト">

</form>
