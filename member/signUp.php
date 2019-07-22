<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title> 회원가입 폼 </title>
</head>
<body>
    <h1 class="title">회원가입 </h1>
    <form name="signUp" action="./signUpMember.php" method="post">
      <p>아이디<FONT SIZE="2" COLOR="blue"> - 숫자만 입력할 수 있습니다. </FONT></p>
      <input type="text" name="memberId" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"/>
      <p>이름</p>
      <input type="text" name="memberNickName"/>
      <p>비밀번호</p>
      <input type="password" name="memberPw" />
      <p>비밀번호 확인</p>
      <input type="password" name="memberPw2" />
      <p>전화번호 ( '-' 뺴고 입력)</p>
      <input type="text" name="memberPhone"/>
      <br/>
      <br/>
      <input type="submit" name="submit" value="가입하기"/>
    </form>
    <hr/>
    <h5 class="title"><a href="./loginPage.php"> 되돌아가기 </a></h5>
</body>
</html>
