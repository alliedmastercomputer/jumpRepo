<?php // 데이터베이스에 접속하는 php파일

header("Content-Type: text/html; charset=utf-8");
$host="jump2.database.windows.net"; // 서버 이름
$connectionOptions = array( // DB명, 아이디, 비번
  "Database" => "JUMP2",
  "Uid" => "jump2",
  "PWD" => "Aqswde123"
);

$dbConnect = sqlsrv_connect($host, $connectionOptions); // 데이터베이스에 연결
?>
