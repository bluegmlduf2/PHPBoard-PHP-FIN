 <?php 
 $db_host = "localhost";
 $db_user = "root";
 $db_passwd = "1234";
 $db_name = "boarddb";
 $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
 
 if (mysqli_connect_errno($conn)) {
     echo "데이터베이스 연결 실패: " . mysqli_connect_error();
 } else {
    // echo "성공~!!!";
 }
 session_start();
 ?>