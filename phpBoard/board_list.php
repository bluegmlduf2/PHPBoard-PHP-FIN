<style>
.tdCls{padding-left:80px; }
</style>
<table align="center">
	<tr>
		<td align="center"><h3>글목록</h3></td>

</table>
<br />
<table align="center">
	<tr>
		<td align="center" valign="middle" width="5%" style="height: 30px;">번호</td>
		<td align="center" valign="middle" width="60%" style="height: 30px;">글제목</td>
		<td align="center" valign="middle" width="15%" style="height: 30px;">글쓴이</td>
		<td align="center" valign="middle" width="20%" style="height: 30px;">작성일</td>

	<?php
    include './lib/db.php';
    
    $sPage = 0;
    $ePage = 10;

    if ($_GET['val'] != NULL && $_GET['val'] > 1) {
        $sPage = ($_GET['val'] * 10) - 10; // 스타트쪽수
        $ePage = 10; // 엔드쪽수
    }
    // $query = "SELECT b_num,b_title,m_name,b_regdate FROM tb_board where m_id='".$_SESSION['userId']."' limit ".$sPage.",".$ePage.";";
    $query = "SELECT b_idx,
    CASE WHEN b_reply=1 THEN b_title
    WHEN b_reply=2 THEN CONCAT('　ㄴ',b_title)
    WHEN b_reply=3 THEN CONCAT('　　　ㄴ',b_title)
    WHEN b_reply=4 THEN CONCAT('　　　　　ㄴ',b_title) END AS b_title
    ,m_name,b_regdate,b_num FROM tb_board ORDER BY `b_num` ASC, `b_reply` ASC, `b_regdate` ASC limit " . $sPage . "," . $ePage . ";";
    $result = mysqli_query($conn, $query); // limit함수는 limit 0,5 면 첫번쨰행부터 5개를 가져온다는 뜻

    while ($rowArr = mysqli_fetch_row($result)) {
        echo "<tr><td align='center'><a href='board_list_detail.php?param=" . $rowArr[0] . "&param1=" . $rowArr[4] . "'>" . $rowArr[0] . "</a></td>
                              <td align='left' class='tdCls'>" . $rowArr[1] . "</td>
                              <td align='center' >" . $rowArr[2] . "</td>
                              <td align='center' >" . $rowArr[3] . "</td></tr>";
    };
    ?>
	</tr>
</table>
<table align="center">
	<tr>
	<td align="center" >
    	<?php
    // $query = "select count(*) as cnt from tb_board where m_id='" . $_SESSION['userId'] . "'";
    $query = "select count(*) as cnt from tb_board";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $listCnt = $row['cnt']; // 해당 아이디의 게시물 총갯수

    $pageCnt = ceil($listCnt / 10);

    for ($i = 1; $i <= $pageCnt; $i ++) {
        echo "<td align='center'><a href='board_list.php?val=" . $i . "'>" . $i . "</a></td>";
    }
    ;
    ?>
    </tr>
</table>
<table align="center">
	<br>
	<tr>
		<td align="center"><a href='board.php' align="center">글쓰기</a></td>
	</tr>
	<tr>
		<td align="center"><a href='update.php'>회원정보수정</a></td>
	</tr>
	<tr>
		<td align="center"><a href='logout.php'>로그아웃</a></td>
	</tr>
</table>
