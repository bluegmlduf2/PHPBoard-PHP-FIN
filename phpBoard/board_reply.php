<script>
function eventReplyWrite(){
    var doc=document.wForm;

    if(doc.rTitle.value==''){
        alert('글 제목을 입력해주세요');
        	return;
    }

    if(doc.rContent.value==''){
        alert('글 내용을 입력해주세요');
        	return;
    }

  	 wForm.submit();
}
</script>

<center>
<h3>댓글쓰기</h3>
	<form name="wForm" action='board_reply_save.php' method="post">
		<table>
			<tr>
				<td>제목:</td>
				<td align="left"><input type="text" style="width: 400px;"
					name='rTitle'></td>
			</tr>
			<tr>
				<td>글내용:</td>
				<td align="center"><textarea style="width: 400px; height: 100px;"
						name='rContent'></textarea></td>
			</tr>
		</table>
		<input type="hidden" value='<?=$_GET['b_num'];?>' name="b_num">
		<input type="button" value='댓글쓰기' onclick="eventReplyWrite()">
		<input type="button" value='뒤로가기' onclick='location.href="history.back()"'>
	</form>
</center>