<?php
require_once("..database.php");
require_once("..classes.php");
$pdo = connectDatabase();
$sql = "select * from areas";
$pstmt = $pdo -> prepare($sql);
$pstmt -> execute();
$rs = $pstmt ->fetchAll();
disconnectDatabase($pdo);
$aras=[];
foreach ($rs as $record) {
    $id = intval($record["id"]);
    $name = $record["name"];
    $area = new Area($id, $name);
}

echo "<pre>";
var_dump($areas);
echo "</pre>";
exit(0);

?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<title>PDOを使ってみる</title>
	</head>
	<body>
		<h1>PDOを使ってみる</h1>
		<h2>地域を選択する</h2>
		<form action="restaurants.html" method="get">
		<select name="area">
			<option value="0">-- 選択してください --</option>
			<option value="1">福岡</option>
			<option value="2">神戸</option>
			<option value="3">伊豆</option>
		</select>
		<input type="submit" value="選択" />
		</form>
	</body>
</html>
