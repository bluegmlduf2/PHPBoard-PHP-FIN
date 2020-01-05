<?php
    include './lib/db.php';
    
    if ($_SESSION['userId'] == null) {
        echo "<script>alert('로그인해주세요');history.back();</script>";
        return;
    }

    if ($_GET['b_idx'] == null) {        
        // insert
        $rTitle = addslashes(htmlspecialchars($_POST['rTitle']));
        $rContent = addslashes(htmlspecialchars($_POST['rContent']));
        
        $query = "insert into tb_board set b_title='" . $rTitle . "',b_contents ='" . $rContent . "',m_id='" . $_SESSION['userId'] . "',m_name='" . $_SESSION['userNm'] . "',b_regdate=now()";
        mysqli_query($conn, $query);
    
        $last_uid = mysqli_insert_id($conn);
        $query = "update tb_board set b_num='" . $last_uid . "' where b_idx='" . $last_uid . "'";
        mysqli_query($conn, $query);
        
        echo "<script> alert('등록되었습니다.');</script>";
    }else{
        //update
        $rTitle = addslashes(htmlspecialchars($_GET['b_title']));
        $rContent = addslashes(htmlspecialchars($_GET['b_contents']));
        
        $query = "update tb_board set b_title='" . $rTitle . "',b_contents ='" . $rContent . "' where b_idx='".$_GET['b_idx']."'";
        mysqli_query($conn, $query);
        
        echo "<script> alert('수정되었습니다.');</script>";
    }
    
    echo "<script>location.replace('board_list.php');</script>";
?>
<script>
location.replace('board_list.php'); 
</script>