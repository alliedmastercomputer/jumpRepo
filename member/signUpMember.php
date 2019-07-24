<?php

include "../include/dbConnect.php";

$memberId = $_POST['memberId'];
$memberPw = $_POST['memberPw'];
$memberPw2 = $_POST['memberPw2'];
$memberNickName = $_POST['memberNickName'];
$memberNickName = iconv("utf-8", "euc-kr", $memberNickName);
$memberPhone = $_POST['memberPhone'];

$sql = "SELECT * FROM dbo.member WHERE id='{$memberId}'";
$res = sqlsrv_query($dbConnect, $sql, array(), array("Scrollable" => 'static'));
$row = sqlsrv_num_rows($res);

if($row >=1){
  echo '<script>alert("이미 존재하는 아이디가 있습니다.");</script>';
  echo '<script>history.go(-1);</script>';
}else if($memberPw !== $memberPw2){
  echo '<script>alert("비밀번호가 일치하지 않습니다.");</script>';
  echo '<script>history.go(-1);</script>';
}else{
  $member = "INSERT INTO dbo.member VALUES";
  $member = $member."('$memberId',N'$memberNickName',N'$memberPw',N'$memberPhone')";
  if(sqlsrv_query($dbConnect, $member)){
    echo '<script>alert("회원가입 성공");</script>';
    echo '<script>location.href=\'./loginPage.php\';</script>';
  }else{
      echo '<script>alert("Failed to insert ID, PASSWORD and NICKNAME in database.");</script>';
      echo '<script>history.go(-1);</script>';
    }
  }
?>
