<!DOCTYPE html>
<html>
<?php
include "../include/session.php";
if(!isset($_SESSION['ses_user'])){
  echo '<script>alert("로그인이 필요한 서비스입니다.");</script>';
  echo '<script>location.href=\'../member/loginPage.php\';</script>';
}
?>
<head>
  <meta charset="utf-8"/>
  <title> JUMP(membership) </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script type="text/javascript">
  function nullCheckAndRemove(obj){
    var a = $('#text').val().replace(/ /gi, '');
    $('#text').val(a);
  }
  function f_link(){
    location.href="../member/logout.php";
  }
  function Check(){
    if(Info.buildingName.value ==""){
      alert("건물 이름이 비어있습니다.");
      Info.buildingName.focus();
      return false;
    }
    else if(Info.buildingAddress.value ==""){
      alert("건물 주소가 비어있습니다.");
      Info.buildingAddress.focus();
      return false;
    }
    else if(Info.roomNumber.value ==""){
      alert("호실 ID가 비어있습니다.");
      Info.roomNumber.focus();
      return false;
    }
    else if(Info.isEmpty.value ==""){
      alert("지하 여부를 체크해주세요.");
      Info.isEmpty.focus();
      return false;
    }
    else if(Info.floor.value ==""){
      alert("층수를 입력해주세요.");
      Info.floor.focus();
      return false;
    }
    else if(Info.company.value ==""){
      alert("상호명을 입력해주세요.");
      Info.company.focus();
      return false;
    }
    else if(Info.userfile.value ==""){
      alert("이미지 파일을 업로드해주세요.");
      Info.userfile.focus();
      return false;
    }
    else {
      return true;
    }
  }
  </script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<form name="Info" action="./insertInfo.php" method="post" onsubmit="return Check()" enctype="multipart/form-data">
<div class="w3-container w3-green">
  <h1> <?php echo'안녕하세요 '.$_SESSION['ses_user'].'('.$_SESSION['ses_id'].') 님';?></h1>
  <p> '*' 표시가 되어있는 항목은 필수 입력 항목입니다.
  <button type="button" onclick="f_link(); return false;">로그아웃</button></p>
</div>
<div class="w3-row-padding">
  <div class="w3-third">
    <h2>Building</h2>
    <h6>건물명<FONT SIZE="3" COLOR="blue"> * </FONT></h6>
    <input type="text" name="buildingName"/>
    <h6>건물주소<FONT SIZE="3" COLOR="blue"> * </FONT></h6>
    <input type="text" name="buildingAddress"/>
    <h6>준공일<FONT SIZE="2" COLOR="blue"> "ex)19990106" 와 같이 숫자만 입력해주세요 </FONT></h6>
    <input type="text" name="buildingDate"/>
    <h6>지하층수</h6>
    <input type="text" name="basement" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"/>
    <h6>지상층수</h6>
    <input type="text" name="ground" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"/>
    <h6>일반승강기</h6>
    <input type="text" name="generalElevator"/>
    <h6>회물승강기</h6>
    <input type="text" name="cargoElevator"/>
    <h6>비상승강기</h6>
    <input type="text" name="emerElevator"/>
    <h6>교통정보</h6>
    <input type="text" name="traffic"/>
    <hr/>
  </div>
  <div class="w3-third">
    <h2>Office</h2>
    <h6>호실 ID<FONT SIZE="3" COLOR="blue"> * </FONT></h6>
    <input type="text" name="roomNumber" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"/>
    <h6>지하 여부<FONT SIZE="3" COLOR="blue"> * </FONT></h6>
    O <input type="radio" name="isEmpty" value="0"/>
    X <input type="radio" name="isEmpty" value="1"/>
    <h6>층수<FONT SIZE="3" COLOR="blue"> * </FONT></h6>
    <input type="text" name="floor" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"/>
    <h6>상호명<FONT SIZE="3" COLOR="blue"> * </FONT></h6>
    <input type="text" name="company"  id="text" onkeyup="nullCheckAndRemove(this)"/>
    <h6>분야</h6>
    <select name="field">
      <option value="" selected disabled hidden>분야를 선택해주세요</option>
      <option value="Agriculture">농업, 임업 및 어업</option>
      <option value="Mining">광업</option>
      <option value="Manufacturing">제조업</option>
      <option value="Electric, Gas, Steam and Waterworks">전기, 가스, 증기 및 수도사업</option>
      <option value="Waste dispoal, Environmental Restoration">폐기물 처리, 환경복원업</option>
      <option value="Construction Industry">건설업</option>
      <option value="Wholesale and Retail">도매 및 소매업</option>
      <option value="Transport">운수업</option>
      <option value="Lodgment and Restaurant ">숙박 및 음식업점</option>
      <option value="Publishing, Broadcasting and Information service">출판, 영상, 방송통신 및 정보서비스업</option>
      <option value="Financial and Insurance">금융 및 보험업</option>
      <option value="Real Estate and Leasing industry">부동산업 및 임대업</option>
      <option value="Professional, Scientific and Technical service">전문, 과학 및 기술 서비스업</option>
      <option value="Business Support Service">사업시설관리 및 사업지원 서비스</option>
      <option value="Education">교육 서비스업</option>
      <option value="Health and Social Welfare">보건업 및 사회복지 서비스업</option>
      <option value="Art, Sports and Leisure">예술, 스포츠 및 여가관련 서비스업</option>
      <option value="Organizations, Repairs and Personal service">협회 및 단체, 수리 및 기타 개인 서비스업</option>
      <option value="International and Foreign Institutions">국제 및 외국기관</option>
      <option value="etc.">기타</option>
    </select>
    <hr/>
  </div>
  <div class="w3-third">
    <h2>Image</h2>
    <br/>
    <input type="file" name="userfile">
    <br/>
    <hr/>
    <input type="submit" name="submit" value="완료"/>
    <hr/>
  </div>
</div>
</form>
</body>
</html>
