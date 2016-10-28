<form action="login_admin.php" method="post">
名前：
<input type="text" name="name" size="40"><br>
本文:
<textarea name="contents" rows="4" cols="40"></textarea>

<input type="submit" value="送信"><input type="reset" value="リセット">

{$smarty.session.name}

<br>
{foreach $posts as $postdata}
  {$postdata.id}  {$postdata.created}
   <br>{$postdata.name}
   <br>{$postdata.contents|escape}<br>
{/foreach}
</form>

