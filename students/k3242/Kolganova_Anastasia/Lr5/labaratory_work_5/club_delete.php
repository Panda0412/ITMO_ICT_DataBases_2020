<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<div align="left"><a href='index.php'>Main</a></div>	
		<div align="left"><a href='club_insert.php'>Add data to Club</a></div>
		<div align="left"><a href='club_change.php'>Change data in Club</a></div>
		<hr>
		<h3>Удалить клуб</h3>
		<ul>
			<form name="delete" action="club_delete.php" method="POST" >
				<ul>Название клуба:</ul><ul><input type="text" name="Club_name"/></ul>
				<ul><input type="submit" name="Delete" /></ul>
			</form>
		</ul>
		<hr>
	</body>
</html>


<?php
echo "<br/>";
$dbuser = 'postgres';
$dbpass = '2001335';
$host = 'localhost';
$dbname='Dog_Exhibition';
$ClubTable = '"public"."Club"';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST["Delete"])) {
            $infoA = "delete from $ClubTable where \"Club_name\"='$_POST[Club_name]'";
            $result = pg_query($db, $infoA);
			$result = pg_fetch_all($result);
			pg_close($db);
         }
}

$dbuser = 'postgres';
$dbpass = '2001335';
$host = 'localhost';
$dbname='Dog_Exhibition';
$ClubTable = '"public"."Club"';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$info = "select * from $ClubTable";
$result = pg_query($db, $info);
$result = pg_fetch_all($result);
foreach ($result as $value) {
	echo "----------------------<br/>";
	foreach ($value as $key => $value) {
		echo "|  $key = $value <br/>";
	}
}; echo" ----------------------<br/>";
?>
