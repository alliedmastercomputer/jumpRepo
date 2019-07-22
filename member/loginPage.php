<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
  <title> Login main </title>
</head>
<body>
  <form name="signIn" action="./loginCheck.php" method="post">
    <h2> 로그인 </h2>
    <p>아이디</p>
    <input type="text" name="uid" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"/>
    <p>비밀번호</p>
    <input type="password" name="pwd"/>
    <p>이름</p>
    <input type="text" name="nick"/>
    <hr/>
    <input type="submit" name="submit" value="완료"/>
  </form>
  <h3 class="title"><a href="./signUp.php"> 회원가입하기 </a></h3>
</body>
</html>
