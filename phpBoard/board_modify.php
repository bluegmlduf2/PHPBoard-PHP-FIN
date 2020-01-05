<?php
include './lib/db.php';

?>

<form action='board_write_save.php'>
<input type="hidden" name='b_idx' value="<?=$_GET['b_idx']?>">
	<table align="center">
		<tr>
			<td align="center">글제목:</td>
			<td><input type='text' valign="middle" name='b_title'
				value='<?=$_GET['b_title']?>' style="width: 400px;"></td>
		</tr>
		<tr>
			<td align="center">글내용:</td>
			<td><textarea name='b_contents' style="width: 400px; height: 100px;"><?=$_GET['b_contents']?></textarea></td>
		</tr>
	</table>
	<br>
	<table align="center">
		<tr>
			<td><input type='submit' value='수정하기'><input type='button' value='뒤로가기' onclick='location.href="history.back()"'></td>
		</tr>
	</table>
</form>