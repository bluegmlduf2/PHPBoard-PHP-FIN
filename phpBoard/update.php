<?php
session_start();

if ($_SESSION['userId'] == null) {
    echo "<script>alert('로그인 해주세요');history.back();</script>";
} else {
    ?>
<script>
function member_save(){
	var mForm=document.regForm;

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
<?php echo $_SESSION['userNm'].'님의 회원정보';?>
	<table>
		<form action="update_save.php" method='post' name="regForm">
		<tr>
			<td>PW:</td>
			<td><input type="password" name="rPw"></td>
		</tr>
		<tr>
			<td>NM:</td>
			<td><input type='text' name="rNm"></td>
		</tr>
		<tr>
			<td><input type='button' value='회원정보수정' onclick='member_save()'></td>
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