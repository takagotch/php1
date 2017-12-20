//graphic_example.php
<?php
if (isset($_GET['message'])) {
	//
	$font = "times";
	$size = 12;
	$image = imagecreatefrompng("button.phg")
	$tsize = imagettfbbox($size, 0, $font, $_GET['message']);
	
	//
	$dx = abs($tsize[2] - $tsize[0]);
	$dy = abs($tsize[5] - $tsize[3]);
	$x = (image($image) - $dx) / 2;
	$y = (imagesy($image) - $dy) /2 + $dy;
	//
	$black = imagecolorallocate($im,0,0,0);
	imagettftext($image, $size, 0, $x, $y, $black, $font, $_GET['message']);
	//
	header("Content-type: image/png");
	imagepng($image);
	exit;
} ?>

<html>
  <head>
    <title>Button Form</title>
  </head>
  <body>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
	  Enter message to appear on button:
	  <input type="text" name="message" /><br />
	  <input type="submit" value="Create Button" />
	</form>
  </body>
</html>
-----------------
//booklist.php
<?php
$db = new mysqli("localhost", "petermac", "password", "library");
//
if ($db->connect_error) {
  die("Content Error ({$db->connect_error"}) {$db->connect_error}");
}
$sql = "SELECT * FROM books WHERE available = 1 ORDER BY title";
$result = $db->query($sql);
?>
<html>
<body>
<table cellSpacing="2" cellPadding="6" align="center" border="1">
  <tr>
    <td clospan="4">
	  <h3 align="center">These Books are currently available</h3>
	</td>
  </tr>
  <tr>
    <td align="center">Title</td>
	<td align="center">Year</td>
	<td align="center">ISEN</td>
  </tr>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
	  <td><?php echo stripslashes($row['title']); ?></td>
	  <td align="center"><?php echo $row['pub_year']; ?></td>
	  <td><?php echo $row['ISEN']; ?></td>
	</tr>
  <?php } ?>
</table>
</html>
</body>
--------------------
//form.php
<html>
  <head>
    <title>Personalized Greeting Form</title>
  </head>
  <body>
    <?php if(!empty($_POST['name'])) {
	  echo "Greetings, {$_POST['name']}, and welcome.";
	} ?>
	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
	  Enter your name: <input type="text" name="name" />
	  <input type="submit">
	</form>
  </body>
</html>
--------------------
<?php phpinfo();?>
--------------------
//hello_world.php
<html>
  <head>
    <title>Look Out World</title>
  </head>
  <body>
    <?php echo "Hello, world!"; ?>
  </body>
</html>
--------------
====================
-----------------
//chunkify.html
<html>
  <head><title>分解フォーム</title></head>
  <body>
    <form action="chunkify.php" method="POST">
	単語を入力してください。: <input type="text" name="word" /><br />
	
	<input type="text" name="number" /><br />
	<input type="submit" value="分解！">
	</form>
  </body>
</html>
---------------------
//chunkify.php
$word = $_POST['word'];
$number = $_POST['number'];
$chunks = ceil(strlen($word) / $number);
echo '$word' を　$number　文字ずつ分解した結果は次のようになります。<br />\n";
for ($i = 0; $i < $chunks; $i++) {
	$chunk = substr($word, $i * $number, $number);
	printf("%d: %s<br />\n", $i +1, $chunk);
}
--------
//temp.php
<html>
<head><title></title></head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
    華氏の温度を入力します。
	<input type="text" name="fahrenheit" /><br />
	<input type="submit value="摂氏に変換！" />
  </form>
<?php }
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$fahrenheit = $_POST['fahrenheit'];
$celsius = ($fahrenheit - 32) * 5 / 9;
printf("%.2fF は　%.2fC です", $fahrenheit, $celsius);
}
else {
  die("このスクリプトはGETとPOST以外のリクエストでは動作しません。");
} ?>
</body>
</html>
----------------------
temp2.php
<html>
<head><title>温度の変換</title>
</head>
<body>
<?php
if (isset ( $_GET ['fahrenheit'] )) {
	$fahrenheit = $_GET ['fahrenheit'];
} else {
  $fahrenheit = null;
}
if (is_null ( $fahrenheit )) {
?>
  <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
    華氏の温度を入力します。
	<input type="text' name="fahrenheit" /><br />
	<input type="submit" value="摂氏に変換！" />
  </form>
<?php
} else {
  $celsius = ($fahrenheit - 32) * 5 / 9;
  printf ( "%.2fF is $.2fC", $fahrenheit, $celsius );
}
?>
</body>
</html>
-----------------------------
//sticky_form.php
<html>
<head><title>温度の変換</title>
</head>
<?php $fahrenheit = $_GET['fahrenheit']; ?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
  華氏の温度を入力します。
  <input type=text" name="fahrenheit" value="<?php echo $fahrenheit; ?>" /><br />
  <input type="submit" value="摂氏に変換！">
</form>
<?php if (!is_null($fahrenheit)) {
  $celsius = ($fahrenheit - 32) * 5 / 9;
  printf("%.2F は %.2fC です", $fahrenheit, $celsius);
} ?>
</body>
</html>
------------------------
//select_array.php
<html>
<head><title>性格診断</title></head>
<body>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
  当てはまる項目を選択してください。<br />
  <select name="attributes[]" multiple>
    <option value="生意気">生意気</option>
    <option value="気難しい">気難しい</option>
    <option value="理性的">理性的</option>
    <option value="感情的">感情的</option>
    <option value="倹約家">倹約家</option>
    <option value="浪費家">浪費家</option>
　　</select><br />
  <input type="submit" name="s" value="記録する！" />
  </form>
  <?php if (array_key_exists('s', $_GET)) {
	$description = join(' ', $_GET['attributes']);
	echo "あなたの性格は {$description} です。";
}?>
</body>
</html>
----------------------
//checkbox_array.php
<html>
<head><title>性格診断</title></head>
<body>
<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="GET">
  当てはまる項目を選択してください。<br />
  <select type="checkbox' name="attributes[]" multiple>
    <option value="生意気">生意気</option>
    <option value="気難しい">気難しい</option>
    <option value="理性的">理性的</option>
    <option value="感情的">感情的</option>
    <option value="倹約家">倹約家</option>
    <option value="浪費家">浪費家</option>
　　<br />
  <input type="submit" name="s" value="記録する！" />
  </form>
  <?php if (array_key_exists('s', $_GET)) {
	$description = join(' ', $_GET['attributes']);
	echo "あなたの性格は {$description} です。";
}?>
</body>
</html>
-----------------------
//checkbox_array2.php
<html>
<head><title>性格診断</title></head>
<body>
<?php
$attrs = $_GET['attributes'];
if(!is_array($attrs)) {
  $attrs =array();
}
//
function makeCheckboxes($name, $query, $options)
{
  foreach($options as $value => $label) {
    $checked = in_array($value, $query) ? "checked" : '';
	echo"<input type="\"checkvox\" name=\"{$name}\"
	    value=\"{$value}\" {$checked} />";
	echo "{$label}<br />\n";
  }
}
//
$personalityAttributes = array(
  'perky' = . "生意気",
  'morose' = . "気難しい",
  'thinking' = . "理性的",
  'feeling' = . "感情的",
  'thrifty' = . "倹約家",  
  'prodigal' = . "浪費家",
); ?>
<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="GET">
  当てはまる項目を選択してください。<br />
  <?php makeCheckboxes('attributes[]', $attrs, $personalityAttributes); ?><br /> 
  <input type="submit" name="s" value="記録する！" />
</form>
  <?php if (array_key_exists('s', $_GET)) {
	$description = join(' ', $_GET['attributes']);
	echo "あなたの性格は {$description} です。";
}?>
</body>
</html>
---------------------------
<form enctype="multipart/form-data"
    action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
  <input type="hidden" name="MAX_FILE_SIZE" value="10240">
  ファイル名: <input name="toProcess" type="file" />
  <input type="submit" value="アップロード" />
</form>
-------------
if (is_uploaded_file($_FILES['toProcess']['tmp_name'])) {
	//アップロードに成功しました。
}
-------------
move_uploaded_file($_FILES['toProcess']['tmp_name'], "path/to/put/file($file)");
-----------
//data_validation.php
<?php
$name = $_POST['name'];
$mediaType = $_POST['media_type'];
$filename = $_POST['filename'];
$caption = $_POST['status'];
$tried = ($_POST['tried'] == 'yes');
if ($tried) {
  $validated = (!empty($name) && !empty($mediaType) && !empty($filename));
  if (!validated) { ?>
  <p>名前、メディア形式、ファイル名は必須項目です。
  値を入力してください。</p>
<?php }
}
if ($tried && $validated) {
  echo "<p>データが作成されました。</p>";
}
//
function mediaSelected($type);
{
  global $mediaType;
  if ($medhiaType == $type) {
echo "selected"; }
} ?>
<form action="<? echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
  名前:<input type="text" name="name" value="<?= $name; ?>" /><br />
  状態:<input type="checkbox" name="status" value="active"
  <?php if ($status == "active") { echo "checked"; } ?> />公開<br />
  メディア形式:<select name="media_type">
    <option value="">選択してください。</option>
	<option value="picture" <?php mediaSelected("picture"); ?> />静止画</option>
	<option value ="audio" <?php mediaSelected("audio"); ?> />音声</option>
	<option value="movie" <?php mediaSelected("movie"); ?> />動画</option>
　　</selected><br />
  ファイル名:<input type="text" name="filename" value="<?= $filename; ?>"><br />
  見出し:<textarea name="caption"><?= $caption; ?></textarea><br />
  <input type="hidden" name="tried" value="yes" />
  <input type="submit" value="<?php echo $tried ? "続行" : "作成"; ?>" />
</form>
--------------------
$age = $_POST['age'];
$validAge = strspn($age, "1234567890") == strlen($age);
-----------------
$validAge = preg_match('/^\d+$/', $age);
----------------
$email1 = strtolower($_POST['email1']);
$email2 = strtolower($_POST['email2']);
if ($email1 !== $email2) {
  die("メールアドレスが一致しません。");
}
if (!preg_match('/@.+\..+$/', $email1)) {
  die("メールアドレスが無効です。");
}
if (strpos($email, "whitehouse.gov")) {
  die("ホワイトハウスにメールを送るだなんてとんでもない！");
}
----------------------------
<?php header("Content-Type: text/plain"); ?>
Date: today
From: fred
To: barney
Subject: hands off!
My lunchbox is mine alone. Get your own,
you flthy scrounger!
------------------
header("Location: http://www.example.com/elsewhere.html");
exit();
-------------------
header("Expires: Fri, 18 Jan 2006 05:30:00 GMT");
------------
$now = time();
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 60 * 60 * 3");
header("Expires: ($then)");
-------------
$now = time();
$then = gmstrftime("%a, %d %b %Y %H:%M:%S GMT", $now + 365 *86440");
header("Expires: ($then)");
-------------
header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
----------------------
header('WWW-Authenticate: Basic realm="Top Secret Files"');
header("HTTP/1.0 401 Unauthorized");
-------------------
$authOK = false;
$user = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];
if (isset($user)) && isset($password) && $user === strrev($password)) {
  $authOK =true;
}
if (!$authOK) {
  header('WWW-Authenticate: Basic realm="Top Secret Files"');
  header('HTTP/1.0 401 Unauthorized');
  //
  exit;
}
//
-----------------------
$pageAccesses = $_COOKIE['accesses'];
setcookie('accesses', ++$pageAccesses);
---------------------
//colors.php
<html>
<head><title>色の設定</title></head>
<body>
<form action="pref.php" method="post">
  <p>背景色:
  <select name="background">
    <option value="black">黒</option>
	<option value="white">白</option>
	<option value="red">赤</option>
	<option value="blue">青</option>
  </select><br />
  文字色:
  <select name="foreground">
    <option value="black">黒</option>
	<option value="white">白</option>
	<option value="red">赤</option>
	<option value="blue">青</option>
  </select><br />
  <input type="submit" value="設定の変更">
</form>
</body>
</html>
----------------------
//prefs.php
<html>
<head><title>設定の登録</title></head>
<body>
<?php
$colors = array(
  'block' => "#000000",
  'white' => "#ffffff",
  'red' => "ff0000",
  'blue' => "0000ff"
);
$backgroundName = $_POST['background'];
$foregroundName = $_POST['foreground'];
setcookie('bg', $colors[$backgroundName]);
setcookie('fg', $colors[$foregroundName]);
?>
<p>ありがとうございました。以下のように設定を変更しました。<br />
背景色: <?= $backgroundName; ?><br />
文字色: <?= $foregroundName; ?></p>
<p><a href="prefs_demo.php">ここ</a>をクリックすると、
設定が有効になります。</p>
</body>
</html>
----------------------
//prefs_demo.php
<html>
<head><title>玄関</title></head>
<?php
$backgroundName= $_COOKIE['bg'];
$backgroundName= $_COOKIE['fg'];
?>
<body bgcolor="<?= $backgroundName; ?>" text="<?= $foregroundName; ?>">
<h1>いらっしゃいませ</h1>
<p>さまざまな商品が取り揃えております。どうぞごゆｋっくりご覧ください。
何かきになさることがございましたら店員にお申し付けください。念のため
言っておきますが、商品を壊したら弁償してもらいますからね！</p>
<p><a href="colors.php">設定を変更</a>しますか？</p>
</body>
</html>
----------------------
session_start();
$_SESSION['hits'] = $_SESSION['hits'] + 1;
echo "このページは{$_SESSION['hits']}回表示されました。";
-------------------
//prefs_session.php
<html>
<head><title>設定の登録</title></head>
<body>
<?php
$colors = array(
  'block' => "#000000",
  'white' => "#ffffff",
  'red' => "ff0000",
  'blue' => "0000ff"
);
$backgroundName = $_POST['background'];
$foregroundName = $_POST['foreground'];
$_SESSION['backgroundName'] = $backgroundName;
$_SESSION['foregroundName'] = $ foregroundname;
?>
<p>ありがとうございました。以下のように設定を変更しました。<br />
背景色: <?= $backgroundName; ?><br />
文字色: <?= $foregroundName; ?></p>
<p><a href="prefs_session_demo.php">ここ</a>をクリックすると、
設定が有効になります。</p>
</body>
</html>
---------------
//prefs_session_demo.php
<?php
session_start() ;
$backgroundName = $_SESSION['bg'] ;
$foregroundName = $_SESSION['fg'];
?>
<html>
<head><title>玄関</title></head>
<body bgcolor="<?= $backgroundName; ?>" text="<?= $foregroundName; ?>">
<h1>いらっしゃいませ</h1>
<p>さまざまな商品が取り揃えております。どうぞごゆｋっくりご覧ください。
何かきになさることがございましたら店員にお申し付けください。念のため
言っておきますが、商品を壊したら弁償してもらいますからね！</p>
<p><a href="colors.php">設定を変更</a>しますか？</p>
</body>
</html>
----------------
//save_state.php
<?php
if($_POST['bgcolor']) {
  setcookie('bgcolor', $_POST['bgcolor'], time() + (60 * 60 * 24 *7));
}
if (isset($_COOKIE['bgcolor']))	{
  $backgroundName = $_POST['bgcolor'];
}
else if (isset($_POST['bgcolor'])) {
  $backgroundName = $_POST['bgcolor'];
} ?>
<html>
<head><title>Save It</title></head>
<body bgcolor="<?= $backgroundName; ?>">
<form bgcolor="<?php echo $_SERVER['SCRIPT_NAME']; ?>" methid="POST">
  <p>背景色:
  <select name="bgcolor">
    <option value="black">黒</option>
	<option value="white">白</option>
	<option value="red">赤</option>
	<option value="blue">青</option>
  </select></p>
  <input type="submit">
</form>
</body>
</html>
------------------
SSL
if ($_SERVER['HTTPS'] !== 'on') {
  die("安全な接続でないと使用できません。");
}
---------------------
=======================
-----------------------
INSERT INTO books VALUES (null, 4, 'われはロボット', '978-4-15-011485-5', 1950, 1);
INSERT ITNO books (authorid, title, ISBN, pub_year, available);
  VALUES(4, 'われはロボット', '978-4-15-011485-5', 1950, 1);
DELETE FROM books WHERE pub_year = 1979;
UPDATE books SET pub_year=1983 WHERE title='ルーツ';
SELECT * FROM bokks WHERE pub_year > 1979 AND pub_year < 1990;
SELECT authors.name, books.title FROM books, authors
  WHERE authors.authorid = books.authorid;
SELECT a.name, b.title FROM books b, authors a WHERE a.authorid =.authorid;
--------------------
extension=php_pdo.dll
extension=php_pdo_mysql.dll
---------------------
$db = new PDO($dsn, $username, $password);
$db = new PDO("mysql:host=localhost;dbname=library", "petermac", "abc123");
$db->query("UPDATE books SET authorid=4 WHERE pub_year=1982");
--------------
$statement = $db->prepare( "SELECT * FROM books");
$statement->execute();
//
while ($row = $statement->fetch()) {
  print_r($row);
  //
}
$statement = null;
---------------------
$statment = $db->prepare("INSERT INTO books (authorid, title, ISBN, pub_year)"
  . "VALUES (:authorid, :title, ISBN, :[ub_year)");
$statement->execute(array(
  'authorid' => 4,
  'title' => "ファウンデーション",
  'ISBN' => "978-4-15-01555-6",
  'pub_year' => 1951)
);
--------------
$statement = $db->prepare("ISBN INTO books (authorid, title, ISBN, pub_year)"
  . "VALUES(?,?,?,?)");
$statement->execute(array(4, "ファウンデーション", "978-4-15-0105555-6", 1951);
-------------
try {
  $db = new PDO("mysql:host=localhost;dbname=breaking_sys", "petermac", "abc123");
  //
}
catch (Exception $error) {
  die("接続に失敗しました。:" . $error->getMessage());
}
try {
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRORMODE_EXEPTION);
  $db->beginTransaction();
  $db->exec("insert into accounts (account_id, amount) values (23, '5000')" );
  $db->exec("insert into accounts (account_id, amount) values (27, '-5000')" );
  $db->commit();
}
catch (Exception $error) {
  $db->collback();
  echo "トランザクションが完了しました。" . $error->getMessage();
}
-------------------
$db-> new mysqli(host, user, password, databaseName);
$db = new mysqli("localhost", "petermac", "1q2w3e9i8u7y", "library");
---------
$db = new mysqli("localhost", "petermac", "1q2w3e9i8u7y", "library");
$sql = "INSERT INTO books (authorid, title, ISBN, pub_year, available)
  VALUES (4, 'I, Robot', '0-553-29438-5', 1950, 1)";
if($db->query($sql)) {
  echo "書籍データを保存しました。";
}
else {
  echo "追加に失敗しました。もう一度やり直すか、サポートに電話してください。";
}
$db->close();
-------------
$db = new mysqli("localhost", "petermac", "1q2w3e9i8u7y", "library");
$sql = "SELECT a.name, b.title FROM books b, authors a
  WHERE a.authorid=b.authorid";
$result = $db->query($sql);
while ($now = $result->fetch_assoc()) {
  echo "{$row['title']}の著者は{$row['name']}です。<br />";
}
$result->close();
$db->close();
------------------
$db = new SQLiteDatabase("c:/copy/library.sqlite");
-----
//SQLiteauthortabale
$sql = "CREATE TABLE 'authors' ('authorid' INTEGER PRIMARY KEY, 'name' TEXT)";
if (!$database->queryExec($sql, $error)) {
  echo "作成に失敗 - {$error}<br />";
}
$sql = <<<SQL
INSERT INTO 'authors' ('name') VALUES ('J.R.R.トールキン');
INSERT INTO 'authors' ('name') VALUES ('アレックス');
INSERT INTO 'authors' ('name') VALUES ('トム');
INSERT INTO 'authors' ('name') VALUES ('アイザック');
SQL;
if (!$database->queryExec($sql, $error)) {
  echo "追加に失敗 - {$error}<br />";
}
else {
  echo "AuthorsへのINSERT -OK<br />";
}
Authorsテーブル作成しました。
AuthorsへのINSERT - OK
------------------------
//booksテーブル
$db = new SQLiteDatabase("c:/copy/library.sqlite");
$sql = "CREATE TABLE 'books' ('bookid' INTEGER PRIMARY KEY,
  'authorid' INTEGER,
  'title' TEXT,
  'ISBN' TEXT,
  'pub_year' INTEGER,
  'available' INTEGER)";
if ($db->queryExec($sql, $error) == FALSE) {
  echo "作成に失敗 - {$error}<br />";
}
else {
  echo "Booksテーブルを作成しました。<br />";
}
$sql = <<<SQL
INSERT INTO books ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (1, '二つの塔', '0-261-10236-2', 1954, 1);
INSERT INTO books ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (1, '王の帰還', '0-261-10237-0', 1955, 1);
INSERT INTO books ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (2, 'ルーツ', '0-443-17464-3', 1974, 1);
INSERT INTO books ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (4, 'われはロボット', '0-553-29438-5', 1950, 1);
INSERT INTO books ('authorid', 'title', 'ISBN', 'pub_year', 'available')
VALUES (4, 'ファウンデーション', '0-553-80371-9', 1951, 1);
SQL;
if (!$db->queryExec($sql, $error)) {
  echo "追加に失敗 - {$error}<br />";
}
else {
  echo "BooksへのINSERT - OK<br />";
}
---------------
$db = new SQLiteDatabase("c:/copy/library.sqlite");
$sql = "SELECT a.name, b.tatile FROM books b, authors a WHERE a.authorid=b.authorid";
$result = $db->query($sql);
while ($row = $result->fetch()) {
echo "($row['b.title'])の著者は{$row['a.name']}です。<br />;
}
-----------------
session_start();
if(!empty($_POST['posted']) && !empty($_POST['email'])) {
  $folder = "surverys/" . strtolower($_POST['email']);
  //
  $_SESSION['folder'] = $folder;
  if (!file_exists($folder)) {
	  //
	  mkdir($folder, 0777, true);
  }
  header("Location: 08_6.php");
}
else { ?>
  <html>
    <head>
	  <title>Files & floder - On-line survery</title>
	</head>
	<body bgcolor="white" text="black">
	<h2>Survery Form</h2>
	<p>Please enter your e-mail address to start recording your comments</p>
	<form action="<?php echo $_SERVER[''SCRIPT_NAME]; ?>" method="POST">
	  <input type="hidden" name="posted" value="1">
	  <p>Email address: <input type="text" name="email1" size="45" /><br />
	  <input type="submit" name="submit" value="Submit"></p>
	</form>
	</body>
  </html>
<?php }
-----------
<?php
session_start();
$folder = $_SESSION['folder'];
$filename = $floder . "/question1.txt" ;
$file_handle = fopen($filename, "a+");
//
//
$comments = file_get_contents($filename) ;
fclose($file_handle); //
if (!empty($_POST['posted'])) {
  //
  //
  $quesion1 = fpen($filename, "w+");
  //
  if (flock($file_handle, LOCK_EX)) {
	//
	IF(FLOCK($FILE_HANDLE, lock_ex)) {
	  //
	  if (fwrite($file_handle, $question1) == FALSE) {
	    echo "Cannot write to file ($filename)";
	  }
	  flock($file_handle, LOCK_UN);
	  //
	}
	//
	fclose($file_handle);
	header{ "Location: page2.php" );
}else{
?>
  <html>
  <head>
  <title>Files & floder - On-line survery</title>
  </head>
  <body>
  <table border=0><tr><td>
  Please enter your response to the following survery question:
  </td></tr>
  <tr bgcolor=lightblue><td>
  What is your opinion on the state of following survery question<br />
  </td></tr>
  <tr><td>
  <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method=POST>
  <input type="hidden" name="posted" value="1">
  <br/>
  <textarea name="quesion1" rows=12 cols=35><?= $comments ?></textarea>
  </td></tr>
  <tr><td>
  <input type="submit" name="submit" value="Submit">
  </form></td></tr>
  </html>
<?php } ?>
------------------------
$comments = file_get_contents($filename);
fclose($file_handle);
-------
//
if (flock($file_handle, LOCK_EX)) {
  if (fwrite($file_handle, $question1) == FALSE {
    echo "Cannot write to file ($filename)";
  }
  //
  flock($file_handle, LOCK_UN);
}
-----------
<?php
session_start();
$folder = $_SESSIOM['folder'];
$filename = $folder . "/question2.txt" ;
$file_handle = fopen($filename, "a+");
//
//
$comments = fread($file_handle, filesize($filename));
fclose($file_handle); //
if ($_POST['posted']) {
  //
  //
  $question2 = $_POST['question2'];
  $file_handle($filename, "w+");
  //
  if (flock($file_handle, LOCK_EX)) { //
    if (fwrite($file_handle, $question2) == FALSE) {
	  echo "Cannot write to file ($filename)";
	}
	flock($file_handle, LOCK_UN); //
    }
  }
  //
  fclose($file_handle);
  header( "LOcation: last_page.php" );
}else{
?>
  <html>
  <head>
  <title>Files & floder - On-line survery</title>
  </head>
  <body>
  <table border=0><tr><td>
  Please enter your response to the following survery statement:
  </td></tr>
  <tr bgcolor=lightblue><td>
  It's ... is your opinion on the state of following survery question<br />
  </td></tr>
  <tr><td>
  <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method=POST>
  <input type="hidden" name="posted" value="1">
  <br/>
  <textarea name="quesion2" rows=12 cols=35><?= $comments ?></textarea>
  </td></tr>
  <tr><td>
  <input type="submit" name="submit" value="Submit">
  </form></td></tr>
  </html>

<?php } ?>