<?php 
    include './lib/db.php';
    
    if ($_SESSION['userId'] == null) {
        echo "<script>alert('로그인해주세요');history.back();</script>";
        return;
    }
    
    if($_GET['b_idx']==null){
        echo "<script>alert('삭제할 글이 없습니다');history.back();</script>";
        return;
    }
    
    //delete
    $query="delete from tb_board where b_idx='".$_GET['b_idx']."' OR b_num='".$_GET['b_idx']."'";
    mysqli_query($conn, $query);
    
    echo "<script> alert('삭제되었습니다.');location.replace('board_list.php');</script>";
?>
<script>
//location.replace('board_list.php'); 
</script>