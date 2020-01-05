<?php
session_start();
//$_SESSION['userId'] 를 사용하기전에 세션을 열어줘야한다
//lib.php에 session_start()를 넣어뒀는데 이 페이지에선 임폴트안하기때문에 이렇게 직접적어줘야함
if($_SESSION['userId'] != null){
    echo "<script>alert('로그아웃했습니다');</script>";
    session_destroy();
    echo "<script>location.href='index.php';</script>";
}
?>

