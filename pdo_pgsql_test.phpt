--TEST--
pdo_pgsql test
--FILE--
<?php 
$conn = new PDO("pgsql:options='-c client_encoding=sql_ascii -c timezone=UTC -c search_path=public -c application_name=app';");
echo $conn->query("show client_encoding")->fetchColumn(0), PHP_EOL;
echo $conn->query("show timezone")->fetchColumn(0), PHP_EOL;
echo $conn->query("show search_path")->fetchColumn(0), PHP_EOL;
echo $conn->query("show application_name")->fetchColumn(0), PHP_EOL;
echo PHP_EOL;

$conn = new PDO("pgsql:options='-c client_encoding=utf-8 -c timezone=Asia/Tokyo -c search_path=\"\$user\",public -c application_name=My\\\\ App';");
echo $conn->query("show client_encoding")->fetchColumn(0), PHP_EOL;
echo $conn->query("show timezone")->fetchColumn(0), PHP_EOL;
echo $conn->query("show search_path")->fetchColumn(0), PHP_EOL;
echo $conn->query("show application_name")->fetchColumn(0), PHP_EOL;
--EXPECT--
SQL_ASCII
UTC
public
app

UTF8
Asia/Tokyo
"$user",public
My App
