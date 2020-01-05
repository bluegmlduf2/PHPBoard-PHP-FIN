<?php
include './lib/db.php';

if ($_SESSION['userId'] == null) {
    echo "<script>alert('로그인 해주세요');history.back();</script>";
    exit();
}

$query = "UPDATE tb_member SET m_name='" . trim($_POST['rNm']) . "', m_pass='" . trim($_POST['rPw']) . "' WHERE m_id='" . trim($_SESSION['userId']) . "'";
mysqli_query($conn, $query);

$query = "SELECT M_NAME FROM tb_member WHERE M_ID='" . trim($_SESSION['userId']) . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$_SESSION['userNm'] = $row['M_NAME'];
?>
<script>
alert("수정완료");
location.replace("board_list.php");//뒤로가기를 이용한 도배방지 위함 //location.href는 첫번째로 속성이고 두번째로 뒤로가기를 이용한 도배가능(등록페이지를 계속 띄울수있음)
</script>
