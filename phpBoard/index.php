<?php
include './lib/db.php';
?>

<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<?php
if ($_SESSION['userId'] == null) {
    ?>
	<center>
	로그인 화면
		<form action='idCheck.php' method="post">
			<input type="text" name="sId" placeholder="username" required> </br>
			<input type="password" name="sPw" placeholder="password" required> </br>
			<input type='submit' value='login'>
		</form>
		</br>
		<a href="register.php">등록</a>
	</center>
<?php
} else {
    echo "<center>".$_SESSION['userNm'] . "(" . $_SESSION['userId'] . ")님이 로그인 하셨습니다";
    echo "<br><br><a href='board_list.php'>글목록</a>";
    echo "<br><a href='update.php'>회원정보수정</a>";
    echo "<br><a href='logout.php'><input type='button' value='로그아웃하기'></a></center>";
}
?>
</body>
</html>