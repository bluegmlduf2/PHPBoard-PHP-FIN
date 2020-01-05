<script>
function eventWrite(){
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
	<h3>
		<b> 게시판</b>
	</h3>
	<form name="wForm" action='board_write_save.php' method="post">
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
		<input type="button" value='글쓰기' onclick="eventWrite()"> <br /> <br />
	</form>

	<table>
		<tr>
			<td align="center"><a href='board_list.php'>글목록</a></td>
		</tr>
	</table>
</center>