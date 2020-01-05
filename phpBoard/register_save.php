<?php
include './lib/db.php';

if ($_SESSION['userId'] != null) {
    echo "<script>alert('이미 로그인하셨습니다');history.back();</script>";
}

$query = "select * from tb_member where m_id='" . trim($_POST['rId']) . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if ($row['m_idx']) {
    echo "<script>alert('이미 가입된 아이디입니다.'); history.back()</script>"; // history.back();전에 페이지로 돌아가기
} else {
    $query = "insert tb_member(M_ID,M_PASS,M_NAME) VALUES('" . trim($_POST['rId']) . "','" . trim($_POST['rPw']) . "','" . trim($_POST['rNm']) . "')";
    mysqli_query($conn, $query);

    $_SESSION['userId'] =$_POST['rId'];
    $_SESSION['userPw'] = $_POST['rPw'];
    $_SESSION['userNm'] = $_POST['rNm'];
?>
<script>
alert("등록완료");
location.replace("board_list.php");//뒤로가기를 이용한 도배방지 위함 //location.href는 첫번째로 속성이고 두번째로 뒤로가기를 이용한 도배가능(등록페이지를 계속 띄울수있음)
</script>
<?php
}
?>
