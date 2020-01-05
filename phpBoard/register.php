<?php
session_start();

if ($_SESSION['userId'] != null) {
    echo "<script>alert('이미 로그인하셨습니다');history.back();</script>";
} else {
    ?>
<script>
function member_save(){
	var mForm=document.regForm;

	if(mForm.rId.value==''){
	alert('id입력해주세요');
	return false;
	}

	if(mForm.rPw.value==''){
		alert('pw입력해주세요');
		return false
	}
	if(mForm.rNm.value==''){
		alert('name입력해주세요');
		return false
	}

	mForm.submit();
}
</script>
<center>
	<table>
	회원등록
		<form action="register_save.php" method='post' name="regForm">
			<tr>
				<td>ID:</td>
				<td><input type="text" name="rId"></td>
			</tr>
		<tr>
			<td>PW:</td>
			<td><input type="password" name="rPw"></td>
		</tr>
		<tr>
			<td>NM:</td>
			<td><input type='text' name="rNm"></td>
		</tr>
		<tr>
			<td><input type='button' value='등록' onclick='member_save()'></td>
		</tr>
		<tr>
		<td><input type='button' value='HOME' onclick="history.back()"></td>
		</tr>
		</form>
		<table>
			</center>
<?php
}
?>