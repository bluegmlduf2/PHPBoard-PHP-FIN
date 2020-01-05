<?php
include './lib/db.php';

    if ($_SESSION['userId'] == null) {
        echo "<script>alert('로그인해주세요');history.back();</script>";
        return;
    }
    
    if ($_POST['b_num'] == null) {
        echo "<script>alert('해당하는 글이 없습니다.');history.back();</script>";
        return;
    }
    
    $queryCnt = "select count(b_num)as cnt from tb_board where b_num='" . $_POST['b_num'] . "'"; // reply증감
    $result = mysqli_query($conn, $queryCnt);
    $rowArrCnt = mysqli_fetch_row($result);
    
    if ($rowArrCnt[0]>=4) {
        echo "<script>alert('댓글은 3개 이상 달수없습니다');</script>";
        echo "<script>location.replace('board_list.php');</script>";
        return;
    }else{
        // insert
        $rTitle = addslashes(htmlspecialchars($_POST['rTitle']));
        $rContent = addslashes(htmlspecialchars($_POST['rContent']));
        $query = "insert into tb_board set b_title='" . $rTitle . "',b_contents ='" . $rContent . "',b_num='" . $_POST['b_num'] . "',b_reply='" . ($rowArrCnt[0]+1)  . "',m_id='" . $_SESSION['userId'] . "',m_name='" . $_SESSION['userNm'] . "',b_regdate=now()";
        mysqli_query($conn, $query);
        
        echo "<script> alert('댓글이 등록되었습니다.');</script>";
        echo "<script>location.replace('board_list.php');</script>";
    }
    

?>