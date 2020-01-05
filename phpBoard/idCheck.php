<?php
include './lib/db.php';

$sId = $_POST['sId'];
$sPw = $_POST['sPw'];

$query = "SELECT M_ID,M_NAME,M_PASS FROM tb_member WHERE M_ID='$sId' AND M_PASS='$sPw'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result); 
// c=a->b a안에있는(or반환받은값) b를 실행해서 c에 저장 
//if($mysqli->connect_errno){a()} 쿼리 실행후 return된 객체 mysqli안에 connect_errno라는 변수의 값이  true일 경우 a()를 실행

if ($row['M_ID'] == $sId && $row['M_PASS'] == $sPw) {
    $_SESSION['userId'] = $row['M_ID'];
    $_SESSION['userPw'] = $row['M_PASS'];
    $_SESSION['userNm'] = $row['M_NAME'];
    echo "<script>location.href='board_list.php';</script>";
} else {
    echo "<script>window.alert('잘못된 비밀번호')</script>";
    echo "<script>location.href='index.php';</script>";
}
?>
