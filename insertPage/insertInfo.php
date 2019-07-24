<?php
include "../include/session.php";
include "../include/dbConnect.php"; // 데이터베이스에 연결

//building
$buildingName=$_POST['buildingName']; // 건물명을 building 변수에 저장
$buildingName=preg_replace("/\s+/","", $buildingName); // 공백제거
$buildingName = iconv("utf-8", "euc-kr", $buildingName);
$buildingAddress=$_POST['buildingAddress']; // 건물주소
$buildingAddress = iconv("utf-8", "euc-kr", $buildingAddress);
$buildingDate=$_POST['buildingDate']; // 준공일
$basement=$_POST['basement']; // 지하층스
$ground=$_POST['ground']; // 지상층수
$generalElevator=$_POST['generalElevator']; // 일반승강기
$cargoElevator=$_POST['cargoElevator']; // 화물승강기
$emerElevator=$_POST['emerElevator']; // 비상승강기
$traffic=$_POST['traffic']; // 교통정보
$traffic = iconv("utf-8", "euc-kr", $traffic);

//Office
$roomNumber=$_POST['roomNumber']; // 호실 ID
$isEmpty=$_POST['isEmpty']; // 지하여부
$floor=$_POST['floor']; // 층수
$company=$_POST['company']; // 호실 명
$company = iconv("utf-8", "euc-kr", $company);
$field=$_POST['field']; // 분야(호실구분코드)

//ID(Foreign KEY)를 세션 변수로 받아온다.
$id = $_SESSION['ses_id'];

//만약 해당 건물을 처음입력한다면, 건물이름을 한 번만 insert하도록 만듦.
if($_SESSION['bName'] != $buildingName){
  $_SESSION['bName']=$buildingName;
  $sql = "INSERT INTO dbo.building VALUES";
  $sql = $sql."('$buildingName','$buildingAddress','$buildingDate','$basement','$ground','$generalElevator','$cargoElevator','$emerElevator','$traffic')";

  if(!sqlsrv_query($dbConnect, $sql)){
    echo '<script>alert("failed to insert Building Info.");</script>';
    echo '<script>history.go(-1);</script>';
  }
}

//쿼리 문 작성
$office = "INSERT INTO dbo.office VALUES";
$office = $office."('$roomNumber','$buildingName','$isEmpty','$floor','$company','$field','$id')";

//이미지 파일 저장 경로 설정
$dir = 'C:\apm\file\uploads\\';
$uploads = $dir.basename($_FILES['userfile']['name']);

 // $sql에 담긴 쿼리 실행
if(sqlsrv_query($dbConnect, $office)){ // $office에 담긴 쿼리 실행
  if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploads)){ // 파일 업로드
    echo '<script>alert("correct");</script>';// 데이터베이스에 입력 성공
    echo '<script>history.go(-1);</script>'; // 뒤로가기
  }else{
    echo '<script>alert("failed to upload to Image File.");</script>';
    echo '<script>history.go(-1);</script>';
  }
}else{
  echo '<script>alert("failed to insert Office Info.");</script>';
  echo '<script>history.go(-1);</script>';
}


?>
