<?php
header('Content-Type: text/html; charset=utf-8');
include "../include/session.php";
include "../include/dbConnect.php"; // DataBase 연결

$uid = $_POST['uid']; // 아이디를 받는 변수 uid
$pwd = $_POST['pwd']; // 비밀번호를 받는 변수 pwd
$nick = $_POST['nick']; // 닉네임을 받는 변수 nick


//id와 pwd가 일치하는 값을 dbo.member 테이블에서 조회
$sql = "SELECT *FROM dbo.member WHERE id='{$uid}' AND password='{$pwd}'";
$res = sqlsrv_query($dbConnect, $sql);

// 일치하는 값을 나타낸 배열
$row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);

//만약 일치하는 값이 있다면
if($row != null){
  $_SESSION['ses_user'] = $nick;
  $_SESSION['ses_id'] = $uid;
  $_SESSION['bName'] = null;
  echo '<script>alert("로그인 성공");</script>';
  echo '<script>location.href=\'../insertPage/mainpage.php\';</script>';
}else{ // 일치하는 값이 없다면,
  echo '<script>alert("로그인 실패");</script>';
  echo '<script>history.go(-1);</script>';
}
?>
