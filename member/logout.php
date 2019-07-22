<?php
include "../include/session.php";

unset($_SESSION['ses_user']);
if($_SESSION['ses_user']==null){
  echo '<script>alert("로그아웃 성공");</script>';
  header('Location: ./loginPage.php');
}else{
  echo '<script>alert("로그아웃 실패");</script>';
  echo '<script>history.go(-1);</script>';
}
?>
