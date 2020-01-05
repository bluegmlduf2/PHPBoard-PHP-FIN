<?php
    include './lib/db.php';
    
    $idxVal=$_GET['param'];
    
    $query = "SELECT m_name,b_title,b_contents,b_regdate,m_id FROM tb_board where b_idx='" . $idxVal . "';";
    $result = mysqli_query($conn, $query); // limit함수는 limit 0,5 면 첫번쨰행부터 5개를 가져온다는 뜻
                                           // printf($query);
    $row = mysqli_fetch_row($result);
?>
<script>
function delete_write(b_idx){
	var chk=confirm('정말 삭제하시겠습니까?');
	if(chk){
		location.href='delete_write.php?b_idx='+b_idx;
	};
}
</script>

<table align="center">
	<tr>
		<td>글제목:</td>
		<td><?php echo $row[1];?></td>
	</tr>
	<tr>
		<td>글쓴이:</td>
		<td><?php echo $row[0];?></td>
	</tr>
	<tr>
		<td>작성일:</td>
		<td><?php echo $row[3];?></td>
	</tr>
	<tr>
		<td>글내용:</td>
		<td><?php echo $row[2];?></td>
	</tr>
</table>
<br>
<form align='center'>
<input type='button' value='목록' onclick="location.href='board_list.php'">
<input type='button' value='댓글쓰기' onclick="location.href='./board_reply.php?b_num=<?=$_GET['param1']?>'">
<?php if($row[4]==$_SESSION['userId']){?>
	<input type='button' value='수정하기' onclick="location.href='./board_modify.php?b_idx=<?=$_GET['param']?>&b_title=<?=$row[1]?>&b_contents=<?=$row[2]?>'">
    <input type='button' value='삭제하기' onclick="delete_write(<?=$idxVal?>)">

<?php };?>    
</form>
