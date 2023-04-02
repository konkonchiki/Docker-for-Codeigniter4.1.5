<?php
// MySQLサーバーに接続する情報を設定
$host = 'mysql';
$user = 'user';
$password = 'pass';
$database = 'dbtest';
$port = 3306;

// MySQLサーバーに接続
$mysqli = new mysqli($host, $user, $password, $database, $port);

// 接続エラーの場合はエラーメッセージを表示して終了
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

// クエリの実行
$sql = "SELECT * FROM news";
$result = $mysqli->query($sql);

// 結果の取得
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["title"] . "<br>";
    }
} else {
    echo "Error: " . $mysqli->error;
}

// MySQLサーバーから切断
$mysqli->close();
?>
